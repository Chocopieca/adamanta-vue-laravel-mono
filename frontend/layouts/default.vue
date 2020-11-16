<template>
  <div class="application">
    <el-container id="def-main-container-app">
      <app-header/>

      <el-container id="def-container-app" :style="$root.defContainerStyle">
        <keep-alive>
          <nuxt :nuxt-child-key="$route.fullPath" />
        </keep-alive>
      </el-container>

    </el-container>

    <app-footer class="def-footer" />

    <modal :title="$t('labels.sign_in')" emit="login-dialog" width="400px">
      <login-form/>

      <form-row :required="false" name="other"/>
    </modal>

    <modal :title="$t('labels.password_recovery')" emit="reset-pass-dialog" width="400px">
      <reset-password-form/>
    </modal>

    <modal :title="$t('labels.registration')" emit="registration-dialog" width="400px">
      <registration-form/>
    </modal>

    <client-only>
      <go-top :size="42" :bottom="10" :right="10" bg-color="#505162" box-shadow="1px 1px 2px rgba(0, 0, 0, .3)"/>
    </client-only>

    <div v-if="$root.overlay" class="overlay" @click="sidebarHidden('left')"/>
  </div>
</template>

<script>
export default {
  components: {
    AppHeader: () => import('./components/Header'),
    loginForm: () => import('./components/LoginForm'),
    resetPasswordForm: () => import('./components/ResetPasswordForm'),
    registrationForm: () => import('./components/RegistrationForm'),
    AppFooter: () => import('./components/Footer'),
  },
  data() {
    return {
      activeIndex: '/',

      isCollapse: false,
      aside: {
        name: '',
        component: false
      },

      prevHeight: 0,
    }
  },
  head() {
    let curLang = this.getCurrentLang()
    let curUrl = this.$route.path.replace(/^\/|\/$/g, '')

    // Collect main meta tags
    let meta = [
      {name: 'title', content: this.headData.meta_title},
      {name: 'description', content: this.headData.meta_description},
      {name: 'keywords', content: this.headData.meta_keywords},
      {name: 'Accept-Language', content: curLang['iso_code']},

      // Facebook openGraph
      {name: 'og:title', content: this.headData.meta_title},
      {name: 'og:description', content: this.headData.meta_description},

      // Twitter openGraph
      {name: 'twitter:title', content: this.headData.meta_title},
      {name: 'twitter:description', content: this.headData.meta_description},
    ]

    // Add no index
    if (this.headData.no_index) {
      meta.push({name: 'robots', content: 'noindex, nofollow'})
    }

    // Add image for openGraph
    if (this.headData.image) {
      let image = this.$env.baseUrl + 'storage/' + this.headData.image

      meta.push({name: 'og:image', content: image})
      meta.push({name: 'og:image:secure_url', content: image})
      meta.push({name: 'twitter:image', content: image})
    }

    // Collect canonical links
    let uriLang = this.$route.params.lang
    let math = this.$route.params.pathMatch

    if (math !== undefined && math.length === 2) {
      uriLang = math
    }

    let links = [{
      rel: 'canonical',
      href: this.$env.baseUrl + curUrl
    }]

    if (this.languages.length && this.settings['localizationEnabled']) {
      for (let lang in this.languages) {
        let code = this.languages[lang]['code']

        links.push({
          rel: 'alternate',
          hreflang: code,
          href: this.$env.baseUrl + (uriLang !== undefined ? curUrl.replace(curLang['code'], code) : code + '/' + curUrl)
        })
      }
    }

    return {
      titleTemplate: '%s',
      htmlAttrs: {
        lang: curLang['iso_code']
      },
      title: this.headData.meta_title,
      meta: meta,
      link: links
    }
  },
  mounted() {
    // if (process.browser) {
    //   this.onResize()
    //
    //   window.addEventListener('resize', this.onResize)
    // }
  },
  methods: {
    // onResize() {
    //   this.$nextTick(function () {
    //     let mode = 'xl'
    //     let type = 'default'
    //
    //     let width = document.documentElement.clientWidth
    //
    //     if (width >= '1824') {
    //       type = 'large_displays'
    //     } else if (width >= '960') {
    //       type = 'desktop'
    //     } else if (width >= '600' && width <= '1000') {
    //       type = 'tablet_portrait'
    //     } else if (width >= '480' && width <= '600') {
    //       type = 'small_tablet'
    //     } else if (width >= '360' && width <= '580') {
    //       type = 'smart_phone'
    //     } else if (width >= '320' && width <= '500') {
    //       type = 'small_smart_phone'
    //     }
    //
    //     if (width <= '1024') {
    //       mode = 'sm'
    //     }
    //
    //     this.$root.device_type = type
    //     this.$root.device_mode = mode
    //   })
    // }
  }
}
</script>

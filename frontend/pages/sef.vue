<template>
  <section>
    <template v-if="data.modules">
      <el-row v-if="data.page.show_title && data.page.title !== ''" class="mt-20 mb-20">
        <el-col :xl="{span: 24}" :md="{span: 24}" :sm="{span: 24}" :xs="{span: 24}">
          <h1 style="font-size: 24px;">{{ data.page.title }}</h1>
        </el-col>
      </el-row>

      <adsense ad-slot="3647885562" />

      <template v-for="(module, key) in data.modules.top">
        <component :key="key" :is="key + 'Component'" :module="module"/>
      </template>

      <el-row v-if="data.page.description !== ''" class="mt-20 mb-20">
        <el-col :xl="24" v-html="data.page.description"/>
      </el-row>

      <template v-for="(module, key) in data.modules.bottom">
        <component :key="key" :is="key + 'Component'" :module="module"/>
      </template>
    </template>

    <template v-if="data.module">
      <adsense ad-slot="3647885562" />

      <component :is="data.module.name + 'Component'" :server-data="data.page"/>
    </template>
  </section>
</template>

<script>
  export default {
    transition: 'intro',

    async asyncData (context) {
      let math = context.route.params.pathMatch;
          math = math === context.app.$lang.getCurrentCode() ? '' : math;

      return await context.app.$axios.get(
        encodeURI('sef/' + (math ? math.replace(/^\/|\/$/g, '') : ''))
      )
        .then((res) => {
          //Set meta data
          context.store.dispatch('setHeadData', res.data.page);
          context.store.dispatch('setCrumbsData', res.data.breadcrumbs);

          return { data: res.data }
        })
        .catch((e) => {
          context.error({ statusCode: e.response.status })
        })
    },
    data() {
      return {
        data: {}
      }
    },
    watch: {
      'data.show_breadcrumbs': function (showBreadcrumbs) {
        this.$root.$emit('eventMainContainer', {
          classContainer: true,
          showBreadcrumbs: showBreadcrumbs
        })
      }
    },
    created() {
      this.$root.$emit('eventMainContainer', {
        classContainer: true,
        showBreadcrumbs: this.data.show_breadcrumbs
      })
    }
  }
</script>

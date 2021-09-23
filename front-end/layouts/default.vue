<template>
  <v-app>
    <Header />
    <!-- Sizes your content based upon application components -->
    <v-main>

      <!-- Provides the application the proper gutter -->
      <v-container fluid class="pa-0 mt-124">
        <!-- If using vue-router -->
        <nuxt></nuxt>
      </v-container>
    </v-main>

    <v-footer app>
      <!-- -->
    </v-footer>
  </v-app>
</template>

<script>
export default {
  components: {
    Header: () => import('~~/components/default/header/Header'),
  },
  head () {
    const canonical = `https://loaclhost${this.$route.path
      .toLowerCase()
      .replace(/\/$/, '')}`
    return {
      meta: [
        ...this.meta

      ],
      script: [
        // { src: 'https://markknol.github.io/console-log-viewer/console-log-viewer.js' }
      ],
      link: [{ rel: 'canonical', href: canonical }]
    }
  },
  computed: {
    meta () {
      return [
        { charset: 'utf-8' },
        {
          name: 'viewport',
          content: 'width=device-width, initial-scale=1, maximum-scale=1 shrink-to-fit=no'
        },
        { hid: 'description', name: 'description', content: 'Главная' }
      ]
    }
  },
}
</script>

<style scoped lang="scss">
@import '~vuetify/src/styles/styles.sass';

.mt-124 {
  @media (min-width: map-get($grid-breakpoints, md)) {
    margin-top: 124px;
  }
}
</style>

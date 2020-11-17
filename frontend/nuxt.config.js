const env = require('./.env.js').default
const isDev = process.env.NODE_ENV !== 'production'

export default {
  server: {
    port: 1780,
    host: '0.0.0.0',
  },

  // Global page headers (https://go.nuxtjs.dev/config-head)
  head: {
    title: 'frontend',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' }
    ],
    link: [
      { rel: 'stylesheet', href: env.backUrl + 'css/common.css' },
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },

  // Global CSS (https://go.nuxtjs.dev/config-css)
  css: [
    { src: '@/assets/sass/app/bootstrap', lang: 'sass' },
  ],

  // Plugins to run before rendering page (https://go.nuxtjs.dev/config-plugins)
  plugins: [
    '@plugins/mixins',
    '@plugins/inject',
    '@plugins/axios',
    '@/plugins/element-ui',
    '@plugins/font-awesome-icon',

    { src: '@plugins/components/modal.js'},
    { src: '@plugins/components/form.js' },
    { src: '@plugins/components/go-to-top.js', mode: 'client'},
    { src: '@plugins/components/front.js'},
    { src: '@plugins/components/recaptha.js', mode: 'client' },
  ],

  // Auto import components (https://go.nuxtjs.dev/config-components)
  components: true,

  // Modules for dev and build (recommended) (https://go.nuxtjs.dev/config-modules)
  buildModules: [
  ],

  // Modules (https://go.nuxtjs.dev/config-modules)
  modules: [
    ['nuxt-env', {
      keys: [
        //{ key: 'THIRD_ENV_VAR', name: 'MY_ENV_VAR' } // Rename the variable
      ]
    }],
    '@nuxtjs/axios',
    ['cookie-universal-nuxt'],
    // '@/modules/routes',
  ],

  axios: {
    baseURL: env.axiosBaseUrl,
    browserBaseURL: env.apiUrl
  },

  // Build Configuration (https://go.nuxtjs.dev/config-build)
  build: {
    transpile: [/^element-ui/],
  },
  router: {              // customize nuxt.js router (vue-router).
    middleware: 'i18n'   // middleware all pages of the application
  },
}

import colors from 'vuetify/es5/util/colors'
const env = require('./.env.js').default
const isDev = process.env.NODE_ENV !== 'production'

export default {
  mode: 'universal',
  ...(!isDev && {
    modern: 'client'
  }),


  server: {
    port: 1780,
    host: '0.0.0.0',
  },

  serverMiddleware: ['~/middleware/NuxtServerLogger'],

  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    titleTemplate: '%s - adamanta-front',
    title: 'adamanta-front',
    htmlAttrs: {
      lang: 'ru'
    },
    meta: [
      { hid: 'description', name: 'description', content: 'Интернет-магазин' }
    ],
    link: [
      { rel: 'stylesheet', href: env.backUrl + 'css/common.css' },
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },
  rootDir: __dirname,
  loading: { color: '#ddd' },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
    'normalize.css',
  { src: '@/assets/bootstrap', lang: 'scss' },
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    '@plugins/mixins',
    '@plugins/inject',
    '@plugins/axios',

    { src: '@plugins/components/go-to-top.js', mode: 'client'},
    { src: '@plugins/components/front.js'},
    { src: '@plugins/components/vue-slick-carousel.js', mode: 'client' },
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    // https://go.nuxtjs.dev/eslint
    '@nuxtjs/eslint-module',
    '@nuxtjs/vuetify',
  ],

  vuetify: {
    customVariables: ['~/assets/variables.scss'],
    optionsPath: './vuetify.options.js',
    treeShake: true,
  },

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    ['nuxt-env', {
      keys: [
        { key: 'appBase', default: env.baseUrl },
      ]
    }],
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    'nuxt-trailingslash-module',
    'cookie-universal-nuxt',
    '../modules/routes',
  ],

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
    baseURL: env.axiosBaseUrl,
    browserBaseURL: env.apiUrl
  },

  render: {
  // http2: {
  //     push: true,
  //     pushAssets: (req, res, publicPath, preloadFiles) => preloadFiles
  //     .map(f => `<${publicPath}${f.file}>; rel=preload; as=${f.asType}`)
  //   },
  // compressor: false,
      resourceHints: false
  // etag: false,
  // static: {
  //  etag: false
  // }
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
    optimizeCss: false,
    filenames: {
      app: ({ isDev }) => isDev ? '[name].js' : 'js/[contenthash].js',
      chunk: ({ isDev }) => isDev ? '[name].js' : 'js/[contenthash].js',
      css: ({ isDev }) => isDev ? '[name].css' : 'css/[contenthash].css',
      img: ({ isDev }) => isDev ? '[path][name].[ext]' : 'img/[contenthash:7].[ext]',
      font: ({ isDev }) => isDev ? '[path][name].[ext]' : 'fonts/[contenthash:7].[ext]',
      video: ({ isDev }) => isDev ? '[path][name].[ext]' : 'videos/[contenthash:7].[ext]'
    },
    ...(!isDev && {
      html: {
        minify: {
          collapseBooleanAttributes: true,
          decodeEntities: true,
          minifyCSS: true,
          minifyJS: true,
          processConditionalComments: true,
          removeEmptyAttributes: true,
          removeRedundantAttributes: true,
          trimCustomFragments: true,
          useShortDoctype: true
        }
      }
    }),
    splitChunks: {
      layouts: true,
      pages: true,
      commons: true
    },
    optimization: {
      minimize: !isDev
    },
    transpile: ['vue-lazy-hydration', 'intersection-observer'],
    postcss: {
      plugins: {
        ...(!isDev && {
          cssnano: {
            preset: ['advanced', {
              autoprefixer: false,
              cssDeclarationSorter: false,
              zindex: false,
              discardComments: {
                removeAll: true
              }
            }]
          }
        })
      },
      ...(!isDev && {
        preset: {
          browsers: 'cover 99.5%',
          autoprefixer: true
        }
      }),

      order: 'cssnanoLast'
    },
    extend (config, ctx) {
      const ORIGINAL_TEST = '/\\.(png|jpe?g|gif|svg|webp)$/i'
      const vueSvgLoader = [
        {
          loader: 'vue-svg-loader',
          options: {
            svgo: false
          }
        }
      ]

      config.module.rules.forEach(rule => {
        if (rule.test.toString() === ORIGINAL_TEST) {
          rule.test = /\.(png|jpe?g|gif|webp)$/i
          rule.use = [
            {
              loader: 'url-loader',
              options: {
                limit: 1000,
                name: ctx.isDev ? '[path][name].[ext]' : 'img/[contenthash:7].[ext]'
              }
            }
          ]
        }
      })
      const svgRule = {
        test: /\.svg$/,
        oneOf: [
          {
            resourceQuery: /inline/,
            use: vueSvgLoader
          },
          {
            resourceQuery: /data/,
            loader: 'url-loader'
          },
          {
            resourceQuery: /raw/,
            loader: 'raw-loader'
          },
          {
            loader: 'file-loader' // By default, always use file-loader
          }
        ]
      }
      config.module.rules.push(svgRule)
    }
  },

  router: {              // customize nuxt.js router (vue-router).
    middleware: 'i18n'   // middleware all pages of the application
  },
}

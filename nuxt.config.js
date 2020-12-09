const axios = require('axios')
const dynamicRoutes = async () => {
  const routes = await axios.get('http://fabricepallaud.com/wp/wp-json/projects/v1/posts')
    .then(res => res.data.map((project) => `/project/${project.ID}/${project.post_name}`))
  return routes
}

export default {
  ssr: true,
  /*
  ** Headers of the page
  */
  head: {
    title: process.env.npm_package_name || '',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: process.env.npm_package_description || '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },
  /*
  ** Customize the progress-bar color
  */
  loading: { color: '#fff' },
  /*
  ** Global CSS
  */
  css: [
    '~assets/scss/main.scss'
  ],
  styleResources: {
    scss: [
      './assets/scss/variables.scss',
      './assets/scss/media_queries.scss'
    ]
  },
  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    '~/plugins/ripple.client.js',
    '~/plugins/navigation-guards-client.js'
  ],
  /*
  ** Nuxt.js dev-modules
  */
  buildModules: [
    // Doc: https://github.com/nuxt-community/eslint-module
    '@nuxtjs/eslint-module',
    '@nuxtjs/google-analytics'
  ],
  googleAnalytics: {
    id: 'UA-151254386-1'
  },
  /*
  ** Nuxt.js modules
  */
  modules: [
    // Doc: https://axios.nuxtjs.org/usage
    '@nuxtjs/axios',
    '@nuxtjs/router',
    '@nuxtjs/toast',
    '@nuxtjs/style-resources',
    'vue-scrollto/nuxt'
  ],
  /*
  ** Axios module configuration
  ** See https://axios.nuxtjs.org/options
  */
  axios: {
  },
  toast: {
    position: 'bottom-right',
    action: {
      text: '×',
      onClick: (e, toastObject) => toastObject.goAway(100)
    },
    className: 'app-toast',
    duration: 2500
  },
  router: {
    // middleware: ['mobile-menu']
    // base: '/nuxt/'
  },
  /*
  ** Build configuration
  */
  build: {
    /*
    ** You can extend webpack config here
    */
    extend (config, ctx) {
    }
  },
  generate: {
    routes: dynamicRoutes
  },
}

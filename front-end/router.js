import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export function createRouter () {
  let routes = [
    {
      path: '/',
      name: 'HomePage',
      component: () => import('~/pages/HomePage').then(m => m.default || m)
    },
    {
      path: '/basket',
      name: 'BasketPage',
      component: () => import('~/pages/BasketPage').then(m => m.default || m)
    },
    {
      path: '/profile',
      name: 'ProfilePage',
      component: () => import('~/pages/ProfilePage').then(m => m.default || m)
    },
    {
      path: '/search',
      name: 'SearchPage',
      component: () => import('~/pages/SearchPage').then(m => m.default || m)
    },
    {
      path: '/registration',
      name: 'RegistrationPage',
      component: () => import('~/pages/RegistrationPage').then(m => m.default || m)
    },
    {
      path: '/category/:category',
      name: 'CategoryListPage',
      props: (route) => ({
        category: route.params.category
      }),
      component: () => import('~/pages/product/CategoryListPage').then(m => m.default || m),
    },
    {
      path: '/category/:category/:group',
      component: () => import('~/pages/product/ProductListPage').then(m => m.default || m),
      props: (route) => ({
        category: route.params.category,
        group: route.params.group,
      }),
    },
    {
      path: '/category/:category/:group/:product',
      component: () => import('~/pages/product/ProductCardPage').then(m => m.default || m),
      props: (route) => ({
        category: route.params.category,
        group: route.params.group,
        product: route.params.product,
      }),
    },
    {
      path: '/contacts',
      name: 'ContactPage',
      component: () => import('~/pages/ContactPage').then(m => m.default || m)
    },
    {
      path: '/order_info',
      name: 'OrderInfoPage',
      component: () => import('~/pages/OrderInfoPage').then(m => m.default || m)
    },
    {
      path: '/reviews',
      name: 'ReviewsPage',
      component: () => import('~/pages/ReviewsPage').then(m => m.default || m)
    },
  ]

  function scrollBehavior(to, from, savedPosition) {
    let position = { x: 0, y: 0 }
    if (savedPosition) {
      position = savedPosition
    } else if(to.hash) {
      position = {
        selector: to.hash,
        offset: { x: 0, y: 80 }
      }
    }

    // return position

    return new Promise((resolve) => {
      setTimeout(() => {
        resolve(position)
      }, 500)
    })
  }

  return new Router({
    mode: 'history',
    base: decodeURI(''),
    linkActiveClass: 'nuxt-link-active',
    linkExactActiveClass: 'nuxt-link-exact-active',
    scrollBehavior,
    routes: routes
  })
}

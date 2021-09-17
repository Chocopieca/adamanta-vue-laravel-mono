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
      path: '/search',
      name: 'SearchPage',
      component: () => import('~/pages/SearchPage').then(m => m.default || m)
    },
    {
      path: '/registration',
      name: 'RegistrationPage',
      component: () => import('~/pages/RegistrationPage').then(m => m.default || m)
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

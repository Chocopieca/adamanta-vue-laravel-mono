import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export function createRouter () {
  let routes = [
    {
      path: '*',
      name: 'home page',
      component: () => import('~/pages/index')
    }
  ]

  return new Router({
    mode: 'history',
    base: decodeURI(''),
    linkActiveClass: 'nuxt-link-active',
    linkExactActiveClass: 'nuxt-link-exact-active',
    scrollBehavior(to, from, savedPosition) {
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
    },
    routes: []
  })
}

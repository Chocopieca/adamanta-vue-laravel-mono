import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export function createRouter () {
  let routes = [
    {
      path: "cabinet",
      component: () => import('~/pages/cabinet/index').then(m => m.default || m),
      name: "cabinet"
    }, {
      path: "system/activate/:id?/:token?",
      component: () => import('~/pages/system/activate/_id/_token').then(m => m.default || m),
      name: "system-activate-id-token"
    }, {
      path: "system/recovery-password/:id?/:token?",
      component: () => import('~/pages/system/recovery-password/_id/_token').then(m => m.default || m),
      name: "system-recovery-password-id-token"
    }, {
      path: '*',
      name: 'sef',
      component: () => import('~/pages/sef').then(m => m.default || m),
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
    routes: [
      {
        path: '/:lang([a-z]{2})?',
        name: 'lang',
        component: () => import('~/components/Container').then(m => m.default || m),
        children: routes
      },
    ]
  })
}

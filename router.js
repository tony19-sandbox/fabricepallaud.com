import Vue from 'vue'
import Router from 'vue-router'

import Index from '~/pages/index.vue'
import About from '~/pages/about.vue'
import Contact from '~/pages/contact.vue'
import Project from '~/pages/project/_id.vue'
import ProjectSlug from '~/pages/project/slug/index.vue'
import Privacy from '~/pages/privacy.vue'

Vue.use(Router)

export function createRouter () {
  return new Router({
    mode: 'history',
    routes: [
      {
        path: '/',
        component: Index
      },
      {
        path: '/about',
        component: About
      },
      {
        path: '/contact',
        component: Contact
      },
      {
        path: '/project/:id',
        component: Project,
        children: [
          {
            path: ':slug',
            component: ProjectSlug,
            name: 'project'
          }
        ]
      },
      {
        path: '/privacy',
        component: Privacy
      }
    ]
  })
}

router.beforeEach((to, from, next) => {
  store.commit('SET_MOBILE_MENU', false)
  store.commit('SET_PORTFOLIO', false)
  next()
})
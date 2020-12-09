import Vue from 'vue'
import Router from 'vue-router'

import Index from '~/pages/index.vue'
import About from '~/pages/about.vue'
import Contact from '~/pages/contact.vue'
import Portfolio from '~/pages/portfolio.vue'
import Project from '~/pages/project/_id.vue'
import ProjectSlug from '~/pages/project/slug/index.vue'
import CookiePolicy from '~/pages/cookie-policy.vue'

Vue.use(Router)

export function createRouter () {
  return new Router({
    mode: 'hash',
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
        path: '/portfolio',
        component: Portfolio
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
        path: '/cookie-policy',
        component: CookiePolicy
      }
    ]
  })
}

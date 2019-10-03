import Vue from 'vue'
import Router from 'vue-router'

import Index from '~/pages/index.vue'
import Project from '~/pages/project/_id.vue'
import ProjectSlug from '~/pages/project/slug/index.vue'

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
        path: '/project/:id',
        component: Project,
        children: [
          {
            path: ':slug',
            component: ProjectSlug,
            name: 'project'
          }
        ]
      }
    ]
  })
}

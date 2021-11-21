import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

export const routes = [
  {
    path: '/',
    name: 'home',
    component: () => import('../views/home.vue'),
    meta: {
      showInMenu: true,
      title: 'fj & inge'
    }
  },
  {
    path: '/location',
    name: 'location',
    component: () => import('../views/location.vue'),
    meta: {
      showInMenu: true
    }
  },
  {
    path: '/rsvp',
    name: 'rsvp',
    component: () => import('../views/rsvp.vue'),
    meta: {
      showInMenu: true
    }
  },
  {
    path: '/wedding-day',
    name: 'wedding day',
    component: () => import('../views/wedding-day.vue'),
    meta: {
      showInMenu: true
    }
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router

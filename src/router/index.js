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
      showInMenu: true,
      menuName: 'location & accommodation'
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
  },
  {
    path: '/gallery',
    name: 'gallery',
    component: () => import('../views/gallery.vue'),
    meta: {
      showInMenu: true
    }
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
  scrollBehavior (to, from, savedPosition) {
    if (to.hash) {
      return {
        selector: to.hash,
        behavior: 'smooth',
        offset: {
          y: document.getElementById('site-menu').offsetHeight + 20,
          x: 0
        }
      }
    } else {
      return { x: 0, y: 0 }
    }
  }
})

export default router

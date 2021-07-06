import { createRouter, createWebHistory } from 'vue-router'
import Home from '../pages/Home.vue'

const routes = [
  { path: '/', redirect: { name: 'Home' }},
  {
    path: '/home',
    name: 'Home',
    component: Home
  },
  {
    path: '/our-unique-approach',
    name: 'Our.unique.approach',
    component: () => import(/* webpackChunkName: "about" */ '../pages/OurUniqueApproach.vue')
  },
  {
    path: '/subscription',
    name: 'Subscription',
    component: () => import(/* webpackChunkName: "about" */ '../pages/Subscription.vue')
  },
  {
    path: '/members',
    name: 'Members',
    component: () => import(/* webpackChunkName: "about" */ '../pages/Members.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router

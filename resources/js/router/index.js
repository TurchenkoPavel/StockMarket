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
    path: '/trading-rules',
    name: 'Trading.rules',
    component: () => import(/* webpackChunkName: "about" */ '../pages/TradingRules.vue')
  },
  {
    path: '/subscriptions',
    name: 'Subscriptions',
    component: () => import(/* webpackChunkName: "about" */ '../pages/Subscriptions.vue')
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

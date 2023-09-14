import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import('../views/Home.vue')
  },
  {
    path: '/About',
    name: 'About',
    component: () => import('../views/About.vue')
  },
  {
    path: '/Login',
    name: 'Login',
    component: () => import('../views/Login.vue')
  },
  {
    path: '/Shop',
    name: 'Shop',
    component: () => import('../views/Shop.vue')
  },
  {
    path: '/Faq',
    name: 'Faq',
    component: () => import('../views/Faq.vue')
  },
  {
    path: '/ProductPage',
    name: 'ProductPage',
    component: () => import('../views/ProductPage.vue')
  },
  {
    path: '/News',
    name: 'News',
    component: () => import('../views/News.vue')
  },{ path: '/Tick',
  name: 'Tick',
  component: () => import('../views/Tick.vue')}

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes: routes
  
})

export default router

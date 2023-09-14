import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'Path',
    component: () => import('../views/Path.vue'),
  },
  {
    path: '/Home',
    name: 'Home',
    component: () => import('../views/frontend/Home.vue'),
    children: [
      {
        path: '',
        name: 'Index',
        component: () => import('../views/frontend/Index.vue'),
      },
      {
        path: '/About',
        name: 'About',
        component: () => import('../views/frontend/About.vue')
      },
      {
        path: '/Login',
        name: 'Login',
        component: () => import('../views/frontend/Login.vue')
      },
      {
        path: '/Shop',
        name: 'Shop',
        component: () => import('../views/frontend/Shop.vue')
      },
      {
        path: '/Faq',
        name: 'Faq',
        component: () => import('../views/frontend/Faq.vue')
      },
      {
        path: '/ProductPage',
        name: 'ProductPage',
        component: () => import('../views/frontend/ProductPage.vue')
      },
      {
        path: '/News',
        name: 'News',
        component: () => import('../views/frontend/News.vue')
      },
      {
        path: '/Space',
        name: 'Space',
        component: () => import('../views/frontend/Space.vue')
      },
      {
        path: '/SpaceMap',
        name: 'SpaceMap',
        component: () => import('../views/frontend/SpaceMap.vue')
      },
      {
        path: '/Tick',
        name: 'Tick',
        component: () => import('../views/frontend/Tick.vue')
      },
      {
        path: '/VisitInformation',
        name: 'VisitInformation',
        component: () => import('../views/frontend/VisitInformation.vue')
      },
      {
        path: '/SpecialExhibition',
        name: 'SpecialExhibition',
        component: () => import('../views/frontend/SpecialExhibition.vue')
      },
      {
        path: '/VisitTraffic',
        name: 'VisitTraffic',
        component: () => import('../views/frontend/VisitTraffic.vue')
      },
    ]
  },
  {
    path: '/Admin',
    name: 'Admin',
    component: () => import('../views/backend/Admin.vue'),
    children: [
      {
        path: '',
        name: 'ManageLogin',
        component: () => import('../views/backend/ManageLogin.vue'),
      },

    ]
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes: routes

})

export default router

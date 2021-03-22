import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import("../views/Home.vue")
  }, {
    path: '/user/:page',
    name: 'Login',
    component: () => import('../views/User.vue')
  }, {
    path: "/new-group",
    name: "NewGroup",
    component: () => import("../views/NewGroup.vue")
  }

]

const router = new VueRouter({
  base: process.env.BASE_URL,
  routes
})

export default router

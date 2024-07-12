import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AboutView from '../views/AboutView.vue'
import AddView from '../views/AddView.vue'
import EditView from '../views/EditView.vue'
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/new',
      name: 'new',
      component: AddView
    },
    {
      path: '/edit/:id', // add parametro id
      name: 'edit',
      component: EditView,
      params: true // adicionado para passar o id por parâmetro
    },
    {
      path: '/about',
      name: 'about',
      component: AboutView
    }
  ]
})

export default router

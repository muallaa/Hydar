import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import HomeSubscripe from '../views/HomeSubscripe.vue'
import HomeLow from '../views/HomeLow.vue'
import HomeContact from '@/views/HomeContact.vue'
import HomeChat from '@/views/HomeChat.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path:'/subscripe',
      name : 'subscripe',
      component : HomeSubscripe
    },
    {
      path : '/low',
      name: 'low',
      component : HomeLow
    },
    {
      path : '/contact',
      name : 'contact',
      component : HomeContact
    },
    {
      path: '/chat',
      name:'chat',
      component: HomeChat
    }
  ]
})

export default router

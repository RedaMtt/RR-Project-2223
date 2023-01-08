import { createRouter, createWebHistory } from '@ionic/vue-router';
import TabsPage from '../views/TabsPage.vue'

const routes = [
  {
    path: '/',
    redirect: '/loginPage'
  },
  {
    path: '/loginPage',
    component: () => import('@/views/LoginPage.vue')
  },
  {
    path: '/tabs/',
    component: TabsPage,
    children: [
      {
        path: '',
        redirect: '/tabs/home'
      },
      {
        path: 'home',
        name: 'HomePage',
        component: () => import('@/views/Home.vue')
      },
      {
        path: 'register',
        name: 'RegisterPage',
        component: () => import('@/views/Register.vue')
      },
      {
        path: 'spendings',
        name: 'SpendingsPage',
        component: () => import('@/views/Spendings.vue')
      },
      {
        path: 'transactions',
        name: 'TransactionsPage',
        component: () => import('@/views/Transactions.vue')
      },
      {
        path: 'transaction',
        name: 'TransactionPage',
        component: () => import('@/views/Transaction.vue')
      },
      {
        path: 'settings',
        name: 'SettingsPage',
        component: () => import('@/views/Settings.vue')
      }
    ]
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router

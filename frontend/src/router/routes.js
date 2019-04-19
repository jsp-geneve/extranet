const routes = [
  {
    path: '/',
    component: () => import('layouts/BaseLayout.vue'),
    children: [
      {
        path: '/login',
        component: () => import('pages/Login.vue')
      },
      {
        path: '',
        component: { template: `<b>Index</b>` }
      },
      {
        path: '*',
        component: () => import('pages/Error404.vue')
      }
    ]
  }
]

export default routes

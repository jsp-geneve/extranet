const routes = [
  {
    path: '/',
    component: () => import( 'layouts/BaseLayout.vue' ),
    children: [
      {
        path: '/login',
        component: () => import( 'pages/Login.vue' ),
        meta: {
          public: true,
          onlyWhenLoggedOut: true,
        },
      },
      {
        path: '*',
        component: () => import( 'pages/Error404.vue' ),
      },
    ],
  },
]

export default routes

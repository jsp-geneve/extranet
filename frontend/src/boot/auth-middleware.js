// import something here

// "async" is optional
export default ({ router }) => {
  router.beforeEach((to, from, next) => {
    const publicPages = ['/login']
    const authRequired = !publicPages.includes(to.path)
    const loggedIn = false // TODO: authservice

    if (authRequired && !loggedIn) {
      return next('/login')
    }

    next()
  })
}

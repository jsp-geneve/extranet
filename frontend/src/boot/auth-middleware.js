import auth from '../services/auth'

export default ({ router }) => {
  router.beforeEach( ( to, from, next ) => {
    const isPublic = to.matched.some( record => record.meta.public )
    const onlyWhenLoggedOut = to.matched.some( record => record.meta.onlyWhenLoggedOut )

    if ( !isPublic && !auth.isAuthenticated ) {
      return next({
        path: '/login',
        query: { redirect: to.fullPath }, // Store the full path to redirect the user to after login
      })
    }

    if ( auth.isAuthenticated && onlyWhenLoggedOut ) {
      return next( '/' )
    }

    next()
  })
}

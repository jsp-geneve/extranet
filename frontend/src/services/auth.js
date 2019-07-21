const TOKEN_KEY = 'access_token'

export default {
  getToken () {
    return localStorage.getItem( TOKEN_KEY )
  },

  saveToken ( accessToken ) {
    return localStorage.setItem( TOKEN_KEY, accessToken )
  },

  removeToken () {
    return localStorage.removeItem( TOKEN_KEY )
  },

  get isAuthenticated () {
    return !!this.getToken() && this.getToken() !== 'undefined'
  },
}

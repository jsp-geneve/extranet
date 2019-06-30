import { ApolloClient } from 'apollo-client'
import { HttpLink } from 'apollo-link-http'
import { setContext } from 'apollo-link-context'
import { InMemoryCache } from 'apollo-cache-inmemory'
import VueApollo from 'vue-apollo'
import auth from '../services/auth'

const httpLink = new HttpLink({
  uri: 'http://localhost:9002/graphql', // TODO: env variable
})

// https://www.apollographql.com/docs/react/recipes/authentication/
const authLink = setContext( ( _, { headers }) => {
  let token = auth.getToken()
  return {
    headers: {
      ...headers,
      authorization: token ? `Bearer ${token}` : '',
    },
  }
})

const apolloClient = new ApolloClient({
  link: authLink.concat( httpLink ),
  cache: new InMemoryCache(),
  connectToDevTools: true, // TODO: env variable
})

export const apolloProvider = new VueApollo({
  defaultClient: apolloClient,
  errorHandler ({ graphQLErrors, networkError }) {
    if ( graphQLErrors ) {
      graphQLErrors.map( ({ message, locations, path }) =>
        console.log(
          `[GraphQL error]: Message: ${message}, Location: ${locations}, Path: ${path}`
        )
      )
    }
    if ( networkError ) {
      console.log( `[Network error]: ${networkError}` )
    }
  },
})

export default ({ app, Vue }) => {
  Vue.use( VueApollo )
  app.apolloProvider = apolloProvider
}

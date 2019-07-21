<template>
  <q-form
    class="q-gutter-md"
  >
    <q-input
      filled
      v-model="email"
      label="Adresse mail"
      color="grey-8"
    />

    <q-input
      v-model="password"
      filled
      color="grey-8"
      :type="isPwd ? 'password' : 'text'"
      label="Mot de passe">
      <template v-slot:append>
        <q-icon
          :name="isPwd ? 'visibility_off' : 'visibility'"
          class="cursor-pointer"
          @click="isPwd = !isPwd"
        />
      </template>
    </q-input>

    <div class="flex flex-center">
      <ApolloMutation
        :mutation="query"
        :variables="{
          email,
          password,
        }"
        @error="e => this.$q.notify(e)"
        @done="onDone"
      ><!-- TODO: better error handling -->
        <template slot-scope="{ mutate: submitLogin, loading, /* error */ }">
          <q-btn
            :disabled="loading"
            @click="submitLogin()"
            label="se connecter"
            type="submit"
            color="accent"
            id="foobar"
          />
        </template>
      </ApolloMutation>
    </div>
  </q-form>
</template>

<style>
</style>

<script>
import { login } from '../graphql/auth.gql'
import auth from '../services/auth'

export default {
  name: 'Login',
  data () {
    return {
      isPwd: true,
      email: null,
      password: null,
      query: login,
    }
  },
  methods: {
    onDone ( response ) {
      const token = response.data.login.access_token
      this.$q.notify( `Connecté avec succès` )
      auth.saveToken( token )
      this.$router.push( this.$route.query.redirect )
    },
  },
}
</script>

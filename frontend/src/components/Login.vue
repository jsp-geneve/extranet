<template>
  <q-form
    @submit="onSubmit"
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

    <q-toggle
      v-model="remember_me"
      label="Se souvenir de moi sur cet appareil"
      color="accent"
    />

    <div class="flex flex-center">
      <q-btn label="se connecter" type="submit" color="accent"/>
    </div>
  </q-form>
</template>

<style>
</style>

<script>
import gql from 'graphql-tag'

export default {
  name: 'Login',
  data () {
    return {
      isPwd: true,
      email: null,
      password: null,
      remember_me: false
    }
  },
  methods: {
    async onSubmit () {
      const result = await this.$apollo.mutate({
        mutation: gql`mutation (
          $email: String!, 
          $password: String!, 
          $rememberMe: Boolean!
        ) {
          login(
            email: $email, 
            password: $password, 
            rememberMe: $rememberMe
          ) {
            id
          }
        }`,
        variables: {
          email: this.email,
          password: this.password,
          rememberMe: this.remember_me,
        },
      })
      console.log(result)
    }
  }
}
</script>

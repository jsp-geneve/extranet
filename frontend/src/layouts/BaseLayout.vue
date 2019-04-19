<template>
  <q-layout view="hHh lpR fFf">

    <q-header elevated class="bg-grey text-white">
      <q-toolbar>
        <q-avatar>
          <img src="statics/badge.png">
        </q-avatar>
        <q-toolbar-title>
          <b>JSP</b>GENÈVE
        </q-toolbar-title>
      </q-toolbar>
    </q-header>

    <q-page-container>
      <router-view />
    </q-page-container>

  </q-layout>
</template>

<script>
export default {
  data () {
    return {
    }
  }
}
</script>

<template>
  <div>
    <v-navigation-drawer
      v-model="drawer"
      fixed
      temporary
    >
      <div class="grey lighten-3 pa-5">
        <nuxt-link :to="$lang.link('')">
          <v-img
            :lazy-src="baseUrl + logoLink"
            :src="baseUrl + logoLink"
            alt="Adamanta"
            @click="drawer = !drawer"
          ></v-img>
        </nuxt-link>
        <h1 class="light-green--text size18-weight700 ma-0 mb-5">Химия - это просто!</h1>
        <div class="size14-weight400 d-flex align-end justify-center mb-5">
          <v-icon color="black" class="mr-2">mdi-map-marker</v-icon>
          Украина, Харьков
        </div>
        <div class="size14-weight400 d-flex align-end justify-center mb-5">
          <v-icon color="black" class="mr-2">mdi-phone</v-icon>
          +380993177752
        </div>
        <language  class="d-flex align-end justify-center mb-5"/>
        <div class="d-flex align-end justify-center header-buttons mb-3">
          <SearchWithDialog class="mr-2" is-mobile/>
          <v-btn
            color="light-green"
            class="mr-2"
            outlined
            fab
            icon
            small
            @click="$emit('openDialog', 'profile')"
          >
            <v-icon color="black">mdi-account-circle</v-icon>
          </v-btn>
          <v-btn
            color="light-green"
            outlined
            fab
            icon
            small
            @click="$emit('openDialog', 'basket')"
          >
            <v-icon color="black">mdi-cart</v-icon>
          </v-btn>
        </div>
      </div>
      <NavMenu/>
    </v-navigation-drawer>

    <v-app-bar
      app
      :collapse-on-scroll="collapseOnScroll"
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
    </v-app-bar>
  </div>
</template>

<script>
export default {
  name: "HeaderMobile",
  components: {
    SearchWithDialog: () => import('~~/components/common/SearchWithDialog'),
    Language: () => import('~~/components/common/Language'),
    NavMenu: () => import('~~/components/default/header/NavMenu.vue')
  },
  data() {
    return {
      drawer: false,
      collapseOnScroll: true,
      logoLink: 'image/logo.svg',
    }
  },
}
</script>

<style scoped>

</style>

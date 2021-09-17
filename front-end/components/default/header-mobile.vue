<template>
  <div>
    <v-navigation-drawer
      v-model="drawer"
      fixed
      temporary
    >
      <div class="grey lighten-3 pa-5">
        <a href="#">
          <v-img
            @click="drawer = !drawer"
            lazy-src="image/logo.svg"
            src="image/logo.svg"
          ></v-img>
        </a>
        <h1 class="light-green--text size18-weight700 ma-0 mb-5">Химия - это просто!</h1>
        <Search isMobile class="mb-3"/>
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
          <v-btn
            color="light-green"
            class="mr-2"
            outlined
            fab
            icon
            small
          >
            <v-icon color="black">mdi-account-circle</v-icon>
          </v-btn>
          <v-btn
            color="light-green"
            outlined
            fab
            icon
            small
          >
            <v-icon color="black">mdi-cart</v-icon>
          </v-btn>
        </div>
      </div>
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
import Search from '~~/components/common/search';
import Language from '~~/components/common/language';

export default {
  name: "HeaderMobile",
  components: {
    Search,
    Language,
  },
  data() {
    return {
      drawer: false,
      collapseOnScroll: true,
    }
  }
}
</script>

<style scoped>

</style>

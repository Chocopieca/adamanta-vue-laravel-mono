<template>
  <div>
    <v-navigation-drawer
      v-model="drawer"
      fixed
      temporary
    >
      <div class="grey lighten-3 pa-5">
        <nuxt-link :to="$lang.link('/')">
          <v-img
            lazy-src="image/logo.svg"
            src="image/logo.svg"
            alt="Adamanta"
            @click="drawer = !drawer"
          ></v-img>
        </nuxt-link>
        <h1 class="light-green--text size18-weight700 ma-0 mb-5">Химия - это просто!</h1>
        <Search class="mb-3" is-mobile/>
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
            @click="$refs.login.toggle()"
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

    <Dialog ref="login">
      <LoginForm @forgotPass="$refs['forgot-login'].toggle()"/>
    </Dialog>
    <Dialog ref="forgot-login">
      <ForgotLogin @submit="sendCode"/>
    </Dialog>
    <Dialog ref="forgot-pass">
      <ForgotPassword @changePass="$refs['forgot-pass'].toggle()"/>
    </Dialog>
  </div>
</template>

<script>
export default {
  name: "HeaderMobile",
  components: {
    Search: () => import('~~/components/common/Search'),
    Language: () => import('~~/components/common/Language'),
    Dialog: () => import('~~/components/common/Dialog'),
    LoginForm: () => import('~~/components/system/LoginForm'),
    ForgotLogin: () => import('~~/components/system/ForgotLogin'),
    ForgotPassword: () => import('~~/components/system/ForgotPassword'),
  },
  data() {
    return {
      drawer: false,
      collapseOnScroll: true,
    }
  },
  methods: {
    sendCode() {
      this.$refs['forgot-login'].toggle();
      this.$refs['forgot-pass'].toggle();
    }
  }
}
</script>

<style scoped>

</style>

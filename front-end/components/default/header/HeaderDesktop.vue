<template>
  <v-container fluid class="grey lighten-3 black--text pa-0">
    <v-container>
      <v-row justify="center" align="end">
        <v-col>
          <nuxt-link :to="$lang.link('')">
            <v-img
              lazy-src="image/logo.svg"
              max-height="150"
              max-width="250"
              src="image/logo.svg"
              alt="Adamanta"
            ></v-img>
          </nuxt-link>
        </v-col>
        <v-col class="pb-2">
          <h1 class="light-green--text size18-weight700 ma-0">Химия - это просто!</h1>
        </v-col>
        <v-col>
          <div class="size14-weight400 d-flex align-end">
            <v-icon color="black" class="mr-2">mdi-map-marker</v-icon>
            Украина, Харьков
          </div>
        </v-col>
        <v-col>
          <div class="size14-weight400 d-flex align-end">
            <v-icon color="black" class="mr-2">mdi-phone</v-icon>
            +380993177752
          </div>
        </v-col>
        <v-col cols="1">
          <language />
        </v-col>
        <v-col cols="3">
          <div class="d-flex justify-end header-buttons">
            <Search class="mr-2"/>
            <v-btn
              color="light-green"
              class="mr-2"
              outlined
              fab
              icon
              small
              @click="openDialog('ProfilePage')"
            >
              <v-icon color="black">mdi-account-circle</v-icon>
            </v-btn>
            <v-btn
              color="light-green"
              outlined
              fab
              icon
              small
              @click="openDialog('BasketPage')"
            >
              <v-icon color="black">mdi-cart</v-icon>
            </v-btn>
          </div>
        </v-col>
      </v-row>
    </v-container>

    <Dialog ref="login">
      <LoginForm
        :link-to="dialog"
        @forgotPass="$refs['forgot-login'].toggle()"
        @close="$refs['login'].toggle()"
      />
    </Dialog>
    <Dialog ref="forgot-login">
      <ForgotLogin @submit="sendCode"/>
    </Dialog>
    <Dialog ref="forgot-pass">
      <ForgotPassword @changePass="$refs['forgot-pass'].toggle()"/>
    </Dialog>
  </v-container>
</template>

<script>
export default {
  name: "HeaderDesktop",
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
      dialog: 'HomePage',
    }
  },
  methods: {
    sendCode() {
      this.$refs['forgot-login'].toggle();
      this.$refs['forgot-pass'].toggle();
    },
    openDialog(type) {
      this.$refs.login.toggle();
      this.dialog = type;
    },
  }
}
</script>

<style scoped lang="scss">
::v-deep.header-buttons {
  display: flex;
  justify-content: end;

  .v-btn {
    border: 2px solid var(--v-main_green-base);
  }
}
</style>

<template>
  <div>
    <HeaderDesktop
      v-if="$vuetify.breakpoint.lgAndUp"
      class="header-fixed"
      @openDialog="openDialog"
    />
    <HeaderMobile v-else @openDialog="openDialog"/>

    <Dialog ref="login">
      <LoginForm
        :link-to="dialog"
        @forgotPass="onForgotPassword"
        @close="$refs['login'].toggle()"
      />
    </Dialog>
    <Dialog ref="forgot-login" @close="$refs['forgot-login-card'].reset()">
      <ForgotPassword ref="forgot-login-card" @changePass="$refs['forgot-login'].toggle()"/>
    </Dialog>
  </div>
</template>

<script>
export default {
  name: "Header",
  components: {
    HeaderMobile: () => import('~~/components/default/header/HeaderMobile.vue'),
    HeaderDesktop: () => import('~~/components/default/header/HeaderDesktop.vue'),
    Dialog: () => import('~~/components/common/Dialog'),
    LoginForm: () => import('~~/components/system/LoginForm'),
    ForgotPassword: () => import('~~/components/system/ForgotPassword'),
  },
  data() {
    return {
      dialog: 'HomePage',
    }
  },
  methods: {
    openDialog(type) {
      this.$refs.login.toggle();
      this.dialog = type;
    },
    onForgotPassword() {
      this.$refs['forgot-login'].toggle();
      this.$refs.login.toggle();
    }
  }
}
</script>

<style scoped lang="scss">
.header-fixed {
  position: fixed;
  z-index: 1;
}
</style>

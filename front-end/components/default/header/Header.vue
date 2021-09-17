<template>
  <div>
    <HeaderDesktop @openDialog="openDialog" v-if="$vuetify.breakpoint.mdAndUp"/>
    <HeaderMobile @openDialog="openDialog" v-else/>

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

<style scoped>

</style>

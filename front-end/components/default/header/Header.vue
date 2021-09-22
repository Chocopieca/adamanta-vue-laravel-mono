<template>
  <div>
    <HeaderDesktop @openDialog="openDialog" v-if="$vuetify.breakpoint.lgAndUp"/>
    <HeaderMobile @openDialog="openDialog" v-else/>

    <Dialog ref="login">
      <LoginForm
        :link-to="dialog"
        @forgotPass="$refs['forgot-login'].toggle()"
        @close="$refs['login'].toggle()"
      />
    </Dialog>
    <Dialog ref="forgot-login">
      <ForgotPassword @changePass="$refs['forgot-login'].toggle()"/>
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
  }
}
</script>

<style scoped>

</style>

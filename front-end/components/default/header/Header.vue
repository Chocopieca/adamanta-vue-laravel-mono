<template>
  <div>
    <HeaderDesktop v-if="$vuetify.breakpoint.mdAndUp"/>
    <HeaderMobile v-else/>
  </div>
</template>

<script>
export default {
  name: "Header",
  components: {
    HeaderMobile: () => import('~~/components/default/header/HeaderMobile.vue'),
    HeaderDesktop: () => import('~~/components/default/header/HeaderDesktop.vue'),
  },
  data() {
    return {
      loginDialog: false,
    }
  },
}
</script>

<style scoped>

</style>

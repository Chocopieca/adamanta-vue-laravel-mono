<template>
  <v-container fluid class="pa-0">
    <Banner />

    <v-container class="pa-0">
      <Category />
    </v-container>

    <v-container class="mb-md-100 mb-16">
      <Benefits />
    </v-container>

    <v-container class="pa-0 mb-md-100 mb-16 pa-5">
      <PopularProducts />
    </v-container>

    <v-container class="pa-0 mb-md-100 mb-16 pa-5">
      <Reviews />
    </v-container>
  </v-container>
</template>

<script>
export default {
  name: "HomePage",
  components: {
    Banner: () => import('~~/components/home-page/Banner'),
    Category: () => import('~~/components/home-page/Category'),
    Benefits: () => import('~~/components/home-page/Benefits'),
    PopularProducts: () => import('~~/components/home-page/PopularProducts'),
    Reviews: () => import('~~/components/home-page/Reviews'),
  },
}
</script>

<style scoped lang="scss">

</style>

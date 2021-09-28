<template>
  <v-container class="pa-0">

    <Breadcrumbs :items="breadcrumbs"/>

    <slot></slot>

    <PopularProducts class="mb-md-100 mb-16" />

  </v-container>
</template>

<script>
export default {
  name: "CommonPagesLayout",
  components: {
    PopularProducts: () => import('~~/components/home-page/PopularProducts'),
    Breadcrumbs: () => import('~~/components/common/Breadcrumbs'),
  },
  props: {
    breadcrumbs: {
      type: Array,
      default: () => [],
    }
  }
}
</script>

<template>
  <v-container class="pa-0">

    <Breadcrumbs :items="breadcrumbs"/>

    <slot></slot>

    <PopularProducts v-if="isShowPopular" class="mb-md-100 mb-16" />

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
    },
    isShowPopular: {
      type: Boolean,
      default: true,
    },
  }
}
</script>

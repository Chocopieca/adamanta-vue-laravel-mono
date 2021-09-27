<template>
  <v-breadcrumbs :items="items" divider="/" class="pa-3">
    <template v-slot:item="{ item }">
      <v-breadcrumbs-item
        nuxt
        exact
        :to="item.href"
      >
        {{ item.text }}
      </v-breadcrumbs-item>
    </template>
  </v-breadcrumbs>
</template>

<script>
export default {
  name: "Breadcrumbs",
  props: {
    items: {
      type: Array,
      default: () => [
        {
          text: 'Главная',
          href: '/',
        },
      ]
    }
  }
}
</script>

<style scoped>

</style>

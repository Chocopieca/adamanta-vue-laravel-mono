<template>
  <v-breadcrumbs :items="items" divider="/" class="pa-3 py-8">
    <template #item="{ item }">
      <v-breadcrumbs-item
        nuxt
        exact
        :to="$lang.link(item.href)"
        :class="vuetifyBreakpoint.mdAndUp ? 'size14-weight400' : 'size10-weight400'"
      >
        {{ item.text }}
      </v-breadcrumbs-item>
    </template>
  </v-breadcrumbs>
</template>

<script>
// TODO Update item array with push() method
export default {
  name: "Breadcrumbs",
  props: {
    items: {
      type: Array,
      default: () => [
        {
          text: 'Главная',
          href: '',
        },
      ]
    }
  }
}
</script>

<style scoped>

</style>

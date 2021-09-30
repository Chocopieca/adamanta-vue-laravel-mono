<template>
  <div>
    <v-tabs :color="vuetifyMainBlue">
      <v-tab v-for="(item, index) in tabs" :key="index" class="size18-weight700">
        {{ item.title }}
      </v-tab>

      <slot />
    </v-tabs>
  </div>
</template>

<script>

export default {
  name: "Tabs",
  props: {
    tabs: {
      type: Array,
      default: () => []
    }
  },
}
</script>

<style scoped>

</style>

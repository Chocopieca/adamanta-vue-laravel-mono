<template>
  <v-tabs :color="vuetifyMainBlue" class="tabs">
    <v-tab v-for="(item, index) in tabs" :key="index" class="size18-weight700">
      {{ item.title }}
    </v-tab>

    <slot />
  </v-tabs>
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

<style scoped lang="scss">
@import '~vuetify/src/styles/styles.sass';

::v-deep.tabs .v-slide-group__prev {
  @media (max-width: map-get($grid-breakpoints, md)) {

    display: none !important;
  }
}
</style>

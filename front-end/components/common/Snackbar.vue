<template>
  <v-snackbar
    v-model="snackbar"
    :color="vuetifyMainGreen"
    outlined
    right
  >
    {{ content }}

    <template v-slot:action="{ attrs }">
      <v-btn
        :color="vuetifyMainGreen"
        icon
        v-bind="attrs"
        @click="snackbar = false"
      >
        <v-icon>mdi-close</v-icon>
      </v-btn>
    </template>
  </v-snackbar>
</template>

<script>
export default {
  name: "Snackbar",
  props: {
    content: {
      type: String,
      default: 'Hello, I\'m a snackbar',
    }
  },
  data: () => ({
    snackbar: false,
  }),
  methods: {
    toggle() {
      this.snackbar = true;
    }
  }
}
</script>

<style scoped>

</style>

<template>
  <v-dialog v-model="dialog" width="628 ">
    <v-card>
      <v-card-title>
        <v-spacer></v-spacer>
        <v-btn small icon @click="toggle">
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </v-card-title>
      <v-card-text>
        <slot></slot>
      </v-card-text>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  name: "Dialog",
  data() {
    return {
      dialog: false,
    }
  },
  methods: {
    toggle() {
      this.dialog = !this.dialog;
    }
  }
}
</script>

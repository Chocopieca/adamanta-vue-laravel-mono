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
  props: {
    hasCloseAction: {
      type: Boolean,
      default: false,
    },
    to: {
      type: String,
      default: '',
    }
  },
  data() {
    return {
      dialog: false,
    }
  },
  methods: {
    toggle() {
      this.dialog = !this.dialog;
    }
  },
  watch: {
    dialog(val) {
      if (!val && this.hasCloseAction) {
        this.$router.push(this.$lang.link(this.to))
      }
    }
  }
}
</script>

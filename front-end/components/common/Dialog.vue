<template>
  <v-dialog v-model="dialog" width="628" @click:outside="$emit('close')">
    <v-card class="rounded-lg">
      <v-card-title>
        <v-spacer></v-spacer>
        <v-btn small icon @click="toggle">
          <v-icon size="40" :color="vuetifyMainBlack">mdi-close</v-icon>
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
  watch: {
    dialog(val) {
      if (!val && this.hasCloseAction) {
        this.$router.push(this.$lang.link(this.to))
      }
    }
  },
  methods: {
    toggle() {
      this.dialog = !this.dialog;
      if (!this.dialog) {
        this.$emit('close');
      }
    }
  },
}
</script>

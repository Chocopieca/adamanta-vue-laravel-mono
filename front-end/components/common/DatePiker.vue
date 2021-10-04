<template>
  <v-menu
    ref="menu"
    v-model="menu"
    :close-on-content-click="false"
    :return-value.sync="date"
    transition="scale-transition"
    offset-y
    min-width="auto"
  >
    <template v-slot:activator="{ on, attrs }">
      <v-text-field
        v-model="date"
        append-icon="mdi-calendar"
        placeholder="Ваша дата рождения"
        readonly
        dense
        outlined
        v-bind="attrs"
        v-on="on"
      ></v-text-field>
    </template>
    <v-date-picker
      v-model="date"
      no-title
      scrollable
    >
      <v-spacer></v-spacer>
      <v-btn
        text
        color="primary"
        @click="menu = false"
      >
        Cancel
      </v-btn>
      <v-btn
        text
        color="primary"
        @click="$refs.menu.save(date)"
      >
        OK
      </v-btn>
    </v-date-picker>
  </v-menu>
</template>

<script>
export default {
  name: "DatePiker",
  props: {
    value: {
      type: String,
      default: () => {},
    }
  },
  data: () => ({
    date: null,
    menu: false,
  }),
  watch: {
    date() {
      this.$emit('input', this.date)
    }
  }
}
</script>

<style scoped>

</style>

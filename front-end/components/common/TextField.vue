<template>
  <v-text-field
    :value="value"
    :label="label"
    :placeholder="placeholder"
    :outlined="outlined"
    :required="required"
    :type="password ? showPassword : ''"
    :dense="dense"
    :append-icon="password ? appendIcon : ''"
    @click="$emit('input', $event.target.value)"
    @click:append="show = !show"
  />
</template>

<script>
export default {
  name: "TextField",
  model: {
    prop: 'value',
    event: 'input',
  },
  props: {
    value: {
      type: String,
      default: '',
    },
    label: {
      type: String,
      default: ''
    },
    placeholder: {
      type: String,
      default: ''
    },
    outlined: {
      type: Boolean,
      default: true
    },
    dense: {
      type: Boolean,
      default: false
    },
    required: {
      type: Boolean,
      default: false
    },
    rules: {
      type: Array,
      default: () => []
    },
    password: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      show: false,
    }
  },
  computed: {
    showPassword() {
      return this.show ? 'text' : 'password';
    },
    appendIcon() {
     return !this.show ? 'mdi-eye' : 'mdi-eye-off'
    }
  }
}
</script>

<style scoped>

</style>

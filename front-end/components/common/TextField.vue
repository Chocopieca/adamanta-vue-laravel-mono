<template>
  <v-text-field
    :value="value"
    :label="label"
    :placeholder="placeholder"
    :outlined="outlined"
    :required="required"
    :dense="dence"
  />
</template>

<script>
export default {
  name: "TextField",
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
    }
  }
}
</script>

<style scoped>

</style>

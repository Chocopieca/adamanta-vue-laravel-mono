<template>
  <v-text-field
    :value="value"
    :label="label"
    :placeholder="placeholder"
    :outlined="outlined"
    :required="required"
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

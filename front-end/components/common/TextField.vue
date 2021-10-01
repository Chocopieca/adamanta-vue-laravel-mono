<template>
  <v-text-field
    :value="value"
    :label="label"
    :placeholder="placeholder"
    :outlined="outlined"
    :required="required"
    :dense="dense"
    @click="$emit('input', $event.target.value)"
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
    }
  }
}
</script>

<style scoped>

</style>

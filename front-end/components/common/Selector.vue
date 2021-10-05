<template>
  <v-select
    :value="value"
    :dense="dense"
    :outlined="outlined"
    :items="items"
    :placeholder="placeholder"
    @click="$emit('input', $event.target.value)"
  />
</template>

<script>
export default {
  name: "Selector",
  props: {
    value: {
      type: String,
      default: '',
    },
    items: {
      type: Array,
      default: () => [],
    },
    placeholder: {
      type: String,
      default: '',
    },
    dense: {
      type: Boolean,
      default: true,
    },
    outlined: {
      type: Boolean,
      default: true,
    },
  }
}
</script>

<style scoped lang="scss">

</style>

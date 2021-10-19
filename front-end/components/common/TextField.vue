<template>
  <v-text-field
    class="custom-input"
    :value="value"
    :label="label"
    :placeholder="placeholder"
    :outlined="outlined"
    :required="required"
    :type="password ? showPassword : ''"
    :dense="dense"
    :append-icon="password ? appendIcon : ''"
    :hide-details="hideDetails"
    :rules="[...rules]"
    @input="submit"
    @click:append="show = !show"
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
    },
    password: {
      type: Boolean,
      default: false,
    },
    hideDetails: {
      type: Boolean,
      default: true,
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
  },
  methods: {
    submit(val) {
      this.$emit('input', val)
    }
  }
}
</script>

<style scoped lang="scss">
::v-deep.custom-input {
  & input {
    font-size: 16px !important;
  }
}
</style>

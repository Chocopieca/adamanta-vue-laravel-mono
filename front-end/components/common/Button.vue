<template>
  <v-btn
    :style="`color: ${colorText}; background: ${colorButton}`"
    :min-height="minHeight"
    :max-width="maxWidth"
    :max-height="maxHeight"
    :text="text"
    :fab="fab"
    :small="small"
    :outlined="outlined"
    :rounded="rounded"
    :ripple="{ class: `mainGreenColor` }"
    @click="$emit('submit')"
    class="elevation-0"
  >
    <span v-if="content" :class="textStyle()">{{ content }}</span>
    <v-icon v-if="icon">{{ icon }}</v-icon>
  </v-btn>
</template>

<script>
export default {
  name: "Button",
  props: {
    colorButton: {
      type: String,
      default: '#98CA33',
    },
    colorText: {
      type: String,
      default: '#FFFFFF'
    },
    content: {
      type: String,
      default: ''
    },
    minHeight: {
      type: [Number, String],
      default: null,
    },
    maxWidth: {
      type: [Number, String],
      default: null,
    },
    maxHeight: {
      type: [Number, String],
      default: null,
    },
    icon: {
      type: String,
      default: '',
    },
    text: {
      type: Boolean,
      default: false,
    },
    fab: {
      type: Boolean,
      default: false,
    },
    small: {
      type: Boolean,
      default: false
    },
    outlined: {
      type: Boolean,
      default: false
    },
    rounded: {
      type: Boolean,
      default: true
    },
    fontSize: {
      type: String,
      default: '',
    }
  },
  methods: {
    textStyle() {
      let style = '';
      style += this.icon ? 'flex-center mt-1 mr-5' : ''
      style += ' ' + this.fontSize;
      return style;
    }
  }
}
</script>

<template>
  <vue-recaptcha
    :ref="emit"
    :class="dataClass"
    :sitekey="$env.recaptchaKey"
    :load-recaptcha-script="$env.recaptchaEnabled"
    @verify="setToken($event)"
    @expired="onCaptchaExpired()"
  />
</template>

<script>
export default {
  name: "Recaptcha",
  components: {
    VueRecaptcha: () => import('vue-recaptcha')
  },
  props: {
    emit: {
      type: String,
      default: null
    },
    model: {
      type: Object,
      default: null
    },
    dataClass: {
      type: String,
      default: null
    },
  },
  created() {
    this.$root.$on(this.emit + 'CaptchaReset', () => {
      this.onCaptchaExpired()
    })
  },
  methods: {
    setToken(token) {
      this.model['recaptcha_token'] = token
    },
    onCaptchaExpired() {
      this.$refs[this.emit].reset()
    }
  }
}
</script>
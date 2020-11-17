<template>
  <div class="mt-20 text-center">
    <div v-if="confMsg === 'confirmation_success'">
      <h4 class="mb-10">
        {{ $t('auth.confirm_success') }}
      </h4>
      <h4 class="mb-10">
        {{ $t('auth.confirm_success_faq') }}
      </h4>
      <h4>
        {{ $t('auth.confirm_success_best_regards')}}
      </h4>
    </div>
    <div v-else>
      <h3>{{ $t('auth.' + confMsg) }}</h3>
    </div>

    <div class="mt-20">
      <nuxt-link to="/">
        <el-button type="primary">{{ $t('labels.on_main') }}</el-button>
      </nuxt-link>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        confMsg: ''
      }
    },
    created() {
      this.$axios.put(this.$env.apiUrl + 'system/activation-email', this.$route.params)
        .then(response => {
          this.confMsg = response.data
        })
        .catch(error => {
          console.log(error)
        });
    }
}
</script>

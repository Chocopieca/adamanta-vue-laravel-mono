<template>
  <div class="px-md-16">
    <div class="size24-weight700 mb-6">Восстановление логина</div>
    <v-divider class="mb-6"/>
    <v-form ref="form" lazy-validation>
      <div class="size16-weight400 mb-3">Для смены пароля введите логин</div>
      <v-text-field
        v-model="forgotData"
        placeholder="e-mail / phone"
        outlined
        required
      />
      <v-btn
        class="w-100 mb-6 white--text"
        color="light-green"
        rounded
        @click="$emit('submit')"
      >
        Отправить код
      </v-btn>
    </v-form>
  </div>
</template>

<script>
export default {
  name: "LoginForm",
  data() {
    return {
      forgotData: '',
    }
  },
}
</script>

<template>
  <div class="px-md-16">
    <div class="size24-weight700 mb-6">Восстановление пароля</div>
    <v-divider class="mb-6"/>
    <v-form
      ref="form"
      lazy-validation
    >
      <div class="size16-weight400 mb-3">Введите код</div>
      <v-text-field
        v-model="enteredCode"
        placeholder="Код"
        outlined
        required
      />

      <div class="size16-weight400 mb-3">Введите пароль</div>
      <v-text-field
        v-model="forgotPassword"
        placeholder="Пароль"
        :rules="(v) => v !== copyPassword || 'Пароль не совподает'"
        outlined
        required
      />

      <div class="size16-weight400 mb-3">Подтвердите пароль</div>
      <v-text-field
        v-model="copyPassword"
        placeholder="Пароль"
        outlined
        required
      />

      <v-btn
        class="w-100 mb-6 white--text"
        color="light-green"
        rounded
        @click="$emit('changePass')"
      >
        Подтвердить
      </v-btn>
    </v-form>
  </div>
</template>

<script>
export default {
  name: "LoginForm",
  data() {
    return {
      enteredCode: '',
      forgotPassword: '',
      copyPassword: '',
    }
  }
}
</script>

<style scoped>

</style>

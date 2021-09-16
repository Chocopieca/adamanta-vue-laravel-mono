<template>
  <div class="px-md-16">
    <div class="size24-weight700 mb-6">Вход</div>
    <v-divider class="mb-6"/>
    <v-form
      ref="form"
      lazy-validation
    >
      <v-text-field
        v-model="loginData"
        placeholder="E-mail / Phone"
        outlined
        required
      />

      <v-text-field
        v-model="loginPassword"
        placeholder="Пароль"
        outlined
        required
      />

      <v-row no-gutters justify="space-between" align="center" class="mb-6">
        <v-checkbox
          class="ma-0"
          v-model="rememberMe"
          label="Запомнить меня"
          hide-details
          required
        />

        <v-btn
          text
          small
          class="text-underline"
          @click="$emit('forgotPass')"
        >
          Забыл пароль ?
        </v-btn>
      </v-row>
      <v-btn
        class="w-100 mb-6 white--text"
        color="light-green"
        rounded
      >
        Войти
      </v-btn>
      <v-btn
        class="w-100 mb-6"
        color="light-green"
        rounded
        outlined
      >
        Зарегестрироваться
      </v-btn>
      <v-btn text small class="w-100 text-underline">
        Продолжить без регистрации
      </v-btn>
    </v-form>
  </div>
</template>

<script>
export default {
  name: "LoginForm",
  data() {
    return {
      loginData: '',
      loginPassword: '',
      rememberMe: false,
    }
  }
}
</script>

<style scoped>

</style>

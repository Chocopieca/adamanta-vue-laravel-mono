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
      <nuxt-link class="text-underline-none"  :to="$lang.link(linkTo)">
        <v-btn
          class="w-100 mb-6 white--text"
          color="light-green"
          rounded
          @click="$emit('close')"
        >
          Войти
        </v-btn>
      </nuxt-link>
      <nuxt-link class="text-underline-none" :to="$lang.link('registration')">
        <v-btn
          class="w-100 mb-6"
          color="light-green"
          rounded
          outlined
          @click="$emit('close')"
        >
          Зарегестрироваться
        </v-btn>
      </nuxt-link>
      <nuxt-link v-if="linkTo !== 'ProfilePage'" :to="{ name: $lang.link(linkTo) }">
        <v-btn text small class="w-100 text-underline" @click="$emit('close')">
          Продолжить без регистрации
        </v-btn>
      </nuxt-link>
    </v-form>
  </div>
</template>

<script>
export default {
  name: "LoginForm",
  props: {
    linkTo: {
      type: String,
      default: '',
    }
  },
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

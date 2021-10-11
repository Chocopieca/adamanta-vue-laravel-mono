<template>
  <div class="px-md-16">
    <div class="size24-weight700 mb-6">Вход</div>
    <v-divider class="mb-6"/>
    <v-form
      ref="form"
      lazy-validation
    >
      <TextField
        v-model="loginData"
        placeholder="E-mail / Phone"
        required
        class="mb-5"
      />

      <TextField
        v-model="loginPassword"
        placeholder="Пароль"
        password
        required
        class="mb-5"
      />

      <v-row no-gutters justify="space-between" align="center" class="mb-6">
        <v-checkbox
          v-model="rememberMe"
          class="ma-0"
          label="Запомнить меня"
          hide-details
          required
        />

        <Button
          :color-text="vuetifyMainBlack"
          :color-button="vuetifyTransparent"
          content="Забыл пароль ?"
          text
          small
          class="text-underline"
          @submit="$emit('forgotPass')"
        />
      </v-row>
      <nuxt-link :to="$lang.link(linkTo)">
        <Button
          content="Войти"
          class="w-100 mb-6"
          @submit="$emit('close')"
        />
      </nuxt-link>
      <nuxt-link :to="$lang.link('registration')">
        <Button
          content="Зарегестрироваться"
          :color-button="vuetifyTransparent"
          :color-text="vuetifyMainBlack"
          class="w-100 mb-6"
          outlined
          @submit="$emit('close')"
        />
      </nuxt-link>
      <nuxt-link v-if="linkTo !== 'ProfilePage'" :to="$lang.link(linkTo)">
        <Button
          :color-text="vuetifyMainBlack"
          :color-button="vuetifyTransparent"
          content="Продолжить без регистрации"
          text
          small
          class="w-100 text-underline"
          @submit="$emit('close')"
        />
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

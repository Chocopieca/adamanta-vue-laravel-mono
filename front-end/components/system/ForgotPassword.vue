<template>
  <div class="px-md-16">
    <v-window v-model="step">
      <v-window-item :value="1">
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
            @click="step++"
          >
            Отправить код
          </v-btn>
        </v-form>
      </v-window-item>
      <v-window-item :value="2">
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
            @click="submit"
          >
            Подтвердить
          </v-btn>
        </v-form>
      </v-window-item>
    </v-window>
  </div>
</template>

<script>
export default {
  name: "LoginForm",
  data() {
    return {
      forgotData: '',
      step: 1,
      enteredCode: '',
      forgotPassword: '',
      copyPassword: '',
    }
  },
  methods: {
    submit() {
      this.step = 1;
      this.$emit('changePass');
    }
  }
}
</script>

<template>
  <div class="px-md-16">
    <v-window v-model="step">
      <v-window-item :value="1">
        <div class="size24-weight700 mb-6">Восстановление логина</div>
        <v-divider class="mb-6"/>
        <v-form ref="form" lazy-validation>
          <div class="size16-weight400 mb-3">Для смены пароля введите логин</div>
          <TextField
            v-model="forgotData"
            placeholder="e-mail / phone"
            required
            class="mb-5"
          />
          <Button
            content="Отправить код"
            :color-button="vuetifyMainGreen"
            class="w-100 mb-6"
            @submit="step++"
          />
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
          <TextField
            v-model="enteredCode"
            placeholder="Код"
            required
            class="mb-5"
          />

          <div class="size16-weight400 mb-3">Введите пароль</div>

          <TextField
            v-model="enteredCode"
            placeholder="Пароль"
            :rules="[(v) => v !== copyPassword || 'Пароль не совподает']"
            required
            class="mb-5"
          />

          <div class="size16-weight400 mb-3">Подтвердите пароль</div>
          <TextField
            v-model="copyPassword"
            placeholder="Пароль"
            required
            class="mb-5"
          />

          <Button
            content="Подтвердить"
            :color-button="vuetifyMainGreen"
            class="w-100 mb-6"
            @submit="submit"
          />
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
      this.reset();
      this.$emit('changePass');
    },
    reset() {
      this.step = 1;
    }
  }
}
</script>

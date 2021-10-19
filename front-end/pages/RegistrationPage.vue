<template>
  <v-container class="mb-md-10">
    <v-row>
      <Breadcrumbs :items="breadcrumbs"/>
    </v-row>
    <h1 class="size20-weight700 ma-0 mb-5 mb-md-10">Регистрация</h1>
    <v-row no-gutters>
      <v-col cols="12" md="6" class="pr-md-10">
        <div class="size18-weight700 mb-3">Ваше имя</div>
        <TextField
          v-model="userCredo.firstName"
          placeholder="Имя"
          dense
          class="mb-5"
        />
        <div class="size18-weight700 mb-3">Ваша фамилия</div>
        <TextField
          v-model="userCredo.secondName"
          placeholder="Фамилия"
          dense
          class="mb-5"
        />
        <div class="size18-weight700 mb-3">Дата рождения</div>
        <DatePiker v-model="userCredo.birthday"/>
        <div class="size18-weight700 mb-3">E-mail</div>
        <TextField
          v-model="userCredo.email"
          placeholder="1314sjg@gmail.com"
          :rules="[rules.email]"
          dense
          class="mb-5"
        />
      </v-col>
      <v-col cols="12" md="6" class="pl-md-10">
        <div class="size18-weight700 mb-3">Придумайте ароль</div>
        <TextField
          v-model="userCredo.password"
          placeholder="Вашь пароль"
          password
          dense
          class="mb-5"
        />
        <div class="size18-weight700 mb-3">Повторите пароль</div>
        <TextField
          v-model="rules.confirmPassword"
          placeholder="Вашь пароль"
          password
          dense
          class="mb-5"
        />
        <div class="size18-weight700 mb-3">Номер телефона</div>
        <TextField
          v-model="userCredo.phone"
          placeholder="+380 (__)___-__-__"
          dense
          class="mb-5"
        />
        <nuxt-link :to="$lang.link('')" class="flex-center">
          <Button
            content="Зарегестрироваться"
            :color-button="vuetifyMainGreen"
            class="w-100 mb-6"
            :max-width="411"
          />
        </nuxt-link>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: "RegistrationPage",
  components: {
    Breadcrumbs: () => import('~~/components/common/Breadcrumbs'),
    DatePiker: () => import('~~/components/common/DatePiker'),
  },
  data() {
    return {
      breadcrumbs: [
        {
          text: 'Главная',
          href: '',
        },
        {
          text: 'Страница регистрации',
          href: `registration`,
        },
      ],
      userCredo: {
        firstName: '',
        secondName: '',
        birthday: '',
        email: '',
        password: '',
        phone: '',
        confirmPassword: '',
      },
    }
  },
  computed: {
    rules() {
      return {
        email: value => {
          const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
          return pattern.test(value) || 'Не верная почта.'
        },
      }
    },
  }
}
</script>

<style scoped>

</style>

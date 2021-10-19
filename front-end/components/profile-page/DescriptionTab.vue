<template>
  <v-row no-gutters class="py-10">
    <v-col cols="12" md="8">
      <v-col cols="12" class="pa-0 mb-5">
        <h2>Редактирование личных данных</h2>
      </v-col>
      <v-row no-gutters>
        <v-col cols="12" md="6">
          <div class="mr-md-10">
            <div class="size18-weight700 mb-3">Ваше имя</div>
            <TextField
              v-model="userCredo.firstName"
              placeholder="Имя"
              dense
              class="mb-5"
            />
          </div>
          <div class="mr-md-10">
            <div class="size18-weight700 mb-3">Ваша фамилия</div>
            <TextField
              v-model="userCredo.secondName"
              placeholder="Фамилия"
              dense
              class="mb-5"
            />
          </div>
          <div class="mr-md-10">
            <div class="size18-weight700 mb-3">E-mail / Логин</div>
            <TextField
              v-model="userCredo.email"
              placeholder="1314sjg@gmail.com"
              dense
              class="mb-5"
            />
          </div>
        </v-col>
        <v-col cols="12" md="6">
          <div class="mr-md-10">
            <div class="size18-weight700 mb-3">Дата рождения</div>
            <DatePiker v-model="userCredo.birthday"/>
          </div>
          <div class="mr-md-10">
            <div class="size18-weight700 mb-3">Номер телефона</div>
            <TextField
              v-model="userCredo.phone"
              placeholder="+380 (__)___-__-__"
              dense
              class="mb-5"
            />
          </div>
        </v-col>
      </v-row>
    </v-col>
    <v-col cols="12" md="4" class="">
      <v-col cols="12" class="pa-0 mb-5">
        <h2>Изменение пароля</h2>
      </v-col>
      <div class="mr-md-10">
        <div class="size18-weight700 mb-3">Старый пароль</div>
        <TextField
          placeholder="123445"
          password
          dense
          class="mb-5"
        />
      </div>
      <div class="mr-md-10">
        <div class="size18-weight700 mb-3">Придумайте пароль</div>
        <TextField
          placeholder="123445"
          password
          dense
        />
      </div>
      <div class="mr-md-10">
        <div class="size18-weight700 mb-3">Повторите пароль</div>
        <TextField
          placeholder="123445"
          password
          dense
          class="mb-5"
        />
      </div>
      <div class="mr-md-10">
        <Button
          content="Сохранить"
          :color-button="vuetifyMainGreen"
          class="w-100 mb-6"
          @submit="$refs.snackbar.toggle()"
        />
      </div>
    </v-col>
    <Snackbar ref="snackbar" content="Ваши данные сохранены"/>
  </v-row>
</template>

<script>
export default {
  name: "DescriptionTab",
  components: {
    DatePiker: () => import('~~/components/common/DatePiker'),
  },
  data() {
    return {
      userCredo: {
        firstName: '',
        secondName: '',
        birthday: '',
        email: '',
        password: '',
        phone: '',
      },
    }
  }
}
</script>

<style scoped>

</style>

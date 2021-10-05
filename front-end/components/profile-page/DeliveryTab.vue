<template>
  <v-row no-gutters class="py-10">
    <v-col cols="12" md="6" class="pr-md-10">
      <h3 class="size18-weight700 mb-3">Выберите способ оплаты: <span class="red--text">*</span></h3>
      <Selector v-model="deliveryInfo.paymentType" placeholder="Выберите способ оплаты" :items="paymentType"/>
      <h3 class="size18-weight700 mb-3">Выберите способ доставки: <span class="red--text">*</span></h3>
      <v-alert dense border="left" :color="vuetifyMainGreen" dark>
        Доставка новой почтой будет стоить от 45грн
      </v-alert>
      <Selector v-model="deliveryInfo.typeGetting" placeholder="Тип получения" :items="typeGetting"/>
      <Selector v-model="deliveryInfo.city" placeholder="Выберите город" :items="cities"/>
      <Selector v-model="deliveryInfo.branchNP" placeholder="Отделение" :items="branchNP"/>
    </v-col>
    <v-col cols="12" md="6" class="pl-md-10">
      <h3 class="size18-weight700 mb-3">Информация о получателе: <span class="red--text">*</span></h3>
      <TextField
        v-model="deliveryInfo.customerInfo.firstName"
        placeholder="Имя"
        dense
      />
      <TextField
        v-model="deliveryInfo.customerInfo.secondName"
        placeholder="Фамилия"
        dense
      />
      <h3 class="size18-weight700 mb-3">Телефон: <span class="red--text">*</span></h3>
      <TextField
        v-model="deliveryInfo.customerInfo.phone"
        placeholder="+380 (__)___-__-__"
        dense
      />
      <TextField
        v-model="deliveryInfo.customerInfo.email"
        placeholder="Email"
        dense
      />
      <v-textarea
        v-model="deliveryInfo.customerInfo.description"
        placeholder="Уточнение к заказу"
        dense
        outlined
      />

      <div class="d-flex justify-end">
        <Button
          content="Сохранить"
          :color-button="vuetifyMainGreen"
          class="w-100 mb-6"
          :max-width="245"
          @submit="$refs.snackbar.toggle()"
        />
      </div>
    </v-col>

    <Snackbar ref="snackbar" content="Ваши данные сохранены"/>
  </v-row>
</template>

<script>
export default {
  name: "DeliveryTab",
  data() {
    return {
      deliveryInfo: {
        paymentType: '',
        typeGetting: '',
        city: '',
        branchNP: '',
        customerInfo: {
          firstName: '',
          secondName: '',
          phone: '',
          email: '',
          description: '',
        }
      },
      paymentType: [
        'Наложным платежем',
        'Кредитной картой',
        'Натурой',
      ],
      typeGetting: [
        'В отделении',
        'Доставка домой',
      ],
      cities: [
        'Харьков',
        'Киев',
        'Львов',
        'Одесса',
        'Днепр',
        'Запорожье',
      ],
      branchNP: [
        '№1',
        '№12',
        '№13',
        '№14',
        '№15',
        '№16',
      ],
    }
  },
}
</script>

<style scoped>

</style>

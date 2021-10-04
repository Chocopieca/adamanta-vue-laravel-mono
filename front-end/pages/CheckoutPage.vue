<template>
  <CommonPagesLayout :breadcrumbs="breadcrumbs">
    <v-container class="mb-md-10">
      <h1 class="size20-weight700 ma-0 mb-10">Оформление заказа</h1>
      <v-row no-gutters>
        <v-col cols="12" md="6" class="px-3">
          <h3 class="size18-weight700 mb-3">Выберите способ оплаты: <span class="red--text">*</span></h3>
          <v-select v-model="checkoutInfo.paymentType" :items="paymentType" placeholder="Выберите способ оплаты" outlined/>
          <h3 class="size18-weight700 mb-3">Выберите способ доставки: <span class="red--text">*</span></h3>
          <v-alert border="left" :color="vuetifyMainGreen" dark>
            Доставка новой почтой будет стоить от 45грн
          </v-alert>
          <v-select v-model="checkoutInfo.typeGetting" :items="typeGetting" placeholder="Тип получения" outlined/>
          <v-select v-model="checkoutInfo.city" :items="cities" placeholder="Выберите город" outlined/>
          <v-row no-gutters class="mb-3">
            <v-chip outlined class="mr-1 size16-weight400" :color="vuetifyMainBlue" @click="checkoutInfo.city = 'Киев'">Киев</v-chip>
            <v-chip outlined class="mr-1 size16-weight400" :color="vuetifyMainBlue" @click="checkoutInfo.city = 'Харьков'">Харьков</v-chip>
            <v-chip outlined class="mr-1 size16-weight400" :color="vuetifyMainBlue" @click="checkoutInfo.city = 'Днепр'">Днепр</v-chip>
            <v-chip outlined class="mr-1 size16-weight400" :color="vuetifyMainBlue" @click="checkoutInfo.city = 'Запорожье'">Запорожье</v-chip>
            <v-chip outlined class="mr-1 size16-weight400" :color="vuetifyMainBlue" @click="checkoutInfo.city = 'Одесса'">Одесса</v-chip>
          </v-row>
          <v-select v-model="checkoutInfo.branchNP" :items="branchNP" placeholder="Отделение" outlined/>
        </v-col>
        <v-col cols="12" md="6" class="px-3">
          <h3 class="size18-weight700 mb-3">Информация о получателе: <span class="red--text">*</span></h3>
          <TextField
            v-model="checkoutInfo.customerInfo.firstName"
            placeholder="Имя"
            dense
          />
          <TextField
            v-model="checkoutInfo.customerInfo.secondName"
            placeholder="Фамилия"
            dense
          />
          <h3 class="size18-weight700 mb-3">Телефон: <span class="red--text">*</span></h3>
          <TextField
            v-model="checkoutInfo.customerInfo.phone"
            placeholder="+380 (__)___-__-__"
            dense
          />
          <TextField
            v-model="checkoutInfo.customerInfo.email"
            placeholder="Email"
            dense
          />
          <v-textarea
            v-model="checkoutInfo.customerInfo.description"
            placeholder="Уточнение к заказу"
            dense
            outlined
          />
        </v-col>
      </v-row>
      <div class="mb-10">
        <v-divider />
        <v-row no-gutters class="my-5 flex-center">
          <v-col cols="9" md="6" class="size18-weight700">Итоговая сумма к оплате</v-col>
          <v-col cols="3" md="6" class="size24-weight700">100 ₴</v-col>
        </v-row>
        <v-divider />
      </div>

      <nuxt-link :to="$lang.link('')" class="d-flex justify-end">
        <Button
          :color-text="vuetifyMainWhite"
          content="Подтвердить заказ"
          :min-height="48"
          :max-width="vuetifyBreakpoint.mdAndUp ? '333' : '100%'"
          font-size="size18-weight700"
          class="w-100 mb-5"
        />
      </nuxt-link>
    </v-container>
  </CommonPagesLayout>
</template>

<script>
import MockMixin from "../mixins/MockMixin";

export default {
  name: "CheckoutPage",
  components: {
    CommonPagesLayout: () => import('~~/components/feature/CommonPagesLayout'),
  },
  mixins: [MockMixin],
  data() {
    return {
      breadcrumbs: [
        {
          text: 'Главная',
          href: '/',
        },
        {
          text: 'Корзина',
          href: `/checkout`,
        },
      ],
      checkoutInfo: {
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

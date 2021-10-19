<template>
  <CommonPagesLayout :breadcrumbs="breadcrumbs">
    <v-container class="mb-md-10 pt-0">
      <h1 class="size20-weight700 ma-0 mb-10">Оформление заказа</h1>
      <v-row no-gutters>
        <v-col cols="12" md="5" class="px-3 pr-md-16">
          <h3 class="size18-weight700 mb-5">Выберите способ оплаты: <span class="red--text">*</span></h3>
          <Selector v-model="checkoutInfo.paymentType" placeholder="Выберите способ оплаты" :items="paymentType" class="mb-5"/>
          <h3 class="size18-weight700 mb-5">Выберите способ доставки: <span class="red--text">*</span></h3>
          <v-alert border="left" :color="vuetifyMainGreen" dark class="mb-5">
            Доставка новой почтой от 45 грн
          </v-alert>
          <Selector v-model="checkoutInfo.typeGetting" placeholder="Тип получения" :items="typeGetting" class="mb-5"/>
          <v-row no-gutters class="mb-5">
            <v-chip
              v-for="(city, key) in fastSelectCity"
              :key="key"
              outlined
              class="mr-1 size16-weight400 mb-2"
              :color="vuetifyMainBlue"
              @click="checkoutInfo.city = city"
            >
              <span class="pt-1">{{ city }}</span>
            </v-chip>
          </v-row>
          <Selector v-model="checkoutInfo.city" placeholder="Выберите город" :items="cities" class="mb-5"/>
          <Selector v-model="checkoutInfo.branchNP" placeholder="Отделение" :items="branchNP" class="mb-5"/>
        </v-col>
        <v-col cols="12" md="5" class="px-3 pl-md-16">
          <h3 class="size18-weight700 mb-4">Информация о получателе: <span class="red--text">*</span></h3>
          <TextField
            v-model="checkoutInfo.customerInfo.firstName"
            placeholder="Имя"
            dense
            class="mb-5"
          />
          <TextField
            v-model="checkoutInfo.customerInfo.secondName"
            placeholder="Фамилия"
            dense
            class="mb-5"
          />
          <h3 class="size18-weight700 mb-5">Телефон: <span class="red--text">*</span></h3>
          <TextField
            v-model="checkoutInfo.customerInfo.phone"
            placeholder="+380 (__)___-__-__"
            dense
            class="mb-5"
          />
          <TextField
            v-model="checkoutInfo.customerInfo.email"
            placeholder="Email"
            dense
            class="mb-5"
          />
          <v-textarea
            v-model="checkoutInfo.customerInfo.description"
            placeholder="Уточнение к заказу"
            dense
            outlined
            class="custom-textarea mb-5"
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

      <div class="d-flex justify-end">
        <Button
          :color-text="vuetifyMainWhite"
          content="Подтвердить заказ"
          :min-height="48"
          :max-width="vuetifyBreakpoint.mdAndUp ? 333 : '100%'"
          font-size="size18-weight700"
          class="w-100 mb-5"
          @submit="$refs.dialog.toggle()"
        />
      </div>
    </v-container>

    <Dialog ref="dialog" has-close-action to="">
      <div class="flex-center flex-column">
        <div class="size36-weight700 mb-3" :style="`color: ${vuetifyMainGreen};`">Спасибо!</div>
        <div class="size24-weight700 mb-3 text-center">Ваш заказ
          успешно оформлен</div>
        <v-img contain max-width="350" :src="baseUrl + 'image/successBuy.svg'" class="mb-10" />
      </div>
    </Dialog>
  </CommonPagesLayout>
</template>

<script>
import MockMixin from "../mixins/MockMixin";

export default {
  name: "CheckoutPage",
  components: {
    CommonPagesLayout: () => import('~~/components/feature/CommonPagesLayout'),
    Dialog: () => import('~~/components/common/Dialog'),
  },
  mixins: [MockMixin],
  data() {
    return {
      breadcrumbs: [
        {
          text: 'Главная',
          href: '',
        },
        {
          text: 'Корзина',
          href: `checkout`,
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
      fastSelectCity: [
        'Киев',
        'Харьков',
        'Днепр',
        'Запорожье',
        'Одесса',
      ],
    }
  },
}
</script>

<style scoped lang="scss">
::v-deep.custom-textarea {
  & textarea {
    font-size: 16px !important;
  }
}
</style>

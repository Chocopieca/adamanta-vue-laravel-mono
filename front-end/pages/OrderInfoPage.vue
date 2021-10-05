<template>
  <v-container class="pa-0">
    <Breadcrumbs :items="breadcrumbs"/>
    <div class="px-3">
      <h1 class="mb-5 size20-weight700">Контакты</h1>
      <v-row no-gutters>
        <v-col cols="12" md="6" class="mb-10">
          <span :style="`color: ${vuetifyMainBlue};`">Доставка</span>
          <v-divider class="my-3"/>
          <div class="pr-5 pr-mb-0">
            {{ order_info.delivery_content }}
          </div>
        </v-col>
        <v-col cols="12" md="6" class="mb-10">
          <span :style="`color: ${vuetifyMainBlue};`">Оплата</span>
          <v-divider class="my-3"/>
          <div class="pr-5 pr-mb-0">
            {{ order_info.payment_content }}
          </div>
        </v-col>
      </v-row>
    </div>
  </v-container>
</template>

<script>
import MockMixin from "../mixins/MockMixin";

export default {
  name: "OrderInfoPage",
  components: {
    Breadcrumbs: () => import('~~/components/common/Breadcrumbs'),
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
          text: 'Доставка и оплата',
          href: `order_info`,
        },
      ]
    }
  },
}
</script>

<style scoped>

</style>

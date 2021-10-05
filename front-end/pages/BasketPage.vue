<template>
  <CommonPagesLayout :breadcrumbs="breadcrumbs">
    <v-container>
      <v-row>
        <v-col cols="12" md="9">
          <h1 class="size20-weight700 ma-0 mb-10">Корзина</h1>
          <div v-for="(item, index) in productsInOrder" :key="index">
            <ProductTypeInBasket :order="item" :index="index"/>
          </div>
        </v-col>
        <v-col cols="12" md="3">
          <h2 class="mb-5 size20-weight700">Итог заказа</h2>
          <div><span class="mr-10 size18-weight400">{{ sumProductInOrder }}</span> {{ sumPriceInOrder }}₴</div>
          <v-divider class="mb-5"/>
          <div class="mb-5 size24-weight700"><span class="mr-10">К оплате</span> {{ sumPriceInOrder }}₴</div>

          <nuxt-link :to="$lang.link('checkout')">
            <Button
              :color-text="vuetifyMainWhite"
              content="Оформить заказ"
              :min-height="48"
              :max-width="vuetifyBreakpoint.mdAndUp ? 303 : '100%'"
              font-size="size18-weight700"
              class="w-100 mb-5"
            />
          </nuxt-link>

          <nuxt-link :to="$lang.link('')">
            <Button
              content="Продолжить покупки"
              :color-button="vuetifyTransparent"
              :color-text="vuetifyMainGreen"
              :min-height="48"
              :max-width="vuetifyBreakpoint.mdAndUp ? 332 : '100%'"
              font-size="size18-weight700"
              class="w-100 mb-6"
              outlined
            />
          </nuxt-link>
        </v-col>
      </v-row>
    </v-container>
  </CommonPagesLayout>
</template>

<script>
import MockMixin from "../mixins/MockMixin";

export default {
  name: "BasketPage",
  components: {
    CommonPagesLayout: () => import('~~/components/feature/CommonPagesLayout'),
    ProductTypeInBasket: () => import('~~/components/basket-page/ProductTypeInBasket'),
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
          href: `basket`,
        },
      ],
      prices: [],
    }
  },
  computed: {
    sumProductInOrder() {
      let total = 0;
      this.productsInOrder.forEach(item => {
        total += item.count
      })
      const text = total === 1 ? 'товар' : total < 5 ? 'товара' : 'товаров';
      return `${total} ${text} на сумму`
    },
    sumPriceInOrder() {
      let total = 0;
      this.productsInOrder.forEach(item => {
        total += item.count * item.product.price[item.selectedWeight].value;
      })
      return total;
    }
  }
}
</script>

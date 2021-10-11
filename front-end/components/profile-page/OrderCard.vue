<template>
  <div>
    <v-card v-for="(order, orderIndex) in orders" :key="orderIndex" class="pa-5 my-5 mr-5 product-history-elevation">
      <v-row no-gutters>
        <v-col cols="12" md="9" class="mb-5 mb-md-0">
          <h3 class="size18-weight700 mb-5">Заказ №{{order.productId}}</h3>
          <div v-for="(product, productIndex) in order.productItems" :key="productIndex" class="d-flex mb-5">
            <nuxt-link :to="$lang.link(`category/${product.linkGroup.category}/${product.linkGroup.group}/${product.linkGroup.product}`)">
              <v-img
                :src="baseUrl + product.image"
                max-width="85"
                height="85"
                cover
                class="rounded-lg mr-5"
              />
            </nuxt-link>
            <div>
              <h4 class="size18-weight700">
                {{ getTitle().product(order.productItems, product.linkGroup.product) }}
                <span>
                {{product.price[product.selectedWeight].weight}}
              </span>
              </h4>
              <div class="size18-weight400">{{ product.count }} шт</div>
            </div>
          </div>
          <div class="size14-weight400 mb-1">тел. {{ order.phone }}</div>
          <div class="size14-weight400">{{ order.address }}</div>
        </v-col>
        <v-col cols="12" md="3" class="d-flex justify-space-between flex-column">
          <div>
            <div class="size16-weight700 mb-5">Итог заказа</div>
            <div class="d-flex justify-space-between align-center mb-1">
              <div class="size14-weight400">{{ sumProductInOrder(order) }}</div>
              <div class="size16-weight700">{{ order.totalCountPrice }} ₴</div>
            </div>
            <div class="d-flex justify-space-between align-center mb-5">
              <div class="size14-weight400">Доставка</div>
              <div class="size16-weight700">{{ order.deliveryPrice }} ₴</div>
            </div>

            <v-divider class="mb-3"/>

            <div class="d-flex justify-space-between align-center mb-5">
              <div class="size16-weight700">Итого</div>
              <div class="size16-weight700">{{ order.deliveryPrice + order.totalCountPrice }} ₴</div>
            </div>
          </div>

          <div class="size18-weight400 d-flex justify-end">{{ parseDate(order.date) }}</div>
        </v-col>
      </v-row>
    </v-card>
  </div>
</template>

<script>
export default {
  name: "OrderCard",
  props: {
    orders: {
      type: Array,
      default: () => [],
    }
  },
  methods: {
    sumProductInOrder(order) {
      const total = order.totalProduct;
      const text = total === 1 ? 'товар' : total < 5 ? 'товара' : 'товаров';
      return `${total} ${text} на сумму`
    },
  }
}
</script>

<style scoped lang="scss">
.product-history-elevation {
  box-shadow: 0 4px 10px 5px rgb(0 0 0 / 6%) !important;
}
</style>

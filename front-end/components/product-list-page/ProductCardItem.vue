<template>
  <v-card class="rounded-lg overflow-hidden custom-elevation" elevation="5">
    <nuxt-link :to="$lang.link(`category/${item.linkGroup.category}/${item.linkGroup.group}/${item.linkGroup.product}`)">
      <v-img position="bottom bottom" :src="baseUrl + item.image" height="160px" />

      <v-card-title class="size24-weight700">{{ item.title }}</v-card-title>
    </nuxt-link>

    <v-divider />

    <v-card-subtitle class="size12-weight400 px-6 pb-0">
      <template v-if="item.available">
        <div class="d-flex align-center" :style="`color: ${vuetifyMainGreen}`">
          <v-icon :color="vuetifyMainGreen" size="15" class="mr-1 mb-1">mdi-check-circle</v-icon>
          В наличии
        </div>
      </template>
      <template v-else>
        <div class="d-flex align-center" :style="`color: ${vuetifyError}`">
          <v-icon :color="vuetifyError" size="15" class="mr-1 mb-1">mdi-close-circle</v-icon>
          Нет в наличии
        </div>
      </template>
    </v-card-subtitle>

    <v-card-subtitle v-if="item.type" class="size12-weight400 px-6 pb-0">
      {{ item.type }}
    </v-card-subtitle>

    <v-card-subtitle class="product-price size24-weight700 px-6 pb-5">
      {{ getProductPrice(item.price[0].value, item.price[0].currency, item.price[0].weight) }}
    </v-card-subtitle>

    <v-card-actions class="px-6 pb-8">
      <nuxt-link v-if="inBasket" :to="$lang.link('basket')" class="w-100">
        <v-btn
          :style="`color: ${vuetifyMainWhite}; background: ${vuetifyMainGreen};`"
          :min-height="36"
          max-width="100%"
          rounded
          class="w-100"
          @click="addToBasket"
        >
          <div class="flex-center">
            <v-icon size="20" class="mr-1">mdi-check</v-icon>
            <span class="size18-weight400">Оформить заказ</span>
          </div>
        </v-btn>
      </nuxt-link>
      <v-btn
        v-else
        :style="`color: #FFFFFF; background: ${vuetifyMainGreen};`"
        :min-height="36"
        rounded
        class="w-100"
        @click="addToBasket"
      >
        <div class="flex-center">
          <v-icon size="20" class="mr-1">mdi-cart-outline</v-icon>
          <span class="size18-weight400">Купить</span>
        </div>
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  name: "ProductCardItem",
  props: {
    item: {
      type: Object,
      default: () => {},
    }
  },
  data() {
    return {
      inBasket: false,
    }
  },
  methods: {
    getProductPrice(val, currency, weight) {
      return `${val} ${currency} / ${weight}`;
    },
    addToBasket() {
      this.inBasket = true;
      this.$emit('addToBasket');
    },
  }
}
</script>

<style scoped>

</style>

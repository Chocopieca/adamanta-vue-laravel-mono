<template>
  <v-card class="ma-3 mt-0 rounded-lg overflow-hidden" elevation="0">
    <nuxt-link :to="$lang.link(`category/${item.linkGroup.category}/${item.linkGroup.group}/${item.linkGroup.product}`)">
      <v-img :src="baseUrl + item.image" height="102px" />

      <v-card-title class="size16-weight700">{{ item.title }}</v-card-title>
    </nuxt-link>

    <v-divider />

    <div
      v-if="item.available"
      :style="`color: ${vuetifyMainGreen}`"
      class="ma-3 size12-md-weight400 size12-weight400"
    >
      <v-icon :color="vuetifyMainGreen">mdi-check-circle</v-icon>
      В наличии
    </div>

    <div
      v-else
      :style="`color: ${vuetifyError}`"
      class="size12-md-weight400 size12-weight400"
    >
      <v-icon :color="vuetifyError">mdi-close-circle</v-icon>
      Нет в наличии
    </div>

    <div class="ml-3 size22-weight700 product-price">
      {{ getProductPrice(item.price[0].value, item.price[0].currency, item.price[0].weight) }}
    </div>

    <div class="ml-3" v-if="item.type">
      {{ item.type }}
    </div>

    <v-card-actions>
      <nuxt-link v-if="inBasket" :to="$lang.link('basket')">
        <Button
          :color-text="vuetifyMainWhite"
          content="Оформить заказ"
          :min-height="40"
          font-size="size18-weight700"
          class="w-100"
        />
      </nuxt-link>
      <Button
        v-else
        :color-button="vuetifyMainGreen"
        icon="mdi-cart"
        fab
        :max-width="40"
        :max-height="40"
        @submit="addToBasket"
      />
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  name: "ProductItem",
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

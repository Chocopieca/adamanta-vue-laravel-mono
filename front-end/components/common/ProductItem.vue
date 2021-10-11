<template>
  <v-card class="ma-3 mt-0 rounded-lg overflow-hidden" elevation="0">
    <nuxt-link :to="$lang.link(`category/${item.linkGroup.category}/${item.linkGroup.group}/${item.linkGroup.product}`)">
      <v-img :src="baseUrl + item.image" height="102px" />

      <v-card-title class="size16-weight700">{{ item.title }}</v-card-title>
    </nuxt-link>

    <v-divider />

    <v-card-subtitle
      v-if="item.available"
      :style="`color: ${vuetifyMainGreen}`"
      class="size12-md-weight400 size12-weight400"
    >
      <v-icon :color="vuetifyMainGreen">mdi-check-circle</v-icon>
      В наличии
    </v-card-subtitle>

    <v-card-subtitle
      v-else
      :style="`color: ${vuetifyError}`"
      class="size12-md-weight400 size12-weight400"
    >
      <v-icon :color="vuetifyError">mdi-close-circle</v-icon>
      Нет в наличии
    </v-card-subtitle>

    <v-card-subtitle class="product-price">
      {{ getProductPrice(item.price[0].value, item.price[0].currency, item.price[0].weight) }}
    </v-card-subtitle>

    <v-card-subtitle v-if="item.type">
      {{ item.type }}
    </v-card-subtitle>

    <v-card-actions>
      <nuxt-link v-if="inBasket" :to="$lang.link('basket')">
        <Button
          :color-text="vuetifyMainWhite"
          content="Оформить заказ"
          :min-height="54"
          font-size="size18-weight700"
          class="w-100"
        />
      </nuxt-link>
      <Button
        v-else
        :color-button="vuetifyMainGreen"
        icon="mdi-cart-outline"
        fab
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

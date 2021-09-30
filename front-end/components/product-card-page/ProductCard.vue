<template>
  <v-row no-gutters class="mb-md-10">
    <v-col class="px-5 px-md-0 pr-md-5 mb-10 mb-md-0">
      <v-img
        contain
        :lazy-src="baseUrl + productCard.image"
        :src="baseUrl + productCard.image"
        class="rounded-lg"
      />
    </v-col>
    <v-col class="pa-5 pa-md-0">
      <h1 class="size24-weight700 ma-0 mt-md-10">{{ productCard.title }}</h1>
      <v-divider class="my-5"/>
      <div class="size12-weight400">
        <span>Раздел: </span>
        <nuxt-link :to="`/category/${productCard.category}`" :style="`color: ${vuetifyMainBlue}`">
          {{ textConvertor(productCard.category) }}
        </nuxt-link>
      </div>
      <div class="size12-weight400">
        <span>Категория: </span>
        <nuxt-link :to="`/category/${productCard.category}/${productCard.group}`" :style="`color: ${vuetifyMainBlue}`">
          {{ textConvertor(productCard.group) }}
        </nuxt-link>
      </div>

      <div class="mb-3 mb-md-0">
        <div
          v-if="productCard.available"
          :style="`color: ${vuetifyMainGreen}`"
          class="size12-md-weight400 size12-weight400"
        >
          <v-icon :color="vuetifyMainGreen" size="13">mdi-check-circle</v-icon>
          В наличии
        </div>

        <div
          v-else
          :style="`color: ${vuetifyError}`"
          class="size12-md-weight400 size12-weight400"
        >
          <v-icon :color="vuetifyError" size="13">mdi-close-circle</v-icon>
          Нет в наличии
        </div>
      </div>

      <div class="d-flex align-center">
        <span class="mr-3 size18-weight700">Фасовка:</span>
        <v-chip-group v-model="weightType" active-class="green--text">
          <v-chip v-for="tag in arrayWeight" :key="tag" :value="tag">{{ tag }}</v-chip>
        </v-chip-group>
      </div>

      <div class="d-flex align-center size24-weight700 mb-10">
        <span class="mr-5 size18-weight700">Цена:</span>
        {{ price }}
      </div>

      <v-btn
        v-if="!isBuying"
        class="size18-weight700 mr-5 mb-5 mb-md-0 w-md-100"
        :color="vuetifyMainGreen"
        dark
        rounded
        :width="vuetifyBreakpoint.mdAndUp ? 200 : ''"
        @click="isBuying = !isBuying"
      >
        <v-icon class="mr-3">
          mdi-cart-outline
        </v-icon>
        <span class="size18-weight400 flex-center mt-1 mr-5">Купить</span>
      </v-btn>

      <nuxt-link v-else to="/basket">
        <v-btn
          class="size18-weight700 mr-5 mb-5 mb-md-0 w-md-100"
          :color="vuetifyMainGreen"
          dark
          rounded
          :width="vuetifyBreakpoint.mdAndUp ? 200 : ''"
        >
          <v-icon class="mr-3">
            mdi-check
          </v-icon>
          <span class="size18-weight400 flex-center mt-1 mr-5">Оформить</span>
        </v-btn>
      </nuxt-link>
    </v-col>
  </v-row>
</template>

<script>
import MockMixin from "../../mixins/MockMixin";

export default {
  name: "ProductCard",
  mixins: [MockMixin],
  data() {
    return {
      weightType: null,
      isBuying: false,
    }
  },
  computed: {
    arrayWeight() {
      return this.productCard.price.map(item => {
        return item.weight
      })
    },
    price() {
      const priceType = this.productCard.price.filter(item => ( item.weight === this.weightType ))[0]

      if(priceType) {
        return this.getProductPrice(priceType.value, priceType.currency, priceType.weight, )
      }
      return 'Выберете фасовку'
    }
  },
  mounted() {
    this.weightType = this.productCard.price[0].weight
  },
  methods: {
    getProductPrice(val, currency, weight) {
      return `${val} ${currency} / ${weight}`
    },
  },
}
</script>

<style scoped>

</style>

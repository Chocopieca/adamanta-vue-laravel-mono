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
      <h1 class="size24-weight700 ma-0 mt-md-8">{{ productCard.title.toUpperCase() }}</h1>
      <v-divider class="my-4"/>
      <div class="size12-weight400 mb-4">
        <span>Раздел: </span>
        <nuxt-link :to="$lang.link(`category/${productCard.category}`)" :style="`color: ${vuetifyMainBlue}`">
          {{ getTitle().category(navCategory, productCard.category) }}
        </nuxt-link>
      </div>
      <div class="size12-weight400">
        <span>Категория: </span>
        <nuxt-link :to="$lang.link(`category/${productCard.category}/${productCard.group}`)" :style="`color: ${vuetifyMainBlue}`">
          {{ getTitle().category(categoryGroups, productCard.group) }}
        </nuxt-link>
      </div>

      <div class="size12-weight400 mb-7 mb-md-0">
        <template v-if="productCard.available">
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
      </div>

      <div class="d-flex align-center mb-6">
        <span class="mr-3 size18-weight700">Фасовка:</span>
        <v-chip-group v-model="weightType" active-class="white--text">
          <v-chip
            v-for="tag in arrayWeight"
            :key="tag"
            :value="tag"
            :outlined="weightType !== tag"
            :color="vuetifyMainGreen"
            :text-color="weightType === tag ? '' : vuetifyMainBlack"
            class="size18-weight700"
          >
            <div class="mt-1">{{ tag }}</div>
          </v-chip>
        </v-chip-group>
      </div>

      <div class="d-flex align-center size24-weight700 mb-11">
        <span class="mr-5 size18-weight700">Цена:</span>
        {{ price }}
      </div>

      <v-btn
        v-if="!inBasket"
        class="size18-weight700 mr-5 mb-5 mb-md-0 w-md-100"
        :color="vuetifyMainGreen"
        dark
        rounded
        :width="vuetifyBreakpoint.mdAndUp ? 200 : ''"
        @click="addToBasket"
      >
        <v-icon class="mr-3">
          mdi-cart-outline
        </v-icon>
        <span class="size18-weight400 flex-center mt-1 mr-5">Купить</span>
      </v-btn>

      <nuxt-link v-else :to="$lang.link('basket')">
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

    <Snackbar ref="snackbar" content="Товар добавлен в корзину"/>
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
      inBasket: false,
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
      return `${val} ${currency} / ${weight}`;
    },
    addToBasket() {
      this.inBasket = true;
      this.$refs.snackbar.toggle();
    },
  },
}
</script>

<style scoped>

</style>

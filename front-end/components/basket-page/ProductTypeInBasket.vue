<template>
  <v-card class="mb-5 pa-5">
    <v-row no-gutters>
      <v-col cols="6" md="2" class="flex-center mb-10 mb-md-0">
        <v-badge
          color="transparent"
          left
          offset-x="35"
          offset-y="0"
        >
          <template #badge>
            <v-avatar class="cursor-default">
              <span class="usage-id elevation-4 size18-weight700 pt-1">{{ index + 1 }}</span>
            </v-avatar>
          </template>
          <v-img
            :src="baseUrl + order.product.image"
            :width="vuetifyBreakpoint.mdAndUp ? '70' : '150'"
            :height="vuetifyBreakpoint.mdAndUp ? '70' : '150'"
            cover
            class="rounded-lg"
          />
        </v-badge>
      </v-col>

      <v-col cols="6" md="3" class="flex-center flex-column mb-10 mb-md-0">
        <div class="size14-weight700 mb-4">Наименование товара</div>
        <div class="size14-weight400">{{ textConvertor(order.product.product) }}</div>
      </v-col>

      <v-col cols="6" md="2" class="flex-center flex-column mb-10 mb-md-0">
        <div class="size14-weight700 mb-3">Упаковка</div>
        <div class="flex-center count-selector px-2 size14-weight400">
          <v-btn :disabled="isDecrementedWeight" fab text x-small @click="changeProductType(-1)">
            <v-icon>mdi-minus</v-icon>
          </v-btn>

          <div class="mx-2 cursor-default">{{ getProductType ? getProductType.weight : '' }}</div>

          <v-btn :disabled="isIncrementedWeight" fab text x-small @click="changeProductType(1)">
            <v-icon>mdi-plus</v-icon>
          </v-btn>
        </div>
      </v-col>

      <v-col cols="6" md="2" class="flex-center flex-column mb-10 mb-md-0">
        <div class="size14-weight700 mb-3">Количество</div>
        <div class="flex-center count-selector px-3 size14-weight400">
          <v-btn :disabled="isDecrementedCount" fab text x-small @click="changeCount(-1)">
            <v-icon>mdi-minus</v-icon>
          </v-btn>

          <div class="mx-2 cursor-default">{{ count }}</div>

          <v-btn :disabled="isIncrementedCount" fab text x-small @click="changeCount(1)">
            <v-icon>mdi-plus</v-icon>
          </v-btn>
        </div>
      </v-col>

      <v-col cols="6" md="1" class="flex-center flex-column">
        <div class="size14-weight700 mb-5">Цена</div>
        <div class="size14-weight400">{{ getProductType ? getProductType.value : '' }} ₴</div>
      </v-col>

      <v-col cols="6" md="1" class="flex-center flex-column">
        <div class="size14-weight700 mb-5">Стоимость</div>
        <div class="size14-weight400">{{ productPriceSum }} ₴</div>
      </v-col>
    </v-row>
  </v-card>
</template>

<script>
export default {
  name: "ProductTypeInBasket",
  props: {
    order: {
      type: Object,
      default: () => {},
    },
    index: {
      type: Number,
      default: null,
    },
  },
  data() {
    return {
      productType: null,
      count: null,
    }
  },
  computed: {
    getProductType() {
      return this.order.product.price[this.productType]
    },
    productPriceSum() {
      return this.getProductType?.value * this.count;
    },
    isIncrementedWeight() {
      return this.productType === this.order.product.price.length - 1;
    },
    isDecrementedWeight() {
      return this.productType === 0;
    },
    isIncrementedCount() {
      return this.count === 100;
    },
    isDecrementedCount() {
      return this.count === 1;
    },
  },
  mounted() {
    this.count = this.order.count
    this.productType = this.order.selectedWeight
  },
  methods: {
    changeProductType(type) {
      this.productType += type;
    },
    changeCount(type) {
      this.count += type;
    },
  },
}
</script>

<style scoped lang="scss">
.usage-id {
  background: var(--v-main_white-base);
  border-radius: 50%;
  color: var(--v-main_green-base);
  padding:2px 7px;
}

::v-deep.count-selector {
  border: 1px solid var(--v-main_black-base);
  border-radius: 50px;
  height: 50px;

  .v-input {
    max-width: 45px;
  }

  .v-input__slot {
    box-shadow: 0 0 0 0 !important;
  }
}
</style>

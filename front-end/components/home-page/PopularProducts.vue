<template>
  <v-lazy
    v-model="isActive"
    :options="{ threshold: .5 }"
    min-height="200"
    transition="fade-transition"
  >
    <div class="position-relative pa-3">
      <h2 class="mb-md-16">Популярные товары</h2>
      <Carousel
        siad-arrow
        :with-side-arrow="vuetifyBreakpoint.lgAndUp"
        :slides-to-show="[2, 3, 5, 5]"
        :banner-slides="popularProducts"
        :with-arrow="false"
        :with-dots="false"
      >
        <template #slides>
          <div v-for="(item, index) in popularProducts" :key="index">
            <ProductItem :item="item"/>
          </div>
        </template>
      </Carousel>
    </div>
  </v-lazy>
</template>

<script>
import MockMixin from '~~/mixins/MockMixin';

export default {
  name: "PopularProducts",
  components: {
    Carousel: () => import('~~/components/common/Carousel'),
    ProductItem: () => import('~~/components/common/ProductItem'),
  },
  mixins: [MockMixin],
  data() {
    return {
      isActive: false,
    }
  },
  methods: {
    getProductPrice(val, currency, weight) {
      return `${val} ${currency} / ${weight}`
    },
  }
}
</script>

<style scoped lang="scss">
@import '~vuetify/src/styles/styles.sass';

.category-carousel {
  position: absolute;
  width: 1300px;
  top: -100px;
  @media (max-width: map-get($grid-breakpoints, lg)) {
    width: 900px;
  }
  @media (max-width: map-get($grid-breakpoints, md)) {
    width: 768px;
  }
}
</style>

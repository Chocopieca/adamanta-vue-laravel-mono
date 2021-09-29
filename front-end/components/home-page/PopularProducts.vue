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
            <v-card class="ma-3" elevation="0">
              <nuxt-link :to="$lang.link(`category/${item.category}/${item.group}/${item.product}`)">
                <v-img :src="baseUrl + item.image" height="102px" />

                <v-card-title class="size12-weight700">{{ item.title }}</v-card-title>
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
                {{ getProductPrice(item.price.value, item.price.currency, item.price.weight, ) }}
              </v-card-subtitle>

              <v-card-actions>
                <Button
                  :color-button="vuetifyMainGreen"
                  icon="mdi-cart-outline"
                  fab
                />
              </v-card-actions>
            </v-card>
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

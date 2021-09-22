<template>
  <v-container fluid class="pa-0">
    <Carousel
      :slides-to-show="[1]"
      :banner-slides="bannerSlides"
      :max-height="vuetifyBreakpoint.lgAndUp ? '700' : '500'"
      nav-color="white"
      with-arrow
      with-dots
      infinite
    >
      <template #slides>
        <div v-for="(item, index) in bannerSlides" :key="index">
          <v-img :src="item.background" cover :height="vuetifyBreakpoint.lgAndUp ? 700 : 500">
            <v-container class="pt-16">
              <v-col sm="8" md="8" lg="6" class="banner-content">
                <h2
                  class="mb-10"
                  :class="vuetifyBreakpoint.lgAndUp ? 'size36-weight700' : 'size22-weight700'"
                >{{ item.title }}</h2>
                <p
                  class="mb-10"
                  :class="vuetifyBreakpoint.lgAndUp ? 'size22-weight400' : 'size14-weight400'"
                >{{ item.content }}</p>
                <Button
                  :color-text="vuetifyMainWhite"
                  content="Купить"
                  :min-height="54"
                  :max-width="246"
                  class="size18-weight700 w-100"
                />
              </v-col>
            </v-container>
          </v-img>
        </div>
      </template>
    </Carousel>

    <div class="position-relative mb-md-150">
      <v-container class="pa-0">
        <Carousel
          :class="vuetifyBreakpoint.lg ? 'category-carousel' : ''"
          :slides-to-show="[2, 3, 4, 4]"
          :banner-slides="navCategory"
          :with-arrow="false"
          :with-dots="false"
          infinite
        >
          <template #slides>
            <div v-for="(item, index) in navCategory" :key="index">
              <v-card
                elevation="5"
                class="flex-center flex-column text-center mx-5 mx-md-10 ma-2 pa-4"
                height="174"
                @click="routeToCategory(item.link)"
              >
                <v-img :src="item.icon" contain height="88" width="88"/>
                <div class="size18-weight700">{{ item.title }}</div>
              </v-card>
            </div>
          </template>
        </Carousel>
      </v-container>
    </div>

    <v-container class="mb-md-100 mb-16">
      <v-row no-gutters class="text-center">
        <v-col cols="12">
          <h2 class="size36-weight700 mb-5">Почему именно мы?</h2>
          <p class="col-md-8 offset-md-2 size16-weight400">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus turpis nec,
            sollicitudin interdum interdum sit vulputate. Tortor nunc urna, tempus integer.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus turpis nec, sollicitudin interdum interdum sit vulputate. Tortor nunc urna, tempus integer. Tortor nunc urna, tempus integer.Tortor nunc urna, tempus integer.
          </p>
        </v-col>
        <v-col v-for="(item, index) in benefits" :key="index" cols="12" sm="4" class="flex-center flex-column pa-10">
          <v-img :src="item.icon" contain width="80" height="80" class="mb-5"/>
          <h3 class="size22-weight700 mb-5">{{ item.title }}</h3>
          <p class="align-center size14-weight400">{{ item.content }}</p>
        </v-col>
      </v-row>
    </v-container>

    <v-container class="pa-0 mb-md-100 mb-16 pa-5">
      <h2 class="mb-md-16">Популярные товары</h2>
      <Carousel
        siad-arrow
        :with-side-arrow="vuetifyBreakpoint.lg"
        :slides-to-show="[2, 3, 5, 5]"
        :banner-slides="popularProducts"
        :with-arrow="false"
        :with-dots="false"
      >
        <template #slides>
          <div v-for="(item, index) in popularProducts" :key="index">
            <v-card class="ma-3" elevation="0">
              <v-img :src="item.image" height="102px" />

              <v-card-title>{{ item.title }}</v-card-title>

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
    </v-container>

    <v-container class="pa-0 mb-md-100 mb-16 pa-5">
      <h2 class="mb-md-16">Отзывы</h2>
      <Carousel
        siad-arrow
        :with-side-arrow="vuetifyBreakpoint.lg"
        :slides-to-show="[1, 2, 3, 3]"
        :banner-slides="reviews"
        :with-arrow="false"
        :with-dots="false"
      >
        <template #slides>
          <template v-for="(item, index) in reviews">
            <v-card :key="index" class="pa-md-5" elevation="0">
              <template slot="progress">
                <v-progress-linear
                  color="deep-purple"
                  height="10"
                  indeterminate
                ></v-progress-linear>
              </template>

              <v-card-title>
                <v-avatar size="64">
                  <img alt="user" :src="item.avatar">
                </v-avatar>
                <div class="ml-3">
                  <div :class="vuetifyBreakpoint.xl ? 'size16-weight700' : 'size14-weight700'">{{ item.full_name }}</div>
                  <v-rating
                    :value="item.stars"
                    color="amber"
                    dense
                    half-increments
                    readonly
                    size="14"
                  ></v-rating>
                </div>
              </v-card-title>

              <v-card-text>
                <div class="my-4 size18-weight700">
                  {{ item.title }}
                </div>

                <div :class="vuetifyBreakpoint.xl ? 'size16-weight400' : 'size14-weight400'">{{ item.content }}</div>
              </v-card-text>

              <v-card-actions class="d-flex justify-space-between">
                <nuxt-link :to="$lang.link('reviews')">
                  <Button
                    :color-text="vuetifyMainBlack"
                    :color-button="vuetifyTransparent"
                    icon="mdi-ray-start-arrow"
                    content="Весь отзыв"
                    text
                    class="size14-weight400"
                  />
                </nuxt-link>

                <div>{{ dateConvertor(item.date) }}</div>
              </v-card-actions>
            </v-card>
          </template>
        </template>
      </Carousel>
    </v-container>
  </v-container>
</template>

<script>
import MockMixin from '~~/mixins/MockMixin';

export default {
  name: "HomePage",
  components: {
    Carousel: () => import('~~/components/common/Carousel'),
  },
  mixins: [MockMixin],
  data: () => ({
    model: null,
  }),
  methods: {
    routeToCategory(link) {
      this.$router.push(link);
    },
    getProductPrice(val, currency, weight) {
      return `${val} ${currency} / ${weight}`
    },
    dateConvertor(timestamp = new Date) {
      let month = String(timestamp.getMonth() + 1);
      let day = String(timestamp.getDate());
      const year = String(timestamp.getFullYear());

      if (month.length < 2) month = '0' + month;
      if (day.length < 2) day = '0' + day;

      return `${day}.${month}.${year}`;
    }
  },
}
</script>

<style scoped lang="scss">
@import '~vuetify/src/styles/styles.sass';

.banner {
  &-content {
    color: var(--v-main_white-base);
    background: #00000099;
    border-radius: 20px 20px;
  }
}

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

<template>
  <CommonPagesLayout :breadcrumbs="breadcrumbs">
    <v-row no-gutters class="pa-md-3">
      <v-col v-if="vuetifyBreakpoint.mdAndUp" md="3">
        <v-card elevation="5" class="pa-5 size18-weight400">
          <div class="mb-3">
            <h3 class="size18-weight700">Контакты</h3>
            <template v-for="(number, index) in contacts.numbers">
              <div :key="index">{{ number }}</div>
            </template>
          </div>
          <div class="mb-3">
            <h3 class="size18-weight700">Адресс</h3>
            {{ contacts.address }}
          </div>
          <div>
            <h3 class="size18-weight700">График работы</h3>
            {{ contacts.working_time }}
          </div>
        </v-card>
      </v-col>
      <v-col md="9" class="px-md-5">
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

        <v-tabs :color="vuetifyMainBlue">
          <v-tab class="size18-weight700">Описание</v-tab>
          <v-tab class="size18-weight700">Использование</v-tab>
          <v-tab class="size18-weight700">Отзывы</v-tab>

          <v-tab-item
            v-for="n in 3"
            :key="n"
          >
            <v-divider />
            <v-container v-if="n === 1" class="my-10 pa-md-0">
              {{ productCard.description }}
            </v-container>

            <v-container v-if="n === 2" class="my-10 pa-md-0">
              <div v-for="(item, index) in productCard.usage" :key="index" class="mb-3">
                <span>{{ index + 1 }}:</span> {{ item }}
                <v-divider />
              </div>
            </v-container>

            <v-container v-if="n === 3" class="my-10 py-0">

              <div class="mb-10">
                <h3 class="mb-5 size18-weight700">Оставить отзыв</h3>
                <v-row no-gutters class="pa-0">
                  <v-col cols="12" class="d-flex mb-10">
                    <v-avatar size="64">
                      <img alt="user" :src="baseUrl + user.avatar">
                    </v-avatar>
                    <div class="ml-3">
                      <div
                        class="mb-2"
                        :class="vuetifyBreakpoint.xl ? 'size16-weight700' : 'size14-weight700'"
                      >
                        {{ user.full_name }}
                      </div>
                      <div class="d-flex align-center size16-weight400">
                        Моя оценка:
                        <v-rating
                          v-model="newReview.stars"
                          color="amber"
                          dense
                          half-increments
                          size="25"
                          class="ml-1 pb-1"
                        />
                      </div>
                    </div>
                  </v-col>

                  <v-col>
                    <h3 class="size16-weight400">Тема отзыва <span class="red--text">*</span></h3>
                    <TextField
                      v-model="newReview.content"
                      placeholder="Введите текст"
                      dense
                    />

                    <h3 class="size16-weight400">Отзыв</h3>
                    <v-textarea
                      dense
                      outlined
                      placeholder="Введите текст"
                    ></v-textarea>

                    <Button
                      content="Отправить"
                      :color-button="vuetifyMainGreen"
                      class="w-100"
                      :max-width="200"
                    />
                  </v-col>
                </v-row>
              </div>

              <div>
                <h3 class="size20-weight700">Отзывы</h3>
                <v-row no-gutters class="pa-0">
                  <v-col
                    v-for="(item, index) in productCard.reviews"
                    :key="index"
                    md="4"
                    class="pa-0"
                  >
                    <template v-if="index < displayedReviews">
                      <ReviewCard :item="item" @openDialog="openDialog(item)"/>
                    </template>
                  </v-col>
                </v-row>
              </div>

              <div class="flex-center mb-md-16">
                <Button
                  :color-text="vuetifyMainWhite"
                  content="Еще отзывы"
                  :min-height="54"
                  :max-width="246"
                  class="size18-weight700 w-100"
                  @submit="displayedReviews += 4"
                />
              </div>
            </v-container>
          </v-tab-item>
        </v-tabs>
      </v-col>
    </v-row>

    <ReviewsDialog ref="review" :current-review="currentReview"/>
  </CommonPagesLayout>
</template>

<script>
import MockMixin from "../../mixins/MockMixin";

export default {
  name: "ProductCardPage",
  components: {
    CommonPagesLayout: () => import('~~/components/feature/CommonPagesLayout'),
    ReviewsDialog: () => import('~~/components/reviews-page/ReviewsDialog'),
    ReviewCard: () => import('~~/components/reviews-page/ReviewCard'),
  },
  mixins: [MockMixin],
  props: {
    category: {
      type: String,
      default: ''
    },
    group: {
      type: String,
      default: ''
    },
    product: {
      type: String,
      default: ''
    },
  },
  data() {
    return {
      breadcrumbs: [
        {
          text: 'Главная',
          href: '/',
        },
        {
          text: this.textConvertor(this.category),
          href: `/category/${this.category}`,
        },
        {
          text: this.textConvertor(this.group),
          href: `/category/${this.category}/${this.group}`,
        },
        {
          text: this.textConvertor(this.product),
          href: `/category/${this.category}/${this.group}/${this.product}`,
        },
      ],
      weightType: null,
      isBuying: false,
      currentReview: {},
      displayedReviews: 3,
      newReview: {
        title: '',
        content: '',
        stars: null,
      }
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
    openDialog(item) {
      this.currentReview = item;
      this.$refs.review.openDialog();
    },
  },
}
</script>

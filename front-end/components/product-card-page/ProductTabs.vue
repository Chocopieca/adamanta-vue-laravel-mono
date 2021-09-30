<template>
  <div>
    <Tabs :tabs="tabs">
      <v-tab-item v-for="(tab, tabIndex) in tabs" :key="tabIndex">
        <v-divider />
        <v-container v-if="tab.name === 'description'" class="my-10 pa-md-0">
          {{ productCard.description }}
        </v-container>

        <v-container v-if="tab.name === 'usage'" class="my-10 pa-md-0">
          <div v-for="(content, id) in productCard.usage" :key="id" class="mb-3">
            <span>{{ id + 1 }}:</span> {{ content }}
            <v-divider />
          </div>
        </v-container>

        <v-container v-if="tab.name === 'reviews'" class="my-10 py-0">
          <div class="mb-10">
            <h3 class="mb-5 size18-weight700">Оставить отзыв</h3>
            <v-row no-gutters class="pa-0">
              <v-col cols="12" class="d-flex mb-10">
                <v-avatar size="64">
                  <img alt="user" :src="baseUrl + userProfile.avatar">
                </v-avatar>
                <div class="ml-3">
                  <div
                    class="mb-2"
                    :class="vuetifyBreakpoint.xl ? 'size16-weight700' : 'size14-weight700'"
                  >
                    {{ userProfile.full_name }}
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
                v-for="(review, reviewIndex) in productCard.reviews"
                :key="reviewIndex"
                md="4"
                class="pa-0"
              >
                <template v-if="index < displayedReviews">
                  <ReviewCard :item="review" @openDialog="openDialog(review)"/>
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
    </Tabs>

    <ReviewsDialog ref="review" :current-review="currentReview"/>
  </div>
</template>

<script>

import MockMixin from "../../mixins/MockMixin";

export default {
  name: "ProductTabs",
  components: {
    Tabs: () => import('~~/components/common/Tabs'),
    ReviewCard: () => import('~~/components/reviews-page/ReviewCard'),
    ReviewsDialog: () => import('~~/components/reviews-page/ReviewsDialog'),
  },
  mixins: [MockMixin],
  data() {
    return {
      tabs: [
        {
          name: 'description',
          title: 'Описание',
        },
        {
          name: 'usage',
          title: 'Использование',
        },
        {
          name: 'reviews',
          title: 'Отзывы',
        },
      ],
      newReview: {
        title: '',
        content: '',
        stars: null,
      },
      currentReview: {},
      displayedReviews: 3,
    }
  },
  methods: {
    openDialog(item) {
      this.currentReview = item;
      this.$refs.review.openDialog();
    },
  }
}
</script>

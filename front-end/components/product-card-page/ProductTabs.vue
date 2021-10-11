<template>
  <div>
    <Tabs :tabs="tabs">
      <v-tab-item v-for="(tab, tabIndex) in tabs" :key="tabIndex">
        <v-divider />
        <v-container v-if="tab.name === 'description'" class="my-10 pa-md-0">
          {{ productCard.description }}
        </v-container>

        <v-container v-if="tab.name === 'usage'" class="my-10 pa-md-0">
          <div v-for="(content, id) in productCard.usage" :key="id" class="my-5">
            <span class="usage-id">{{ id + 1 }}</span> {{ content }}
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

              <v-col cols="12" class="review-form">
                <h3 class="size16-weight400 mb-3">Тема отзыва <span class="red--text">*</span></h3>
                <TextField
                  v-model="newReview.title"
                  placeholder="Введите текст"
                  dense
                  class="mb-5"
                />

                <h3 class="size16-weight400 mb-3">Отзыв</h3>
                <v-textarea
                  v-model="newReview.content"
                  dense
                  outlined
                  auto-grow
                  placeholder="Введите текст"
                  class="size24-weight700 mb-5"
                />

                <Button
                  content="Отправить"
                  :color-button="vuetifyMainGreen"
                  class="w-100"
                  :max-width="200"
                  @submit="openSuccessReviewDialog"
                />
              </v-col>
            </v-row>
          </div>

          <ReviewsList
            :reviews="productCard.reviews"
            :number-of-cards="3"
            :adding-cars="3"
            :card-cols-in-row="4"
          />
        </v-container>
      </v-tab-item>
    </Tabs>

    <SuccessReviewDialog ref="successReview"/>
  </div>
</template>

<script>

import MockMixin from "../../mixins/MockMixin";

export default {
  name: "ProductTabs",
  components: {
    Tabs: () => import('~~/components/common/Tabs'),
    ReviewsList: () => import('~~/components/common/ReviewsList'),
    SuccessReviewDialog: () => import('~~/components/product-card-page/SuccessReviewDialog'),
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
    openSuccessReviewDialog() {
      this.newReview.title = '';
      this.newReview.content = '';
      this.newReview.stars = null;

      this.$refs.successReview.openDialog();
    },
  }
}
</script>

<style scoped lang="scss">
.usage-id {
  background: var(--v-main_green-base);
  border-radius: 50%;
  color: white;
  padding: 7px 10px;
}

::v-deep.review-form {
  input {
    font-size: 16px !important;
  }

  textarea {
    font-size: 16px !important;
  }
}
</style>

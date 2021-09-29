<template>
  <v-lazy
    v-model="isActive"
    :options="{ threshold: .5 }"
    min-height="200"
    transition="fade-transition"
  >
    <div class="position-relative">
      <h2 class="mb-md-16">Отзывы</h2>
      <Carousel
        siad-arrow
        :with-side-arrow="vuetifyBreakpoint.lgAndUp"
        :slides-to-show="[1, 2, 3, 3]"
        :banner-slides="reviews"
        :with-arrow="false"
        :with-dots="false"
      >
        <template #slides>
          <template v-for="(item, index) in lastReviews">
            <div :key="index">
              <ReviewCard :item="item" @openDialog="openDialog(item)"/>
            </div>
          </template>
        </template>
      </Carousel>

      <ReviewsDialog ref="review" :current-review="currentReview"/>
    </div>
  </v-lazy>
</template>

<script>
import MockMixin from '../../mixins/MockMixin';

export default {
  name: "Reviews",
  components: {
    Carousel: () => import('~~/components/common/Carousel'),
    ReviewsDialog: () => import('~~/components/reviews-page/ReviewsDialog'),
    ReviewCard: () => import('~~/components/reviews-page/ReviewCard'),
  },
  mixins: [MockMixin],
  data() {
    return {
      currentReview: {},
      isActive: false,
    }
  },
  computed: {
    lastReviews() {
      return this.reviews.filter((item, index) => index < 5)
    }
  },
  methods: {
    openDialog(item) {
      this.currentReview = item;
      this.$refs.review.openDialog();
    },
  },
}
</script>

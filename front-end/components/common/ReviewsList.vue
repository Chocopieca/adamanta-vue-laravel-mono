<template>
  <v-lazy
    :options="{ threshold: .5 }"
    min-height="200"
    transition="fade-transition"
  >
    <div>
      <v-row no-gutters class="mb-md-16">
        <template v-for="(item, index) in reviews">
          <template v-if="index < displayedReviews">
            <v-col :key="index" cols="12" :md="cardColsInRow">
              <ReviewCard :item="item" @openDialog="openDialog(item)"/>
            </v-col>
          </template>
        </template>
      </v-row>

      <div class="flex-center mb-md-16">
        <Button
          :color-text="vuetifyMainWhite"
          content="Еще отзывы"
          :min-height="54"
          :max-width="246"
          font-size="size18-weight700"
          class="w-100"
          @submit="displayedReviews += addingCars"
        />
      </div>

      <ReviewsDialog ref="review" :current-review="currentReview"/>
    </div>
  </v-lazy>
</template>

<script>
export default {
  name: "ReviewsList",
  components: {
    ReviewsDialog: () => import('~~/components/reviews-page/ReviewsDialog'),
    ReviewCard: () => import('~~/components/reviews-page/ReviewCard'),
  },
  props: {
    reviews: {
      type: Array,
      default: () => [],
    },
    numberOfCards: {
      type: Number,
      default: 8,
    },
    addingCars: {
      type: Number,
      default: 4,
    },
    cardColsInRow: {
      type: Number,
      default: 3
    }
  },
  data() {
    return {
      displayedReviews: null,
      currentReview: {},
    }
  },
  mounted() {
    this.displayedReviews = this.numberOfCards;
  },
  methods: {
    openDialog(item) {
      this.currentReview = item;
      this.$refs.review.openDialog();
    },
  },
}
</script>

<style scoped>

</style>

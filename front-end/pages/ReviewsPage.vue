<template>
  <v-container class="pa-0">
    <Breadcrumbs :items="breadcrumbs"/>
    <div class="px-3">
      <h1 class="mb-5 size20-weight700">Отзывы</h1>
      <v-row no-gutters class="mb-md-16">
        <template v-for="(item, index) in reviews">
          <v-col :key="index" cols="12" md="3">
            <ReviewCard :item="item" @openDialog="openDialog(item)"/>
          </v-col>
        </template>
      </v-row>

      <div class="mb-md-16">
        <PopularProducts />
      </div>
    </div>

    <ReviewsDialog ref="review" :current-review="currentReview"/>
  </v-container>
</template>

<script>
import MockMixin from "../mixins/MockMixin";

export default {
  name: "ReviewsPage",
  components: {
    Breadcrumbs: () => import('~~/components/common/Breadcrumbs'),
    PopularProducts: () => import('~~/components/home-page/PopularProducts'),
    ReviewsDialog: () => import('~~/components/reviews-page/ReviewsDialog'),
    ReviewCard: () => import('~~/components/reviews-page/ReviewCard'),
  },
  mixins: [MockMixin],
  data() {
    return {
      breadcrumbs: [
        {
          text: 'Главная',
          href: '/',
        },
        {
          text: 'Отзывы',
          href: `/reviews`,
        },
      ],
      currentReview: {},
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

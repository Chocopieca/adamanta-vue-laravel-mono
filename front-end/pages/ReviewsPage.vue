<template>
  <v-container class="pa-0">
    <Breadcrumbs :items="breadcrumbs"/>
    <div class="px-3">
      <h1 class="mb-5 size20-weight700">Отзывы</h1>

      <ReviewsList :reviews="reviews" :number-of-cards="8"/>

      <div class="mb-md-16">
        <PopularProducts />
      </div>
    </div>
  </v-container>
</template>

<script>
import MockMixin from "../mixins/MockMixin";

export default {
  name: "ReviewsPage",
  components: {
    Breadcrumbs: () => import('~~/components/common/Breadcrumbs'),
    PopularProducts: () => import('~~/components/home-page/PopularProducts'),
    ReviewsList: () => import('~~/components/common/ReviewsList'),
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
          href: `reviews`,
        },
      ],
    }
  },
}
</script>

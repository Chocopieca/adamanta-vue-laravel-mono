<template>
  <CommonPagesLayout :breadcrumbs="breadcrumbs">
    <div class="px-3">
      <h1 class="mb-5 mt-0 size20-weight700">Отзывы</h1>
      <ReviewsList :reviews="reviews" :number-of-cards="8"/>
    </div>
  </CommonPagesLayout>
</template>

<script>
import MockMixin from "../mixins/MockMixin";

export default {
  name: "ReviewsPage",
  components: {
    CommonPagesLayout: () => import('~~/components/feature/CommonPagesLayout'),
    ReviewsList: () => import('~~/components/common/ReviewsList'),
  },
  mixins: [MockMixin],
  data() {
    return {
      breadcrumbs: [
        {
          text: 'Главная',
          href: '',
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

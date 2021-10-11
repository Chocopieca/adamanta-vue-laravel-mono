<template>
  <Dialog ref="review">
    <v-card class="pa-md-5 pt-md-0" elevation="0">
      <template slot="progress">
        <v-progress-linear
          color="deep-purple"
          height="10"
          indeterminate
        ></v-progress-linear>
      </template>

      <v-card-title class="d-flex justify-space-between align-end pt-0">
        <div class="d-flex">
          <v-avatar size="64">
            <img alt="user" :src="baseUrl + currentReview.avatar">
          </v-avatar>

          <div class="ml-3">
            <div :class="vuetifyBreakpoint.xl ? 'size16-weight700' : 'size14-weight700'">{{ currentReview.full_name }}</div>
            <v-rating
              :value="currentReview.stars"
              color="amber"
              dense
              half-increments
              readonly
              size="14"
            ></v-rating>
          </div>
        </div>

        <div class="size14-weight400 d-flex align-bottom" :style="`color: ${vuetifyMainGray}`">
          {{ dateConvertor(currentReview.date) }}
        </div>
      </v-card-title>

      <v-card-text>
        <div class="my-4 size18-weight700">
          {{ currentReview.title }}
        </div>

        <div :class="vuetifyBreakpoint.xl ? 'size16-weight400' : 'size14-weight400'">{{ currentReview.content }}</div>
      </v-card-text>
    </v-card>
  </Dialog>
</template>

<script>
export default {
  name: "ReviewsDialog",
  components: {
    Dialog: () => import('~~/components/common/Dialog'),
  },
  props: {
    currentReview: {
      type: Object,
      default: () => {},
    }
  },
  methods: {
    openDialog() {
      this.$refs.review.toggle();
    },
  }
}
</script>

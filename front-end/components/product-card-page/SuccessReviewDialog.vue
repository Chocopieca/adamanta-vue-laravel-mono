<template>
  <Dialog ref="dialog">
    <div class="flex-center flex-column">
      <v-img contain max-width="446" :src="baseUrl + 'image/successReview.svg'" class="mb-10" />
      <h3 class="size36-weight700" :style="`color: ${vuetifyMainGreen}`">Спасибо!</h3>
      <p class="size22-weight400 text-md-center">Ваш комментарий будет добавлен.</p>
    </div>
  </Dialog>
</template>

<script>
export default {
  name: "SuccessReviewDialog",
  components: {
    Dialog: () => import('~~/components/common/Dialog'),
  },
  methods: {
    openDialog() {
      this.$refs.dialog.toggle();
    },
  },
}
</script>

<style scoped>

</style>

<template>
  <v-card class="pa-md-5" elevation="0">
    <template slot="progress">
      <v-progress-linear
        color="deep-purple"
        height="10"
        indeterminate
      ></v-progress-linear>
    </template>

    <v-card-title>
      <v-avatar size="64">
        <img alt="user" :src="item.avatar">
      </v-avatar>
      <div class="ml-3">
        <div :class="vuetifyBreakpoint.xl ? 'size16-weight700' : 'size14-weight700'">{{ item.full_name }}</div>
        <v-rating
          :value="item.stars"
          color="amber"
          dense
          half-increments
          readonly
          size="14"
        ></v-rating>
      </div>
    </v-card-title>

    <v-card-text>
      <div class="my-4 size18-weight700">
        {{ item.title }}
      </div>

      <div
        :class="vuetifyBreakpoint.xl ? 'size16-weight400' : 'size14-weight400'"
        class="review-content"
      >
        {{ item.content }}
      </div>
    </v-card-text>

    <v-card-actions class="d-flex justify-space-between">
      <Button
        :color-text="vuetifyMainBlack"
        :color-button="vuetifyTransparent"
        icon="mdi-ray-start-arrow"
        content="Весь отзыв"
        text
        class="size14-weight400"
        @submit="$emit('openDialog')"
      />

      <div>{{ dateConvertor(item.date) }}</div>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  name: "ReviewCard",
  props: {
    item: {
      type: Object,
      default: () => {},
    }
  },
}
</script>

<style scoped lang="scss">
.review-content {
  overflow: hidden;
  text-overflow: ellipsis;
  display: -moz-box;
  -moz-box-orient: vertical;
  display: -webkit-box;
  -webkit-line-clamp: 9;
  -webkit-box-orient: vertical;
  line-clamp: 9;
  box-orient: vertical;
}
</style>

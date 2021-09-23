<template>
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
        <template v-for="(item, index) in reviews">
          <v-card :key="index" class="pa-md-5" elevation="0">
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

              <div :class="vuetifyBreakpoint.xl ? 'size16-weight400' : 'size14-weight400'">{{ item.content }}</div>
            </v-card-text>

            <v-card-actions class="d-flex justify-space-between">
              <nuxt-link :to="$lang.link('reviews')">
                <Button
                  :color-text="vuetifyMainBlack"
                  :color-button="vuetifyTransparent"
                  icon="mdi-ray-start-arrow"
                  content="Весь отзыв"
                  text
                  class="size14-weight400"
                />
              </nuxt-link>

              <div>{{ dateConvertor(item.date) }}</div>
            </v-card-actions>
          </v-card>
        </template>
      </template>
    </Carousel>
  </div>
</template>

<script>
import MockMixin from '~~/mixins/MockMixin';

export default {
  name: "Reviews",
  components: {
    Carousel: () => import('~~/components/common/Carousel'),
  },
  mixins: [MockMixin],
  methods: {
    dateConvertor(timestamp = new Date) {
      let month = String(timestamp.getMonth() + 1);
      let day = String(timestamp.getDate());
      const year = String(timestamp.getFullYear());

      if (month.length < 2) month = '0' + month;
      if (day.length < 2) day = '0' + day;

      return `${day}.${month}.${year}`;
    }
  },
}
</script>

<style scoped lang="scss">

</style>

<template>
  <v-lazy
    v-model="isActive"
    :options="{ threshold: .5 }"
    min-height="200"
    transition="fade-transition"
  >
    <div class="position-relative">
      <Carousel
        :class="vuetifyBreakpoint.lgAndUp ? 'category-carousel' : ''"
        :slides-to-show="[2, 3, 4, 4]"
        :banner-slides="navCategory"
        :with-arrow="false"
        :with-dots="false"
        infinite
      >
        <template #slides>
          <div v-for="(item, index) in navCategory" :key="index">
            <v-card
              elevation="5"
              class="flex-center flex-column text-center mx-5 mx-md-10 ma-2 pa-4"
              height="174"
              @click="routeToCategory(item.link)"
            >
              <v-img :src="baseUrl + item.icon" contain height="88" width="88"/>
              <div class="size18-weight700">{{ item.title }}</div>
            </v-card>
          </div>
        </template>
      </Carousel>
    </div>
  </v-lazy>
</template>

<script>
import MockMixin from '~~/mixins/MockMixin';

export default {
  name: "Category",
  components: {
    Carousel: () => import('~~/components/common/Carousel'),
  },
  mixins: [MockMixin],
  data() {
    return {
      isActive: false,
    }
  },
  methods: {
    routeToCategory(link) {
      this.$router.push(`category/${link}`);
    },
  }
}
</script>

<style scoped lang="scss">
@import '~vuetify/src/styles/styles.sass';

.category-carousel {
  position: absolute;
  width: 1300px;
  top: -100px;
  @media (max-width: map-get($grid-breakpoints, lg)) {
    width: 900px;
  }
  @media (max-width: map-get($grid-breakpoints, md)) {
    width: 768px;
  }
}
</style>

<template>
  <Carousel
    :slides-to-show="[1]"
    :banner-slides="bannerSlides"
    :max-height="vuetifyBreakpoint.lgAndUp ? '700' : '500'"
    nav-color="white"
    with-arrow
    with-dots
    infinite
    autoplay
  >
    <template #slides>
      <div v-for="(item, index) in bannerSlides" :key="index">
        <v-img :src="baseUrl + item.background" cover :height="vuetifyBreakpoint.lgAndUp ? 700 : 500">
          <v-container class="pt-16">
            <v-col sm="8" md="8" lg="6" class="banner-content">
              <h2
                class="mb-10"
                :class="vuetifyBreakpoint.lgAndUp ? 'size36-weight700' : 'size22-weight700'"
              >{{ item.title }}</h2>
              <p
                class="mb-10"
                :class="vuetifyBreakpoint.lgAndUp ? 'size22-weight400' : 'size14-weight400'"
              >{{ item.content }}</p>
              <Button
                :color-text="vuetifyMainWhite"
                content="Купить"
                :min-height="54"
                :max-width="246"
                class="size18-weight700 w-100"
              />
            </v-col>
          </v-container>
        </v-img>
      </div>
    </template>
  </Carousel>
</template>

<script>
import MockMixin from '~~/mixins/MockMixin';

export default {
  name: "Banner",
  components: {
    Carousel: () => import('~~/components/common/Carousel'),
  },
  mixins: [MockMixin],
}
</script>

<style scoped lang="scss">
.banner {
  &-content {
    color: var(--v-main_white-base);
    background: #00000099;
    border-radius: 20px 20px;
  }
}
</style>

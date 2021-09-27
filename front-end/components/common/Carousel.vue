<template>
  <div class="position-relative">
    <VueSlickCarousel
      ref="carousel"
      v-bind="settings"
      class="carousel"
      :style="`max-height: ${maxHeight}px`"
      @afterChange="currentSlide = $event"
    >
      <slot name="slides"></slot>
    </VueSlickCarousel>

    <div class="banner-arrows">
      <span v-if="withArrow" @click="showPrev()">
        <v-btn icon :color="navColor">
          <v-icon>mdi-chevron-left</v-icon>
        </v-btn>
      </span>
      <template v-if="withDots">
        <template v-for="(item, i) in bannerSlides">
          <v-btn :key="i" icon :color="navColor" @click="goTo(i)">
            <v-icon :size="isCurrentSlide(i) ? 20 : 15">mdi-circle</v-icon>
          </v-btn>
        </template>
      </template>
      <span v-if="withArrow" @click="showNext()">
        <v-btn icon :color="navColor">
          <v-icon>mdi-chevron-right</v-icon>
        </v-btn>
      </span>
    </div>

    <div v-if="withSideArrow" class="banner-side-arrows">
      <span @click="showPrev()">
        <v-btn elevation="1" icon large :color="vuetifyMainGreen">
          <v-icon>mdi-chevron-left</v-icon>
        </v-btn>
      </span>
      <span @click="showNext()">
        <v-btn elevation="1" icon large :color="vuetifyMainGreen">
          <v-icon>mdi-chevron-right</v-icon>
        </v-btn>
      </span>
    </div>

  </div>
</template>

<script>
import 'vue-slick-carousel/dist/vue-slick-carousel.css'
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

export default {
  name: "Carousel",
  props: {
    bannerSlides: {
      type: Array,
      default: () => [],
    },
    withArrow: {
      type: Boolean,
      default: true,
    },
    withDots: {
      type: Boolean,
      default: true,
    },
    maxHeight: {
      type: String,
      default: "600",
    },
    slidesToShow: {
      type: Array,
      default: () => [1, 2, 4, 1], // <600, <960, <1264. >1264 breakpoints
    },
    infinite: {
      type: Boolean,
      default: false,
    },
    autoplay: {
      type: Boolean,
      default: false,
    },
    navColor: {
      type: String,
      default: 'black'
    },
    withSideArrow: {
      type: Boolean,
      default: false,
    }
  },
  data() {
    return {
      currentSlide: 0,
    }
  },
  computed: {
    settings() {
      return {
        "infinite": this.infinite,
        "speed": 500,
        "slidesToShow": this.slidesToShow[3] ?? 1,
        "slidesToScroll": 1,
        "autoplay": this.autoplay,
        "accessibility": true,
        "arrows": false,
        'lazyLoad': 'ondemand',
        "responsive": [
          {
            "breakpoint": 1264,
            "settings": {
              "slidesToShow": this.slidesToShow[2] ?? 1,
              "slidesToScroll": 1,
              "infinite": true,
              "dots": true
            }
          },
          {
            "breakpoint": 960,
            "settings": {
              "slidesToShow": this.slidesToShow[1] ?? 1,
              "slidesToScroll": 1,
            }
          },
          {
            "breakpoint": 600,
            "settings": {
              "slidesToShow": this.slidesToShow[0] ?? 1,
              "slidesToScroll": 1
            }
          }
        ]
      }
    }
  },
  methods: {
    showNext() {
      this.$refs.carousel.next()
    },
    showPrev() {
      this.$refs.carousel.prev()
    },
    goTo(index) {
      this.$refs.carousel.goTo(index)
    },
    isCurrentSlide(index) {
      return this.currentSlide === index;
    }
  },
}
</script>

<style scoped lang="scss">
@import '~vuetify/src/styles/styles.sass';

.banner-arrows {
  display: flex;
  justify-content: center;
  position: absolute;
  left: 0;
  right: 0;
  top: 520px;
  @media (max-width: map-get($grid-breakpoints, md)) {
    top: 400px;
  }
  @media (max-width: map-get($grid-breakpoints, sm)) {
    top: 450px;
  }
}

::v-deep.carousel {
  overflow: hidden;

  .slick-dots {
    display: none !important;
  }
}

.banner-side-arrows {

  & > span {
    position: absolute;
    top: 150px;
  }

  & > span:nth-child(1) {
    left: -50px;
  }

  & > span:nth-child(2) {
    right: -50px;
  }
}
</style>

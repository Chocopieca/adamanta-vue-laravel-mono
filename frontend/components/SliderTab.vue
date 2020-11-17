<template>
  <el-col :span="24">
    <el-card v-if="showSlider()" :body-style="{ padding: '0px'}" class="mt-20" style="padding-top: 8px">
      <div slot="header">
        <slot name="header"/>
      </div>

      <template v-if="getDeviceType">
        <swiper v-if="slides.length > 0" ref="mySwiper" :options="options()">
          <swiper-slide v-for="(book, index) in slides" :key="index" class="plr-6">
            <book-card-simple-tile :book="book" padding="8" style="width: 100%" />
          </swiper-slide>

          <button
            slot="button-prev"
            style="display: none"
            type="button"
            class="myswiper-button-prev el-carousel__arrow el-carousel__arrow--left"
          >
            <i class="el-icon-arrow-left"/>
          </button>
          <button
            slot="button-next"
            :style="'display: ' + (slides.length <= getCountSlides() ? 'none' : 'block')"
            type="button"
            class="myswiper-button-next el-carousel__arrow el-carousel__arrow--right"
          >
            <i class="el-icon-arrow-right"/>
          </button>
        </swiper>

        <template v-else>
          <h4 class="text-center">{{ $t('labels.books_not_found') }}</h4>
        </template>
      </template>
    </el-card>
  </el-col>
</template>

<script>
export default {
  props: {
    slides: {
      type: Array,
      default: null
    },
    show_empty: {
      type: Boolean,
      default: true
    },
    type: {
      type: String,
      default: ''
    },
    api: {
      type: String,
      default: ''
    }
  },
  data() {
    return {
      offset: 0
    }
  },
  methods: {
    showSlider() {
      return this.getDeviceType && (this.slides.length > 0 || this.show_empty !== false)
    },
    getHeight() {
      let spans = {
        large_displays: 540,
        desktop: 430,
        tablet_portrait: 500,
        small_tablet: 440,
        smart_phone: 400,
        small_smart_phone: 560
      }

      return spans[this.getDeviceType] ? spans[this.getDeviceType] : 400
    },
    options() {
      let that = this
      let displayCount = this.getCountSlides()

      return {
        on: {
          resize: function () {
            if (this.params.slidesPerView !== that.getCountSlides()) {
              this.params.slidesPerView = that.getCountSlides()
              this.params.slidesPerGroup = that.getCountSlides()

              setTimeout(() => {
                this.update()
              }, 600)
            }
          },
          slideChange: function () {
            this.navigation.prevEl.style.display = 'block'
            this.navigation.nextEl.style.display = 'block'

            if (this.activeIndex === 0) {
              this.navigation.prevEl.style.display = 'none'
            }

            if (this.isEnd) {
              if (this.slides.length < 30) {
                that.offset = that.offset === 0
                  ? (that.getCountSlides() * 2)
                  : that.offset + that.getCountSlides()

                that.$axios.get(that.api, {
                  params: {type: that.type, limit: that.getCountSlides(), offset: that.offset}
                }).then((res) => {
                  if (res.data.length > 0) {
                    for (let i = 0; i < res.data.length; i += 1) {
                      if (res.data[i]) that.slides.push(res.data[i])
                    }
                  } else {
                    this.navigation.nextEl.style.display = 'none'
                  }

                })
              } else {
                this.navigation.nextEl.style.display = 'none'
              }
            }
          }
        },
        watchOverflow: true,
        updateOnWindowResize: false,
        grabCursor: true,
        slidesPerView: displayCount,
        slidesPerGroup: displayCount,
        spaceBetween: 0,
        loop: false,
        navigation: {
          nextEl: '.myswiper-button-next',
          prevEl: '.myswiper-button-prev',
        }
      }
    }
  }
}
</script>
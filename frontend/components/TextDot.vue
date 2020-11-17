<template>
  <div>
    <div class="description-block">
      <div :class="(!dot ? 'dot-show-text' : 'dot-hide-text')">
        <div v-if="label" class="font-weight-bold">{{ label }}</div>

        <div class="mt-10">
          <v-clamp v-if="dot" :max-lines="4" :expanded="!dot" class="desc dot-dot-dot" autoresize>
            {{ getWithoutHtml() }}
          </v-clamp>

          <swiper v-if="!dot" :options="options()" :style="'height: ' + descHeight + 'px;'" class="swiper">
            <swiper-slide class="text" v-html="msg"/>

            <div slot="scrollbar" class="swiper-scrollbar"/>
          </swiper>
        </div>
      </div>
    </div>

    <template v-if="showSwitch">
      <span v-if="dot" class="show-more link" @click="dot = !dot">Подробнее</span>
      <span v-if="!dot" class="show-more link" @click="dot = !dot">Скрыть</span>
    </template>
  </div>
</template>

<script>
const he = require('he')

export default {
  name: 'TextDot',
  props: {
    line: { type: Number, default: 3 },
    msg: { type: String, required: true },
    label: { type: String, default: null },
    descHeight: { type: String, default: '200' },
    showSwitch: { type: Boolean, default: true },
  },
  data () {
    return {
      dot: true
    }
  },
  methods: {
    getWithoutHtml() {
      return he.decode(this.msg).replace(/<style[^>]*>.*<\/style>/gm, '')
        .replace(/<[^>]+>/gm, '')
        .replace(/([\r\n]+ +)+/gm, '')
    },
    options() {
      return {
        direction: 'vertical',
        slidesPerView: 'auto',
        freeMode: true,
        scrollbar: {
            el: '.swiper-scrollbar'
        },
        mousewheel: true
      }
    }
  }
}
</script>

<style lang="scss" scoped>
    .dot-show-text {
        position: absolute;
        top: 0;
        background-color: #fff;
        height: 100%;
    }
    .dot-show-text .desc {
        overflow: hidden;
        overflow-y: auto;
    }
    .dot-hide-text {
        transition: top 1s ease-out 0.5s
    }
    .show-more {
        position: relative;
        text-align: right;
        display: block;
    }

    .swiper {
        /deep/ .swiper-slide {
            &.text {
                height: auto;
                padding-right: 10px;
            }
        }
    }
</style>

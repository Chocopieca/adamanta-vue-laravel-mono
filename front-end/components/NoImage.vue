<template>
  <div :style="getHeight() + ' width: 100%;'" class="no-image-cover">
    <img :src="$env.baseUrl +'images/zavituha.png'" style="display: block; position: relative; top: 6px; margin: 0 auto;">

    <div class="flex flex-v-center" style="height: 100%">
      <div class="w-100" style="padding: 0 10px 0 10px;">
        <div class="no-image-title">Knig<span class="font-weight-bold">nator</span></div>
        <div style="border-bottom: 1px solid #979797; width: 90%; margin: 10px auto;"/>
        <div>{{ text }}</div>
      </div>
    </div>

    <div style="position: absolute; bottom: 6px;">
      <img :src="$env.baseUrl +'images/zavituha.png'" style="transform: scale(1, -1);">
    </div>
  </div>
</template>

<script>
export default {
  name: "NoImage",
  props: {
	text: {
      type: String,
      default: null
    },
	height: {
      type: String,
      default: null
    },
  },
  methods: {
    getHeight() {
      return 'height: '+ (this.height ? this.height + 'px' : '100%') + ';'
    }
  }
}
</script>
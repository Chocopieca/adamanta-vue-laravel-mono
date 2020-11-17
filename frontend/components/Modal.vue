<template>
  <el-dialog :width="width ? width : '50%'" :title="title ? title : ''" :visible.sync="show">
    <slot/>
  </el-dialog>
</template>

<script>
export default {
  name: "Modal",
  props: {
    emit: {
      type: String,
      default: ''
    },
	width: {
      type: String,
      default: null
    },
	title: {
      type: String,
      default: ''
    },
  },
  data() {
    return {
      show: false
    }
  },
  created() {
    this.$root.$on(this.emit, (show) => {
      this.show = show
    })
  }
}
</script>
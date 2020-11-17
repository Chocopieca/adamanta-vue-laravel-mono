<template>
  <el-main>
    <section :class="config.classContainer ? 'container' : ''">
      <breadcrumbs v-if="config.showBreadcrumbs" />

      <router-view :key="$route.fullPath"/>
    </section>
  </el-main>
</template>

<script>
export default {
  name: "Container",
  components: {
    Breadcrumbs: () => import('./Breadcrumbs')
  },
  data() {
    return {
      config: {
        classContainer: true,
        showBreadcrumbs: false
      }
    }
  },
  created() {
    this.$root.$on('eventMainContainer', (data) => {
      this.config = Object.assign({}, this.config, data)
    })
  }
}
</script>

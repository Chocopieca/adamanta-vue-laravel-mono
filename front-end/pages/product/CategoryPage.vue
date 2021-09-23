<template>
  <div>
    CategoryPage
    <div>{{ $route.params.category }}</div>
  </div>
</template>

<script>
export default {
  name: "Category",
  props: {
    category: {
      type: String,
      default: ''
    }
  }
}
</script>

<style scoped>

</style>

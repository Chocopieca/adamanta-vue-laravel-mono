<template>
  <v-pagination
    v-model="page"
    :length="productPages"
    :total-visible="7"
    circle
  ></v-pagination>
</template>

<script>
export default {
  name: "Pagination",
  props: {
    itemArray: {
      type: Array,
      default: () => [],
    }
  },
  data() {
    return {
      page: 1,
    }
  },
  computed: {
    productPages() {
      return Math.ceil(this.itemArray.length / 16)
    },
    paginateItems() {
      const firstIndex = (this.page - 1) * 4
      return this.itemArray.filter((item, index) => {
        return index >= firstIndex && index < firstIndex + 16;
      })
    }
  },
  watch: {
    paginateItems: {
      immediate: true,
      handler() {
        this.$emit('getPaginateArray', this.paginateItems);
      }
    }
  }
}
</script>

<style scoped>

</style>

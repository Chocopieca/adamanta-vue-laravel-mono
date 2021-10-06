<template>
  <CommonPagesLayout :breadcrumbs="breadcrumbs">
    <v-row no-gutters class="mb-md-100 mb-16">
      <v-col v-for="(item, index) in paginateItems" :key="index" cols="12" sm="4" md="3" class="pa-3">
        <ProductItem :item="item" @addToBasket="$refs.snackbar.toggle()"/>
      </v-col>
    </v-row>

    <div class="flex-center mb-md-16">
      <Pagination :item-array="categoryProducts" @getPaginateArray="paginateItems = $event"/>
    </div>

    <Snackbar ref="snackbar" content="Товар добавлен в корзину"/>
  </CommonPagesLayout>
</template>

<script>
import MockMixin from "../mixins/MockMixin";

export default {
  name: "SearchPage",
  mixins: [MockMixin],
  components: {
    CommonPagesLayout: () => import('~~/components/feature/CommonPagesLayout'),
    ProductItem: () => import('~~/components/common/ProductItem'),
    Pagination: () => import('~~/components/common/Pagination'),
  },
  data() {
    return {
      breadcrumbs: [
        {
          text: 'Главная',
          href: '/',
        },
        {
          text: 'Поиск',
          href: `search`,
        },
      ],
      paginateItems: [],
      searchText: this.$route.query
    }
  },
}
</script>

<style scoped>

</style>

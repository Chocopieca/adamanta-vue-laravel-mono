<template>
  <CommonPagesLayout :breadcrumbs="breadcrumbs">
    <v-row no-gutters class="mb-md-100 mb-16">
      <v-col v-for="(item, index) in paginateItems" :key="index" cols="12" sm="4" md="3" class="pa-3 pt-0">
        <ProductCardItem :item="item" @addToBasket="$refs.snackbar.toggle()"/>
      </v-col>
    </v-row>

    <div class="flex-center mb-md-16">
      <Pagination :item-array="categoryProducts" @getPaginateArray="paginateItems = $event"/>
    </div>

    <Snackbar ref="snackbar" content="Товар добавлен в корзину"/>
  </CommonPagesLayout>
</template>

<script>
import MockMixin from "../../mixins/MockMixin";

export default {
  name: "ProductListPage",
  mixins: [MockMixin],
  components: {
    CommonPagesLayout: () => import('~~/components/feature/CommonPagesLayout'),
    Pagination: () => import('~~/components/common/Pagination'),
    ProductCardItem: () => import('~~/components/product-list-page/ProductCardItem'),
  },
  props: {
    category: {
      type: String,
      default: ''
    },
    group: {
      type: String,
      default: ''
    },
  },
  data() {
    return {
      paginateItems: [],
    }
  },
  computed: {
    breadcrumbs() {
      return [
        {
          text: 'Главная',
          href: '',
        },
        {
          text: this.getTitle().category(this.navCategory, this.category),
          href: `category/${this.category}`,
        },
        {
          text: this.getTitle().category(this.categoryGroups, this.group),
          href: `category/${this.category}/${this.group}`,
        },
      ]
    },
  }
}
</script>

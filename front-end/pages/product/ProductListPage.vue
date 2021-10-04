<template>
  <CommonPagesLayout :breadcrumbs="breadcrumbs">
    <v-row no-gutters class="mb-md-100 mb-16">
      <v-col v-for="(item, index) in paginateItems" :key="index" cols="12" sm="4" md="3" class="pa-3">
        <ProductItem :item="item"/>
      </v-col>
    </v-row>

    <div class="flex-center mb-md-16">
      <Pagination :item-array="categoryProducts" @getPaginateArray="paginateItems = $event"/>
    </div>

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
    ProductItem: () => import('~~/components/common/ProductItem'),
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
      breadcrumbs: [
        {
          text: 'Главная',
          href: '/',
        },
        {
          text: this.textConvertor(this.category),
          href: `/category/${this.category}`,
        },
        {
          text: this.textConvertor(this.group),
          href: `/category/${this.category}/${this.group}`,
        },
      ],
      paginateItems: [],
    }
  },
}
</script>

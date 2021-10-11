<template>
  <CommonPagesLayout :breadcrumbs="breadcrumbs">
    <v-row no-gutters class="pa-md-3 pt-md-0">
      <v-col v-if="vuetifyBreakpoint.mdAndUp" md="3">
        <ContactInfoCard />
      </v-col>
      <v-col md="9" class="px-md-5">
        <ProductCard />

        <ProductTabs />

      </v-col>
    </v-row>
  </CommonPagesLayout>
</template>

<script>

import MockMixin from "../../mixins/MockMixin";

export default {
  name: "ProductCardPage",
  components: {
    CommonPagesLayout: () => import('~~/components/feature/CommonPagesLayout'),
    ProductTabs: () => import('~~/components/product-card-page/ProductTabs'),
    ContactInfoCard: () => import('~~/components/product-card-page/ContactInfoCard'),
    ProductCard: () => import('~~/components/product-card-page/ProductCard'),
  },
  mixins: [MockMixin],
  props: {
    category: {
      type: String,
      default: ''
    },
    group: {
      type: String,
      default: ''
    },
    product: {
      type: String,
      default: ''
    },
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
        {
          text: this.getTitle().product(this.categoryProducts, this.product),
          href: `category/${this.category}/${this.group}/${this.product}`,
        },
      ]
    },
  }
}
</script>

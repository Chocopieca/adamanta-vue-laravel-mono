<template>
  <CommonPagesLayout :breadcrumbs="breadcrumbs">
    <v-row no-gutters class="pa-md-3">
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

export default {
  name: "ProductCardPage",
  components: {
    CommonPagesLayout: () => import('~~/components/feature/CommonPagesLayout'),
    ProductTabs: () => import('~~/components/product-card-page/ProductTabs'),
    ContactInfoCard: () => import('~~/components/product-card-page/ContactInfoCard'),
    ProductCard: () => import('~~/components/product-card-page/ProductCard'),
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
    product: {
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
        {
          text: this.textConvertor(this.product),
          href: `/category/${this.category}/${this.group}/${this.product}`,
        },
      ],
    }
  },
}
</script>

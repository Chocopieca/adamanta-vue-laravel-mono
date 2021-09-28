<template>
  <CommonPagesLayout :breadcrumbs="breadcrumbs">
    <div>{{ product }}</div>
  </CommonPagesLayout>
</template>

<script>
import MockMixin from "../../mixins/MockMixin";

export default {
  name: "ProductCardPage",
  mixins: [MockMixin],
  components: {
    CommonPagesLayout: () => import('~~/components/feature/CommonPagesLayout'),
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
      ]
    }
  },
}
</script>

<template>
  <CommonPagesLayout :breadcrumbs="breadcrumbs">
    <v-row no-gutters class="mb-md-100 mb-16">
      <v-col v-for="(item, index) in paginateItems" :key="index" cols="12" sm="4" md="3" class="pa-3">
        <v-card class="ma-3" elevation="0">
          <nuxt-link :to="$lang.link(`category/${category}/${group}/${item.link}`)">
            <v-img :src="baseUrl + item.image" height="102px" />

            <v-card-title>{{ item.title }}</v-card-title>
          </nuxt-link>

          <v-divider />

          <v-card-subtitle
            v-if="item.available"
            :style="`color: ${vuetifyMainGreen}`"
            class="size12-md-weight400 size12-weight400"
          >
            <v-icon :color="vuetifyMainGreen">mdi-check-circle</v-icon>
            В наличии
          </v-card-subtitle>

          <v-card-subtitle
            v-else
            :style="`color: ${vuetifyError}`"
            class="size12-md-weight400 size12-weight400"
          >
            <v-icon :color="vuetifyError">mdi-close-circle</v-icon>
            Нет в наличии
          </v-card-subtitle>

          <v-card-subtitle class="product-price">
            {{ getProductPrice(item.price.value, item.price.currency, item.price.weight, ) }}
          </v-card-subtitle>

          <v-card-subtitle>
            {{ item.type }}
          </v-card-subtitle>

          <v-card-actions>
            <Button
              :color-button="vuetifyMainGreen"
              icon="mdi-cart-outline"
              fab
            />
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>

    <div class="flex-center mb-md-16">
      <v-pagination
        v-model="page"
        :length="productPages"
        :total-visible="7"
      ></v-pagination>
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
      page: 1,
    }
  },
  computed: {
    productPages() {
      return Math.ceil(this.categoryProducts.length / 4)
    },
    paginateItems() {
      const firstIndex = (this.page - 1) * 4
      return this.categoryProducts.filter((item, index) => {
        return index >= firstIndex && index < firstIndex + 4;
      })
    }
  },
  methods: {
    getProductPrice(val, currency, weight) {
      return `${val} ${currency} / ${weight}`
    },
  }
}
</script>

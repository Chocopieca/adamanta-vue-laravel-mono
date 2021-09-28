<template>
  <CommonPagesLayout :breadcrumbs="breadcrumbs">
    <v-row no-gutters class="mb-md-100 mb-16">
      <v-col v-for="(item, index) in categoryGroups" :key="index" cols="12" sm="6" md="4" class="pa-3">
        <nuxt-link :to="$lang.link(`category/${category}/${item.link}`)">
          <v-card class="flex-center flex-column text-center pa-10" height="300">
            <v-img :src="baseUrl + item.icon" contain height="110" width="110"/>
            <div :style="`color: ${vuetifyMainBlue}`" class="size24-weight700">{{ item.title }}</div>
          </v-card>
        </nuxt-link>
      </v-col>
    </v-row>
  </CommonPagesLayout>
</template>

<script>
import MockMixin from "../../mixins/MockMixin";

export default {
  name: "CategoryListPage",
  components: {
    CommonPagesLayout: () => import('~~/components/feature/CommonPagesLayout'),
  },
  mixins: [MockMixin],
  props: {
    category: {
      type: String,
      default: ''
    }
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
      ]
    }
  },
}
</script>

<style scoped lang="scss">

</style>

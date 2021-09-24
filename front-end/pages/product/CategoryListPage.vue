<template>
  <v-container class="pa-0">
    <v-breadcrumbs :items="breadcrumbs" divider="/" class="pa-3">
      <template v-slot:item="{ item }">
        <v-breadcrumbs-item
          nuxt
          :to="item.href"
        >
          {{ item.text }}
        </v-breadcrumbs-item>
      </template>
    </v-breadcrumbs>
    <v-row no-gutters class="mb-md-100 mb-16">
      <v-col cols="12" sm="6" md="4" v-for="(item, index) in categoryGroups" :key="index" class="pa-3">
        <nuxt-link :to="$lang.link(`category/${category}/${item.link}`)">
          <v-card class="flex-center flex-column text-center pa-10" height="300">
            <v-img :src="baseUrl + item.icon" contain height="110" width="110"/>
            <div :style="`color: ${vuetifyMainBlue}`" class="size24-weight700">{{ item.title }}</div>
          </v-card>
        </nuxt-link>
      </v-col>
    </v-row>

    <PopularProducts class="mb-md-100 mb-16" />

  </v-container>
</template>

<script>
import MockMixin from "../../mixins/MockMixin";

export default {
  name: "CategoryList",
  mixins: [MockMixin],
  components: {
    PopularProducts: () => import('~~/components/home-page/PopularProducts'),
  },
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
          href: `/${this.category}`,
        },
      ]
    }
  },
  methods: {
    textConvertor(text) {
      const regExp = /\w/ig;
      const newText = text.replace(regExp, ' ');
      return `${newText[0].toUpperCase()}${newText.slice(1)}`;
    }
  }
}
</script>

<style scoped lang="scss">

</style>

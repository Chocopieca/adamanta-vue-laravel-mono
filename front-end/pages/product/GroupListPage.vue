<template>
  <v-container class="pa-0">
    <v-breadcrumbs :items="breadcrumbs" divider="/" class="pa-3">
      <template v-slot:item="{ item }">
        <v-breadcrumbs-item
          nuxt
          exact
          :to="item.href"
        >
          {{ item.text }}
        </v-breadcrumbs-item>
      </template>
    </v-breadcrumbs>
    <div>{{ group }}</div>
  </v-container>
</template>

<script>
export default {
  name: "GroupListPage",
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
          href: `/${this.category}`,
        },
        {
          text: this.textConvertor(this.group),
          href: `/${this.category}/${this.group}`,
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

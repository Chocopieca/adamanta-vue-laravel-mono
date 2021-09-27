<template>
  <v-container class="pa-0">
    <Breadcrumbs :items="breadcrumbs"/>
    <div>{{ group }}</div>
  </v-container>
</template>

<script>
export default {
  name: "GroupListPage",
  components: {
    Breadcrumbs: () => import('~~/components/common/Breadcrumbs'),
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

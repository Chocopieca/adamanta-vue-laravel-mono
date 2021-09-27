<template>
  <v-container class="pa-0">
    <Breadcrumbs :items="breadcrumbs"/>
    <div class="px-3">
      <h1 class="mb-5">Контакты</h1>
      <v-row no-gutters>
        <v-col cols="12" md="2" class="mb-10">
          <span :style="`color: ${vuetifyMainBlue};`">Телефон</span>
          <v-divider class="my-3"/>
          <template v-for="(number, index) in contacts.numbers">
            <div :key="index">{{ number }}</div>
          </template>
        </v-col>
        <v-col cols="12" md="3" class="mb-10">
          <span :style="`color: ${vuetifyMainBlue};`">Адресс</span>
          <v-divider class="my-3"/>
          {{ contacts.address }}
        </v-col>
        <v-col cols="12" md="2" class="mb-10">
          <span :style="`color: ${vuetifyMainBlue};`">График работы</span>
          <v-divider class="my-3"/>
          {{ contacts.working_time }}
        </v-col>
      </v-row>
    </div>
  </v-container>
</template>

<script>
import MockMixin from "../mixins/MockMixin";

export default {
  name: "ContactPage",
  mixins: [MockMixin],
  components: {
    Breadcrumbs: () => import('~~/components/common/Breadcrumbs'),
  },
  data() {
    return {
      breadcrumbs: [
        {
          text: 'Главная',
          href: '/',
        },
        {
          text: 'Контакты',
          href: `/contacts`,
        },
      ]
    }
  },
}
</script>

<style scoped>

</style>

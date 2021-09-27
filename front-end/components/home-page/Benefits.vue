<template>
  <v-row no-gutters class="text-center">
    <v-col cols="12">
      <h2 class="size36-weight700 mb-5">Почему именно мы?</h2>
      <p class="col-md-8 offset-md-2 size16-weight400">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus turpis nec,
        sollicitudin interdum interdum sit vulputate. Tortor nunc urna, tempus integer.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus turpis nec, sollicitudin interdum interdum sit vulputate. Tortor nunc urna, tempus integer. Tortor nunc urna, tempus integer.Tortor nunc urna, tempus integer.
      </p>
    </v-col>
    <v-col v-for="(item, index) in benefits" :key="index" cols="12" sm="4" class="flex-center flex-column pa-10">
      <v-img :src="baseUrl + item.icon" contain width="80" height="80" class="mb-5"/>
      <h3 class="size22-weight700 mb-5">{{ item.title }}</h3>
      <p class="align-center size14-weight400">{{ item.content }}</p>
    </v-col>
  </v-row>
</template>

<script>
import MockMixin from '~~/mixins/MockMixin';

export default {
  name: "Benefits",
  mixins: [MockMixin],
}
</script>

<style scoped lang="scss">

</style>

<template>
  <v-card elevation="5" class="pa-5 size18-weight400">
    <div class="mb-3">
      <h3 class="size18-weight700">Контакты</h3>
      <template v-for="(number, index) in contacts.numbers">
        <div :key="index">{{ number }}</div>
      </template>
    </div>
    <div class="mb-3">
      <h3 class="size18-weight700">Адресс</h3>
      {{ contacts.address }}
    </div>
    <div>
      <h3 class="size18-weight700">График работы</h3>
      {{ contacts.working_time }}
    </div>
  </v-card>
</template>

<script>
import MockMixin from "../../mixins/MockMixin";

export default {
  name: "ContactInfoCard",
  mixins: [MockMixin],
}
</script>

<style scoped>

</style>

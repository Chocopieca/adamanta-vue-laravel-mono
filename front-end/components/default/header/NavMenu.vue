<template>
  <v-container fluid class="white pa-0">
    <v-container>
      <v-row  no-gutters align="center">
        <v-menu offset-y>
          <template #activator="{ on, attrs }">
            <v-btn
              class="size18-weight700 mr-5 mb-5 mb-md-0"
              color="primary"
              dark
              rounded
              v-bind="attrs"
              v-on="on"
            >
              <span class="size18-weight700 flex-center mt-1 mr-5">Каталог товаров</span>
              <v-icon>
                mdi-menu
              </v-icon>
            </v-btn>
          </template>
          <v-list>
            <template v-for="(category, index) in navCategory">
              <nuxt-link :key="index" :to="$lang.link(`category/${category.link}`)">
                <v-list-item
                  v-ripple="{ class: `mainGreenColor` }"
                  class="py-1"
                  @click="isShowItems = false"
                  color="red"
                >
                  <v-img width="56" height="56" :src="baseUrl + category.icon" class="mr-3"/>
                  <v-list-item-title>{{ category.title }}</v-list-item-title>
                </v-list-item>
              </nuxt-link>
            </template>
          </v-list>
        </v-menu>

        <template v-for="(page, index) in pages">
          <v-btn
            :key="index"
            nuxt
            :to="$lang.link(page.link)"
            text
            class="mr-5"
            :color="vuetifyMainGreen"
          >
            <span class="size18-weight700 black--text">{{ page.title }}</span>
          </v-btn>
        </template>
      </v-row>
    </v-container>
  </v-container>
</template>

<script>
import MockMixin from "../../../mixins/MockMixin";

export default {
  name: "NavMenu",
  mixins: [MockMixin],
  data: () => ({
    isShowItems: false
  }),
  methods: {
    toggleNavMenu() {
      this.isShowItems = !this.isShowItems;
    },
  }
}
</script>

<style scoped lang="scss">

</style>

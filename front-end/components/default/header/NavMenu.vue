<template>
  <v-container fluid class="white pa-0">
    <v-container>
      <v-row  no-gutters align="center">
        <v-menu offset-y>
          <template v-slot:activator="{ on, attrs }">
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
              <template v-if="showNavItems(index)">
                <nuxt-link :to="$lang.link(`${category.link}`)" :key="index">
                  <v-list-item v-ripple class="py-1" @click="isShowItems = false">
                    <v-img width="56" height="56" :src="category.icon" class="mr-3"/>
                    <v-list-item-title>{{ category.title }}</v-list-item-title>
                  </v-list-item>
                </nuxt-link>
              </template>
            </template>
            <v-list-item v-if="!isShowItems" v-ripple @click.stop.prevent="toggleNavMenu">
              <v-icon class="pl-4 pr-5">mdi-dots-horizontal</v-icon>
              <v-list-item-title>Еще</v-list-item-title>
            </v-list-item>
            <v-list-item v-else v-ripple @click.stop.prevent="toggleNavMenu">
              <v-icon class="pl-4 pr-5">mdi-dots-horizontal</v-icon>
              <v-list-item-title>Убрать</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>

        <template v-for="(page, index) in pages">
          <nuxt-link :to="$lang.link(page.link)" :key="index">
            <v-btn text class="mr-5">
              <span class="size18-weight700">{{ page.title }}</span>
            </v-btn>
          </nuxt-link>
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
    showNavItems(index) {
      return this.isShowItems || index < 3
    }
  }
}
</script>

<style scoped>

</style>

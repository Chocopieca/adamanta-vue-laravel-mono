<template>
  <div>
    <v-container fluid class="pa-0 pt-3 white--text" :style="`background: ${vuetifyMainBlue}`">
      <v-container class="pa-0 py-10">
        <v-row no-gutters>
          <v-col cols="12" sm="3" class="px-5 mb-10 mb-sm-0">
            <h3 class="size16-weight700 mb-6">Подпишись на нашу рассылку</h3>
            <div class="size14-weight400">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
            <v-text-field dark placeholder="E-mail"/>
            <Button
              content="Подписаться"
              :color-button="vuetifyTransparent"
              :color-text="vuetifyMainWhite"
              font-size="size16-weight700"
              class="w-100"
              outlined
              @submit="$emit('close')"
            />
          </v-col>
          <v-col cols="6" sm="2" class="offset-sm-1 d-flex align-center align-md-start flex-column mb-10 mb-sm-0">
            <h3 class="size16-weight700 px-3 mb-6">Карта сайта</h3>
            <div :class="vuetifyBreakpoint.mdAndUp ? '' : 'flex-center flex-column'">
              <template v-for="(page, index) in pages">
                <div :key="index">
                  <nuxt-link :to="$lang.link(page.link)">
                    <v-btn text class="px-3">
                      <span class="size14-weight400" :style="`color: ${vuetifyMainWhite}`">{{ page.title }}</span>
                    </v-btn>
                  </nuxt-link>
                </div>
              </template>
            </div>
          </v-col>
          <v-col cols="6" sm="2" class="offset-sm-1 d-flex align-center align-md-start flex-column mb-10 mb-sm-0">
            <h3 class="size16-weight700 px-3 mb-6">Каталог</h3>
            <div :class="vuetifyBreakpoint.mdAndUp ? '' : 'flex-center flex-column'">
              <template v-for="(category, index) in navCategory">
                <div v-if="index > 3" :key="index">
                  <nuxt-link :to="$lang.link(`category/${category.link}`)">
                    <v-btn text class="px-3">
                      <span class="size14-weight400" :style="`color: ${vuetifyMainWhite}`">{{ category.title }}</span>
                    </v-btn>
                  </nuxt-link>
                </div>
              </template>
            </div>
          </v-col>
          <v-col
            cols="12"
            sm="2"
            class="size14-weight400 flex-center justify-sm-start align-sm-start flex-column offset-md-1 px-5 px-md-0"
          >
            <h3 class="size16-weight700 mb-6">Контакты и адрес</h3>
            <div
              class="d-flex align-end mb-3"
              :class="vuetifyBreakpoint.xl ? 'size14-weight400' : 'size10-weight400'"
            >
              <v-icon color="white" class="mr-3">mdi-map-marker</v-icon>
              Украина, Харьков
            </div>
            <div
              class="d-flex align-end mb-3"
              :class="vuetifyBreakpoint.xl ? 'size14-weight400' : 'size10-weight400'"
            >
              <v-icon color="white" class="mr-3">mdi-phone</v-icon>
              +380993177752
            </div>
            <div
              class="d-flex align-end mb-3"
              :class="vuetifyBreakpoint.xl ? 'size14-weight400' : 'size10-weight400'"
            >
              <v-icon color="white" class="mr-3">mdi-history</v-icon>
              пн - вс 09:00 - 18:00
            </div>
          </v-col>
        </v-row>
      </v-container>
    </v-container>
    <v-container fluid class="flex-center flex-column py-5 text-center">
      <nuxt-link :to="$lang.link('')">
        <v-img
          class="mb-5"
          :lazy-src="baseUrl + logoLink"
          max-height="150"
          max-width="250"
          :src="baseUrl + logoLink"
          alt="Adamanta"
        />
      </nuxt-link>
      Copyright © 2021. LogoIpsum. All rights reserved.
    </v-container>
  </div>
</template>

<script>
import MockMixin from "../../../mixins/MockMixin";

export default {
  name: "Footer",
  mixins: [MockMixin],
  data() {
    return {
      logoLink: 'image/logo.svg',
    }
  },
}
</script>

<style scoped>

</style>

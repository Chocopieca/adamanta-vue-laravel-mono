<template>
  <v-container fluid class="grey lighten-3 black--text pa-0">
    <v-container>
      <v-row justify="center" align="end">
        <v-col>
          <nuxt-link :to="$lang.link('')">
            <v-img
              :lazy-src="baseUrl + logoLink"
              max-height="150"
              max-width="250"
              :src="baseUrl + logoLink"
              alt="Adamanta"
            ></v-img>
          </nuxt-link>
        </v-col>
        <v-col class="pb-2">
          <h2
            class="light-green--text ma-0"
            :class="vuetifyBreakpoint.xl ? 'size18-weight700' : 'size12-weight700'"
          >Химия - это просто!</h2>
        </v-col>
        <v-col>
          <div
            class="d-flex align-end"
            :class="vuetifyBreakpoint.xl ? 'size14-weight400' : 'size10-weight400'"
          >
            <v-icon color="black" class="mr-2">mdi-map-marker</v-icon>
            Украина, Харьков
          </div>
        </v-col>
        <v-col>
          <div
            class="d-flex align-end"
            :class="vuetifyBreakpoint.xl ? 'size14-weight400' : 'size10-weight400'"
          >
            <v-icon color="black" class="mr-2">mdi-phone</v-icon>
            +380993177752
          </div>
        </v-col>
        <v-col cols="1">
          <language />
        </v-col>
        <v-col cols="2" lg="3">
          <div class="d-flex justify-end header-buttons">
            <Search class="mr-2"/>
            <v-btn
              color="light-green"
              class="mr-2"
              outlined
              fab
              icon
              small
              @click="$emit('openDialog', 'profile')"
            >
              <v-icon color="black">mdi-account-circle</v-icon>
            </v-btn>
            <v-btn
              color="light-green"
              outlined
              fab
              icon
              small
              @click="$emit('openDialog', 'basket')"
            >
              <v-badge
                :color="vuetifyMainBlue"
                :content="countProductInBasket"
                right
                offset-x="6"
                offset-y="6"
                class="mainGreenColor"
              >
                <v-icon color="black">mdi-cart</v-icon>
              </v-badge>
            </v-btn>
          </div>
        </v-col>
      </v-row>
    </v-container>
    <NavMenu class="header-elevation"/>
  </v-container>
</template>

<script>
import MockMixin from "../../../mixins/MockMixin";

export default {
  name: "HeaderDesktop",
  mixins: [MockMixin],
  components: {
    Search: () => import('~~/components/common/Search'),
    Language: () => import('~~/components/common/Language'),
    NavMenu: () => import('~~/components/default/header/NavMenu.vue')
  },
  data() {
    return {
      logoLink: 'image/logo.svg',
    }
  },
  computed: {
    countProductInBasket() {
      let count = 0;
      this.productsInOrder.forEach(item => {
        count += item.count
      })
      return count;
    }
  }
}
</script>

<style scoped lang="scss">
::v-deep.header-buttons {
  display: flex;
  justify-content: end;

  .v-btn {
    border: 3px solid var(--v-main_green-base);
  }
}

.header-elevation {
  box-shadow: 0 30px 24px -25px rgb(0 0 0 / 18%) !important;
}
</style>

<template>
  <v-container fluid class="grey lighten-3 black--text pa-0">
    <v-container>
      <v-row justify="center" align="end">
        <v-col>
          <nuxt-link :to="$lang.link('')">
            <v-img
              lazy-src="image/logo.svg"
              max-height="150"
              max-width="250"
              src="image/logo.svg"
              alt="Adamanta"
            ></v-img>
          </nuxt-link>
        </v-col>
        <v-col class="pb-2">
          <h1 class="light-green--text size18-weight700 ma-0">Химия - это просто!</h1>
        </v-col>
        <v-col>
          <div class="size14-weight400 d-flex align-end">
            <v-icon color="black" class="mr-2">mdi-map-marker</v-icon>
            Украина, Харьков
          </div>
        </v-col>
        <v-col>
          <div class="size14-weight400 d-flex align-end">
            <v-icon color="black" class="mr-2">mdi-phone</v-icon>
            +380993177752
          </div>
        </v-col>
        <v-col cols="1">
          <language />
        </v-col>
        <v-col cols="3">
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
              <v-icon color="black">mdi-cart</v-icon>
            </v-btn>
          </div>
        </v-col>
      </v-row>
    </v-container>
  </v-container>
</template>

<script>
export default {
  name: "HeaderDesktop",
  components: {
    Search: () => import('~~/components/common/Search'),
    Language: () => import('~~/components/common/Language'),
  },
}
</script>

<style scoped lang="scss">
::v-deep.header-buttons {
  display: flex;
  justify-content: end;

  .v-btn {
    border: 2px solid var(--v-main_green-base);
  }
}
</style>

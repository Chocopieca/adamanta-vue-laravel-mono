<template>
  <div class="search">
    <v-text-field
      v-if="isMobile"
      class="black--text search-input"
      background-color="transparent"
      prepend-inner-icon="mdi-magnify"
      solo
      dense
      hide-details
      clearable
      clear-icon="mdi-close"
    />
    <template v-else>
      <v-text-field
        v-if="search"
        class="black--text search-input"
        background-color="transparent"
        prepend-inner-icon="mdi-magnify"
        @click:clear="search = !search"
        solo
        dense
        hide-details
        clearable
        clear-icon="mdi-close"
      />
      <v-btn
        v-else
        outlined
        fab
        color="light-green"
        icon
        small
        @click="search = true"
      >
        <v-icon color="black">mdi-magnify</v-icon>
      </v-btn>
    </template>
  </div>
</template>

<script>
export default {
  name: "Search",
  props: {
    isMobile: {
      type: Boolean,
      default: false,
    }
  },
  data() {
    return {
      search: false,
    }
  },
}
</script>

<style lang="scss" scoped>
::v-deep.search {
  &-input {
    max-width: 100%;
    border: 2px solid var(--v-main_green-base);
    border-radius: 20px 20px;
    height: 40px;
  }

  & + .v-btn {
    border: 2px solid;
  }
}
</style>

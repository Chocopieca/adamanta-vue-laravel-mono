<template>
  <div class="search">
    <v-text-field
      v-if="search"
      v-model="searchText"
      class="black--text search-input"
      background-color="transparent"
      prepend-inner-icon="mdi-magnify"
      solo
      flat
      dense
      hide-details
      clearable
      autofocus
      clear-icon="mdi-close"
      @blur="onClose"
      @click:clear="onClose"
      @keydown.enter="goToSearchPage"
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
  </div>
</template>

<script>
export default {
  name: "SearchDesktop",
  props: {
    isMobile: {
      type: Boolean,
      default: false,
    }
  },
  data() {
    return {
      search: false,
      searchText: '',
    }
  },
  methods: {
    onClose() {
      this.searchText = '';
      this.search = !this.search;
    },
    goToSearchPage() {
      this.search = !this.search;
      this.$router.push({ path: this.$lang.link(`search/?q=${this.searchText}`) });
      this.searchText = '';
    }
  }
}
</script>

<style lang="scss" scoped>
::v-deep.search {
  &-input {
    max-width: 100%;
    border: 2px solid var(--v-main_green-base);
    border-radius: 20px 20px;
    height: 40px;

    & input {
      font-size: 16px !important;
    }
  }

  & + .v-btn {
    border: 2px solid;
  }
}
</style>

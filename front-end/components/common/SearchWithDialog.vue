<template>
  <div class="search">
    <v-btn
      outlined
      fab
      color="light-green"
      icon
      small
      @click="$refs.search.toggle()"
    >
      <v-icon color="black">mdi-magnify</v-icon>
    </v-btn>
    <Dialog ref="search">
      <v-text-field
        class="black--text search-input mb-5"
        background-color="transparent"
        prepend-inner-icon="mdi-magnify"
        solo
        dense
        hide-details
        clearable
        autofocus
        clear-icon="mdi-close"
      />
      <v-btn
        class="w-100 mb-6 white--text"
        color="light-green"
        rounded
        @click="$refs.search.toggle()"
      >
        Поиск
      </v-btn>
    </Dialog>
  </div>
</template>

<script>
export default {
  name: "SearchMobile",
  components: {
    Dialog: () => import('~~/components/common/Dialog'),
  },
  props: {
    isMobile: {
      type: Boolean,
      default: false,
    }
  },
  data() {
    return {
      search: false,
      dialog: false,
    }
  },
  methods: {
    goToSearchPage() {
      this.search = !this.search
      this.$router.push({ name: this.$lang.link('search') })
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
  }

  & + .v-btn {
    border: 2px solid;
  }
}
</style>

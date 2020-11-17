<template>
  <sidebar part="app" type="left">
    <el-col :span="24" class="mb-10 hidden-md-and-up">
      <main-menu menu-class="main-menu" menu-mode="vertical" />
      <hr noshade size="1px" color="lightgrey"/>
    </el-col>

    <h3 class="mt-10 text-center" style="color: #fff; font-size: 16px;">{{ $t('labels.genres') }}</h3>

    <el-menu :default-active="$root.sidebarActive" class="el-menu-main sidebar-genres" mode="vertical" unique-opened>
      <template v-for="(genre, key) in genres">
        <el-submenu v-if="genre.children.length" :index="genre.slug" :key="key">
          <template slot="title">
            <div class="w-100" @click="genreItemHandler(genre.slug)">{{ genre.name }}</div>
          </template>
          <el-menu-item
            v-for="(item, ckey) in genre.children"
            :index="item.slug"
            :key="ckey"
            @click="genreItemHandler(item.slug)"
          >
            {{ item.name }}
          </el-menu-item>
        </el-submenu>

        <el-menu-item v-else :index="genre.slug" :key="key" @click="genreItemHandler(genre.slug)">
          {{ genre.name }}
        </el-menu-item>
      </template>
    </el-menu>

    <!--        <el-row v-if="getDeviceType !== 'smart_phone' && getDeviceType !== 'small_smart_phone'" class="mt-20">-->
    <!--            <div style="max-width: 100%; overflow: hidden;">-->
    <!--                <adsense adSlot="3856942588" />-->
    <!--            </div>-->
    <!--        </el-row>-->
  </sidebar>
</template>

<script>
export default {
  name: "SidebarLeft",
  components: {
    sidebar: () => import('@/components/layout/sidebar'),
    mainMenu: () => import('./MainMenu'),
  },
  methods: {
    genreItemHandler(slug) {
      if(this.$root.overlay) {
        this.sidebarHidden('left', false)
      }

      this.$root.sidebarActive = slug

      this.$router.push({
        path: this.$lang.link('books'),
        query: {genre: slug}
      })
    },
  }
}
</script>

<template>
  <el-footer v-if="domRendered">
    <el-row class="w-100">
      <el-col id="f-first-block">
        <el-col :xl="12" :lg="10" class="hidden-lg-and-up hidden-xs-only mb-20 flex flex-v-center">
          <div class="w-100">
            <social-networks/>
            <main-menu class="mt-10 flex flex-h-center" style="clear: both" menu-class="el-menu-footer" menu-mode="horizontal"/>
          </div>
        </el-col>

        <el-col :xl="6" :lg="7" :sm="11" class="flex flex-v-center fh-100">
          <about/>
        </el-col>

        <el-col :xs="24" class="hidden-sm-and-up flex flex-v-center">
          <div class="w-100">
            <social-networks/>
          </div>
        </el-col>

        <el-col :xl="12" :lg="10" class="hidden-md-and-down flex flex-v-center fh-100">
          <div class="w-100">
            <social-networks/>
            <main-menu class="mt-10 flex flex-h-center" style="clear: both" menu-class="el-menu-footer" menu-mode="horizontal" />
          </div>
        </el-col>

        <el-col :xl="6" :lg="{span: 7, offset: 0}" :sm="{span: 11, offset: 2}" class="flex flex-v-center fh-100">
          <subscribe/>
        </el-col>
      </el-col>
      <el-col id="f-second-block" :xl="{span: 24}" class="text-center">
        © Adamanta 2019 - 2020
      </el-col>
    </el-row>
  </el-footer>
</template>

<script>
export default {
  name: "Footer",
  components: {
    mainMenu: () => import('./MainMenu'),
    About: () => import('./footer/About'),
    SocialNetworks: () => import('./footer/SocialNetworks'),
    Subscribe: () => import('./footer/Subscribe')
  },
  data() {
    return {
      email: ''
    }
  },
}
</script>

<style>
    .social-link a {
        color: #fff !important;
    }
    .social-link a:hover {
        color: #ccc !important;
    }
</style>

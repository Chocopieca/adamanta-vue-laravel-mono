<template>
  <el-header class="def-header def-header-app">

    <client-only>
      <el-col
        :xl="2"
        :md="2"
        :sm="10"
        :xs="10"
        class="flex flex-v-center"
        style="height: 60px"
      >
        <div
          :class="'hidden-md-and-up hamburger hamburger--spring' + ($root.sidebar.left.hidden ? '' : ' is-active')"
          @click.stop="sidebarHidden('left')"
        >
          <span class="hamburger-box">
            <span class="hamburger-inner"/>
          </span>
        </div>

        <nuxt-link
          v-if="getDeviceMode !== 'sm'"
          id="logo"
          :to="$lang.link('/')"
          class="flex flex-v-center"
          style="padding-top: 5px;"
        >
          <img
            width="45px"
            src="/logo.svg"
            alt="Adamanta"
          >
        </nuxt-link>
      </el-col>

      <el-col
        v-if="getDeviceMode === 'sm'"
        :md="{span: 20}"
        :sm="{span: 4}"
        :xs="{span: 4}"
        class="flex flex-h-center">
        <nuxt-link :to="$lang.link('/')">
          <img style="padding-top: 7px;" width="40px" src="/logo.svg">
        </nuxt-link>
      </el-col>

      <el-col :xl="20" :md="20" class="hidden-sm-and-down flex flex-h-center">
        <main-menu menu-class="el-menu-main" menu-mode="horizontal"/>
      </el-col>

      <el-col
        :xl="2"
        :md="2"
        :sm="10"
        :xs="10"
        class="flex flex-v-center"
        style="justify-content: flex-end; height: 60px"
      >
<!--        <search/>-->

        <el-dropdown
          v-if="!user"
          trigger="click"
          class="float-right">
          <div>
            <fa-icon
              size="2x"
              icon="user-circle"
            />
          </div>
          <el-dropdown-menu slot="dropdown">
            <el-dropdown-item @click.native="dialogShow('login-dialog')">
              {{ $t('labels.sign_in') }}
            </el-dropdown-item>
            <el-dropdown-item @click.native="dialogShow('registration-dialog')">
              {{ $t('labels.registration') }}
            </el-dropdown-item>
          </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown
          v-else
          trigger="click"
          class="float-right">
          <div>
            <fa-icon
              size="2x"
              icon="id-card"
            />
          </div>
          <el-dropdown-menu slot="dropdown">
            <el-dropdown-item
              class="mb-10 color-black font-weight-bold"
              disabled
            >
              {{ user.first_name + ' ' + user.last_name }}
            </el-dropdown-item>

            <hr>

            <el-dropdown-item
              v-if="user && user.role.access_admin"
              @click.native="adminLink()">
              Администрирование
            </el-dropdown-item>

            <el-dropdown-item @click.native="$router.push({path: $lang.link('cabinet')})">
              {{ $t('labels.personal_area') }}
            </el-dropdown-item>

            <el-dropdown-item @click.native="logout()">
              {{ $t('labels.sign_out') }}
            </el-dropdown-item>
          </el-dropdown-menu>
        </el-dropdown>

        <language-switch class="ml-10 float-right"/>
      </el-col>
    </client-only>

  </el-header>
</template>

<script>
  export default {
    name: "Header",
    components: {
      mainMenu: () => import('./MainMenu'),
      search: () => import('./Search'),
      languageSwitch: () => import('@/components/localization/Switch'),
    },
    methods: {
      adminLink() {
        window.open(this.$env.backUrl + 'admin', '_blank')
      },
      logout() {
        this.$axios.get(this.$env.apiUrl + 'auth/logout').then(() => {
          this.$auth.setToken()
          this.$store.dispatch('setBatch', {state: 'user', data: null})

          this.$router.push({path: '/'})
        })
      },
    }
  }
</script>

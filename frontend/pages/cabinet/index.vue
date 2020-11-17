<template>
  <div v-if="user">
    <el-row :gutter="24" class="m-0" style="padding: 15px 0 15px 0; background-color: rgb(242, 242, 242);">
      <el-col :xl="{span: 3}" :md="{span: 4}" :sm="{span: 12}" :xs="{span: 24}">
        <div class="text-center" style="margin: 0 auto; width: 150px; height: 150px; border-radius: 50%; background-color: #ccc">
          <div :style="'background: url('+(user.image ? $env.assetUrl + user.image : '/svg/no_author.svg') +') 100% 100% no-repeat;'" class="author-background"/>
        </div>
      </el-col>
      <el-col :xl="{span: 21}" :md="{span: 20}" :sm="{span: 12}" :xs="{span: 24}">
        <div>
          <h3>{{ user.first_name }} {{ user.last_name }}</h3>
        </div>
        <div class="mt-10">
          <span class="font-weight-bold">{{ $t('labels.subscription') }}: </span>{{ $t('labels.' + (user.subscribe ? 'yes' : 'no')) }}
        </div>

        <div class="mt-10">
          <span class="font-weight-bold">{{ $t('labels.reg_date') }}: </span>{{ user.register_date }}
        </div>
      </el-col>
    </el-row>
    <el-row class="mt-20">
      <el-col :xl="{span: 24}" :md="{span: 24}" :sm="{span: 24}" :xs="{span: 24}">
        <el-tabs :value="cabinetActiveTab" type="border-card" @tab-click="handleTab">
          <el-tab-pane :label="$t('labels.profile')" name="profile">
            <profile/>
          </el-tab-pane>
          <el-tab-pane :label="$t('labels.settings')" name="settings">
            <settings/>
          </el-tab-pane>
          <el-tab-pane :label="$t('labels.library')" name="library">
            <library v-if="cabinetActiveTab === 'library'" :books="books" />
          </el-tab-pane>
        </el-tabs>
      </el-col>
    </el-row>
  </div>
</template>

<script>
  import profile from './components/profile'
  import settings from './components/settings'
  import library from './components/library'

  export default {
    middleware: 'authenticated',
    async asyncData (context) {
      return {
        books: (await context.app.$axios.get('cabinet/get-for-library')).data
      }
    },
    components: {
      profile,
      settings,
      library
    },
    data() {
      return {
        activeTab: 'profile',
        books: {
          bookmarks: {},
          notes: {},
          read: {},
          read_later: {}
        },
      }
    },
    mounted() {
      //Set meta data
      this.$store.dispatch('clearHeadData')
      this.$root.$emit('eventMainContainer', {classContainer: false, showBreadcrumbs: false})
    },
    methods: {
      handleTab (e) {
        this.$store.dispatch('setApp', {state: 'cabinetActiveTab', data: e.name})
      }
    }
}
</script>

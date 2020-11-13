<template>
    <loading-view :loading="loading">
        <heading class="mb-3">Access to menu</heading>

        <loading-card :loading="loading">
            <div class="flex">
                <div class="w-4/5 overflow-hidden overflow-x-auto relative">
                    <!-- Resource Table -->
                    <table
                        class="table w-full"
                        data-testid="resource-table"
                    >
                        <thead>
                        <tr>
                            <!-- Field Names -->
                            <th class="">
                                <span>Name</span>
                            </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="tab in data.tabs">
                            <td class="w-4/5" :style="tab.parent_id != 0 ? 'padding-left: 35px;' : ''">
                                <i class="material-icons" style="position: relative; top: 6px;">{{tab.icon}}</i>
                                <span>{{ tab.name }}</span>
                            </td>
                            <td class="w-1/5">
                                <el-radio-group
                                    v-model="tab.permission"
                                    size="mini"
                                    @change="changeAction($event, tab.id)"
                                    style="float: right;"
                                >
                                    <el-radio-button :label="1" >Yes</el-radio-button>
                                    <el-radio-button :label="0" >No</el-radio-button>
                                </el-radio-group>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="w-1/5 px-8">
                    <div class="row">
                        <div class="text-base text-80 font-bold py-3">
                            Role
                        </div>
                    </div>
                    <div class="row">
                        <select
                                id="language_select"
                                class="form-control form-select w-full"
                                v-model="currentRole"
                                @change="changeRole($event)"
                        >
                            <option value="" selected disabled>
                                {{__('Choose an option')}}
                            </option>

                            <option v-for="role in data.roles" :value="role.id" :selected="role.id === currentRole">
                                {{ role.title }}
                            </option>
                        </select>
                    </div>

                    <div class="row py-3"></div>
                </div>
            </div>
        </loading-card>
    </loading-view>
</template>

<script>
    export default {
        data: () => ({
            loading: true,
            data: {},
            currentType: 1,
            currentRole: 1,
            currentUser: 0
        }),
        created() {
            Nova.request()
                .get('/nova-vendor/access-control/tabs/get', {params: {role_id: 1, type_id: 1}})
                .then(response => {
                    this.data = response.data;
                    this.loading = false;
                })
        },
        methods: {
            changeType(e) {
                this.loading = true;
                Nova.request()
                    .get('/nova-vendor/access-control/tabs/get', {
                        params: {type_id: e.target.value}
                    })
                    .then(response => {
                        this.data.tabs = response.data.tabs;
                        this.loading = false;
                    })
            },

            changeRole(e) {
                this.loading = true;
                Nova.request()
                    .get('/nova-vendor/access-control/tabs/get', {
                        params: {type_id: this.currentType, role_id: e.target.value}
                    })
                    .then(response => {
                        this.data.tabs = response.data.tabs;
                        this.loading = false;
                    })
            },
            changeUser(e) {
                this.loading = true;
                Nova.request()
                    .get('/nova-vendor/access-control/tabs/get', {
                        params: {type_id: this.currentType, role_id: this.currentRole, admin_id: e.target.value}
                    })
                    .then(response => {
                        this.data.tabs = response.data.tabs;
                        this.loading = false;
                    })
            },
            changeAction(access, tabId) {
                this.loading = true;
                Nova.request()
                    .post('/nova-vendor/access-control/tabs/modify', {
                        tab_id: tabId,
                        role_id: this.currentRole,
                        admin_id: this.currentUser,
                        access: access
                    })
                    .then(response => {
                        this.loading = false;
                    })
            }
        }
    }
</script>

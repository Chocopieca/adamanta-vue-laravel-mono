<template>
    <loading-view :loading="false">
        <heading class="mb-3">Actions</heading>

        <loading-card :loading="loading">
            <div class="flex">
                <div class="w-4/5 overflow-hidden overflow-x-auto relative">
                    <!-- Resource Table -->
                    <table
                            class="table w-full"
                            cellpadding="0"
                            cellspacing="0"
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
                        <tr v-for="action in data.actions">
                            <td class="w-4/5">
                                <span>{{ action.title }}</span>
                            </td>
                            <td class="w-1/5">
                                <el-radio-group
                                        v-model="action.permission"
                                        size="mini"
                                        @change="changeAction($event, action.id)"
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
                            Tab
                        </div>
                    </div>
                    <div class="row">
                        <select
                            class="form-control form-select w-full"
                            v-model="currentTab"
                            @change="changeTab($event)"
                        >
                            <option value="" selected disabled>
                                {{__('Choose an option')}}
                            </option>

                            <option
                                v-for="tab in data.tabs"
                                :value="tab.id"
                                :selected="tab.id === currentTab"
                            >
                                {{ tab.name }}
                            </option>
                        </select>
                    </div>

                    <div class="row py-3"></div>

                    <div class="row">
                        <div class="text-base text-80 font-bold py-3">
                            Role
                        </div>
                    </div>
                    <div class="row">
                        <select
                                class="form-control form-select w-full"
                                v-model="currentRole"
                                @change="changeRole($event)"
                        >
                            <option value="" selected disabled>
                                {{__('Choose an option')}}
                            </option>

                            <option
                                    v-for="role in data.roles"
                                    :value="role.id"
                                    :selected="role.id === currentRole"
                            >
                                {{ role.title }}
                            </option>
                        </select>
                    </div>

                    <div class="row py-3"></div>

                    <div class="row">
                        <div class="text-base text-80 font-bold py-3">
                            User
                        </div>
                    </div>
                    <div class="row">
                        <select
                                id="language_select"
                                class="form-control form-select w-full"
                                v-model="currentUser"
                                @change="changeUser($event)"
                        >
                            <option value="0" selected>
                                Select user
                            </option>

                            <option
                                    v-for="user in data.users"
                                    :value="user.id"
                                    :selected="user.id === currentUser"
                            >
                                {{ user.first_name }} {{ user.last_name }}
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
            currentTab: 0,
            currentRole: 1,
            currentUser: 0
        }),
        created() {
            Nova.request()
                .get('/nova-vendor/access-control/actions/get', {params: {tab_id: 0}})
                .then(response => {
                    this.data = response.data;
                    this.currentTab = response.data.tabs[0].id;
                    this.loading = false;
                })
        },
        methods: {
            changeTab(e) {
                this.loading = true;
                Nova.request()
                    .get('/nova-vendor/access-control/actions/get', {
                        params: {tab_id: this.currentTab, role_id: e.target.value}
                    })
                    .then(response => {
                        this.data.actions = response.data.actions;
                        this.loading = false;
                    })
            },
            changeRole(e) {
                this.loading = true;
                Nova.request()
                    .get('/nova-vendor/access-control/actions/get', {
                        params: {tab_id: this.currentTab, role_id: e.target.value}
                    })
                    .then(response => {
                        this.data.actions = response.data.actions;
                        this.loading = false;
                    })
            },
            changeUser(e) {
                this.loading = true;
                Nova.request()
                    .get('/nova-vendor/access-control/actions/get', {
                        params: {
                            tab_id: this.currentTab,
                            role_id: this.currentRole,
                            admin_id: e.target.value
                        }
                    })
                    .then(response => {
                        this.data.actions = response.data.actions;
                        this.loading = false;
                    })
            },
            changeAction(access, actionId) {
                this.loading = true;
                Nova.request()
                    .post('/nova-vendor/access-control/actions/modify', {
                        action_id: actionId,
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

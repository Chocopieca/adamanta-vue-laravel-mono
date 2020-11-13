<template>
    <div>
        <template v-for="item in threeData" :keyindex="item.id">
            <SidebarItem v-if="!item.children" :item="item" :threeFirst="threeFirst" />

            <el-submenu v-else :index="item.id">
                <template slot="title">
                    <i class="material-icons">{{item.icon}}</i>
                    <span v-if="!$root.mini" slot="title">{{ item.name }}</span>
                </template>

                <SidebarMenu :threeData="item.children" threeFirst="0" />
            </el-submenu>
        </template>
    </div>
</template>

<script>
    import SidebarMenu from './SidebarMenu';
    import SidebarItem from './SidebarItem';

    export default {
        name: "SidebarMenu",
        props: ['threeData', 'threeFirst'],
        components: {
            SidebarMenu,
            SidebarItem
        }
    }
</script>

<template>
    <router-link :to="'/'+item.path" :key="item.id">
        <el-menu-item :index="item.id" :title="item.name">
            <i class="material-icons">{{item.icon}}</i>
            <span slot="title">
            {{ item.name }}
        </span>
        </el-menu-item>
    </router-link>
</template>

<script>
    export default {
        name: "SidebarItem",
        props: ['item', 'threeFirst']
    }
</script>

<template>
    <div>
        <div class="pin-t pin-l pin-r bg-logo flex items-center h-header text-white text-base">
            <div style="padding-left: 15px">
                <el-button @click="isCollapse = !isCollapse" icon="el-icon-more" circle size="small"></el-button>
            </div>

            <router-link class="px-6" v-show="!isCollapse" to="/">Adamanta</router-link>
        </div>

        <el-menu
            class="el-menu-vertical-demo"
            :show-timeout="500"
            :collapse="isCollapse"
            background-color="transparent"
            :default-active="getActive(config.sidebar)"
        >
            <router-link to="/">
                <el-menu-item
                    :class="(getUrlSegments[0] === 'dashboards' ? 'is-active' : '')"
                    :title="config.translations.Dashboard"
                    style="border-bottom: 1px solid #7e8ea1;"
                >
                    <i class="material-icons">dashboard</i>
                    <span slot="title">{{ config.translations.Dashboard }}</span>
                </el-menu-item>
            </router-link>

            <SidebarMenu :threeData="config.sidebar" threeFirst="1" />
        </el-menu>
    </div>
</template>

<script src="./sidebar.js"></script>

<style>
    #small-link-dashboard i{
        font-weight: 800;
        font-style: inherit;
        padding-left: 5px;
    }
    .el-menu {
        border-right: 0 !important;
    }

    .el-menu .is-active>span, .el-menu .is-active>i {
        color: #ffd04b !important;
    }
    .el-menu-item:focus, .el-menu-item:hover, .el-submenu__title:hover {
        background-color: #7e8ea1 !important;
    }
    .el-menu-item, .el-menu-item i {
        color: #eee !important;
    }
    .el-submenu__title, .el-submenu__title i {
        color: #fff !important;
    }
    .el-menu--collapse .el-menu-item span, .el-menu--collapse .el-submenu .el-submenu__title span {
        height: 0;
        width: 0;
        overflow: hidden;
        visibility: hidden;
        display: inline-block;
    }
    .el-menu--popup {
        background-color: #6a7788 !important;
    }
    .el-menu-item, .el-submenu__title, .el-submenu .el-menu-item {
        height: 35px;
        line-height: 35px;
    }
    .el-submenu__icon-arrow {
        right: 5px;
    }
</style>


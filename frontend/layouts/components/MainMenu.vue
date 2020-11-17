<template>
    <el-menu :default-active="headData.slug" :class="menuClass" :mode="menuMode">
        <el-menu-item v-for="(link, index) in menu" :index="link.value" :key="index" @click="menuItemHandler(link.value)">
            <nuxt-link class="no-link" :to="$lang.link(link.value)">
                {{link.name}}
            </nuxt-link>
        </el-menu-item>
    </el-menu>
</template>

<script>
    export default {
        name: "MainMenu",
        props: ['menuClass', 'menuMode'],
        methods: {
            menuItemHandler(link) {
                if(this.$root.overlay) {
                    this.sidebarHidden('left', false)
                }

                this.$root.sidebarActive = '';

                this.$router.push({path: this.$lang.link(link)})
            },
        }
    }
</script>
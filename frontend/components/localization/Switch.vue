<template>
<!--  && settings['localizationEnabled']-->
    <el-dropdown v-if="currentLang && languages.length" trigger="click">
        <div style="overflow: hidden; border-radius: 50%; width: 27px; height: 27px; border: 1px solid #666;">
            <div :class="'flag flag-' + currentLang" style="position: relative; top: -10px;"></div>
        </div>
        <el-dropdown-menu slot="dropdown">
            <el-dropdown-item v-for="language in languages" v-if="currentLang !== language.code" :key="language.id">
                <div @click="changeLanguage(language.code)">{{language.title}}</div>
            </el-dropdown-item>
        </el-dropdown-menu>
    </el-dropdown>
</template>

<script>
    import api from '../../api/batch';

    export default {
        data () {
            return {
                currentLang: false,
            }
        },
        mounted() {
            this.currentLang = this.$lang.getCurrentCode();
        },
        methods: {
            changeLanguage(language) {
                let path = this.$route.fullPath.replace('/' + this.currentLang, '');
                this.$lang.set(language)

                this.$axios.defaults.headers.common['Language'] = language;
                this.currentLang = language;

                this.$router.push({
                    path: '/' + language + (path !== '/' ? path : '')
                }, () => {
                    api(this, this.$store);
                })
            }
        },
    }
</script>









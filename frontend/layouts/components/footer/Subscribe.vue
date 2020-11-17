<template>
    <div class="w-100">
<!--        <div>Подпишись, что бы не пропустить обновления</div>-->
        <div class="mt-20 relative">
            <form action="#">
                <el-input name="search" :placeholder="$t('labels.search')" v-model="search" @keydown.native="searchKeyDown" />
            </form>
            <el-button type="primary" style="position: absolute; right: 0; top: 0; height: 40px;" @click="handlerSearch()">
                {{$t('labels.find')}}
            </el-button>

<!--            <el-input placeholder="youremail@gmail.com" v-model="email" />-->
<!--            <el-button type="primary" style="position: absolute; right: 0; top: 0">-->
<!--                {{$t('labels.subscribe')}}-->
<!--            </el-button>-->
        </div>
    </div>
</template>

<script>
    export default {
        name: "Subscribe",
        data() {
            return {
                search: '',
            }
        },
        methods: {
            handlerSearch() {
                this.$router.push({
                    path: '/search/' + this.search,
                }, () => {
                })
            },
            searchKeyDown(event) {
                if (event.which === 13) {
                    this.handlerSearch()
                }
            }
        }
    }
</script>
<template>
    <el-dialog :width="width ? width : '50%'" :title="title ? title : ''" :visible.sync="show">
        <slot/>
    </el-dialog>
</template>

<style>
    .el-dialog__body {
        padding-top: 0;
    }
</style>

<script>
    export default {
        name: "CustomModal",
        props: ['emit', 'width', 'title'],
        data() {
            return {
                show: false
            }
        },
        created() {
            this.$root.$on(this.emit + '-dialog', (show) => {
                this.show = show;
            })
        }
    }
</script>
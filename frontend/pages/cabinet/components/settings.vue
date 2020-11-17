<template>
 <el-row>
     <form-handler
        name="settings-form" resource="users/profile"
        modelUpdate="id"
        :afterSave="{message: $t('labels.save_success')}"
        :sendBtn="{
            position: 'left',
            class: 'el-col-xl-3 el-col-md-5 el-col-sm-12 el-col-xs-12',
            label: 'save'
        }"
     >
         <el-row :gutter="24">
         </el-row>
     </form-handler>
 </el-row>
</template>

<script>
    export default {
        name: "profile",
        data() {
            return {
            }
        },
    }
</script>
<template>
    <form-handler
        name="profile-form"
        resource="users/profile"
        modelUpdate="id"
        :afterSave="{message: $t('labels.save_success')}"
        :afterFormSendSuccess="setUser"
        :sendBtn="{
            position: 'left',
            class: 'el-col-xl-3 el-col-md-5 el-col-sm-12 el-col-xs-12',
            label: 'save'
        }"
    >
        <el-row :gutter="24">
            <el-col :xl="{span: 8}" :md="{span: 24}" :sm="{span: 24}" :xs="{span: 24}">
                <form-row name="first_name">
                    <el-input size="small" v-model="entity.first_name" :placeholder="$t('labels.first_name')"></el-input>
                </form-row>
                <form-row name="last_name">
                    <el-input size="small" v-model="entity.last_name" :placeholder="$t('labels.last_name')"></el-input>
                </form-row>
                <form-row name="email">
                    <el-input size="small" v-model="entity.email" placeholder="Email"></el-input>
                </form-row>
            </el-col>

            <el-col :xl="{span: 8}" :md="{span: 24}" :sm="{span: 24}" :xs="{span: 24}">
                <form-row name="like_genres">
                    <el-input size="small" v-model="entity.like_genres" :placeholder="$t('labels.like_genres')"></el-input>
                </form-row>
                <form-row name="like_authors">
                    <el-input size="small" v-model="entity.like_authors" :placeholder="$t('labels.like_authors')"></el-input>
                </form-row>
            </el-col>

            <el-col :xl="{span: 8}" :md="{span: 24}" :sm="{span: 24}" :xs="{span: 24}">
                <form-row name="about_self" :required="false">
                    <el-input v-model="entity.about_self" type="textarea" :rows="7" :placeholder="$t('labels.about_self')"></el-input>
                </form-row>
            </el-col>
        </el-row>
    </form-handler>
</template>

<script>
    import api from '../../../api/batch';

    export default {
        name: "profile",
        data() {
            return {
                entity: {
                    id: '',
                    first_name: '',
                    last_name: '',
                    email: '',
                    about_self: '',
                    like_genres: '',
                    like_authors: ''
                }
            }
        },
        methods: {
            setUser() {
                api(this, this.$store);
            }
        }
    }
</script>
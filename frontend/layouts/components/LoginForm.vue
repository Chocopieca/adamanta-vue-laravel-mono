<template>
    <form-handler
        ref="loginForm"
        class="mt-20"
        name="login-form"
        resource="auth/login"
        :modelUpdate="false"
        :afterFormSendSuccess="setToken"
        :sendBtn="{
            position: 'left',
            class: 'el-col-xl-12 el-col-md-12 el-col-sm-24 el-col-xs-12',
            label: 'sign_in'
        }"
    >
        <form-row name="email" :required="false">
            <el-input v-model="entity.email" placeholder="Email" autocomplete="off"  @keydown.native="sendKeyDown"/>
        </form-row>
        <form-row name="password" :required="false">
            <el-input v-model="entity.password" :type="eye ? 'text' : 'password'" :placeholder="$t('labels.password')" autocomplete="off" @keydown.native="sendKeyDown">
                <fa-icon slot="suffix" class="el-input__icon pointer" :icon="eye ? 'eye' : 'eye-slash'" @click="eye = !eye"/>
            </el-input>
        </form-row>

        <div>
            <el-button class="pt-0 w-100" type="text" @click="dialogShow('reset-pass-dialog', 'login-dialog')">
                {{$t('labels.forgot_password')}}
            </el-button>
        </div>

        <template slot="adButtons">
            <el-col :xl="{span: 12}" :sm="{span: 12}" :xs="{span: 12}">
                <el-button class="w-100" type="primary" @click="dialogShow('registration-dialog', 'login-dialog')">
                    {{$t('labels.registration')}}
                </el-button>
            </el-col>
        </template>

<!--        <el-row :gutter="20" class="mt-20">-->
<!--            <el-col :xl="{span: 24}">-->
<!--                <div class="float-left">{{$t('labels.sign_in_with')}}:</div>-->
<!--                <div>-->
<!--                </div>-->
<!--            </el-col>-->
<!--        </el-row>-->
    </form-handler>
</template>

<script>
    import api from '../../api/batch';

    export default {
        name: "LoginForm",
        data() {
            return {
                eye: false,
                entity: {
                    email: '',
                    password: '',
                    grant_type: 'password_override',
                    client_id: 2,
                    client_secret: 'Upms3wgpAb4MpmMiognIe4TW4YE9X4ANSBOAL0BG',
                    scope: ''
                }
            }
        },
        methods: {
            setToken(data) {
                this.$auth.setToken(data.access_token)

                this.$axios.defaults.headers.common['Authorization'] = ('Bearer ' + data.access_token || '')
                api(this, this.$store, () => {
                    this.dialogHide('login-dialog');

                    this.notify(this.$t('labels.note_login') + this.user.first_name + '!');
                });
            },
            sendKeyDown(event) {
                if (event.which === 13) {
                    this.$refs['loginForm'].sendForm()
                }
            },
        }
    }
</script>
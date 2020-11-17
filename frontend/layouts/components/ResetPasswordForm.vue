<template>
    <form-handler
        class="mt-20"
        name="reset-password-form"
        :modelUpdate="false"
        resource="auth/reset-password"
        :afterFormSendSuccess="() => {this.success = true}"
    >
        <template v-if="!success">
            <div class="mb-10" style="font-size: 13px;">{{$t('labels.we_send_link_new_password')}}</div>

            <form-row name="email">
                <el-input v-model="entity.email" placeholder="Email" autocomplete="off"></el-input>
            </form-row>

            <el-row :gutter="20">
                <el-col :xl="{span: 24}" :sm="{span: 24}">
                    <el-button class="w-100" type="primary" @click="formHandlerSend('reset-password-form')">
                        {{$t('labels.send_request')}}
                    </el-button>
                </el-col>
            </el-row>

            <template slot="after">
                <div>
                    <el-button class="w-100" type="text" @click="dialogShow('login-dialog', 'reset-pass-dialog')">
                        {{$t('labels.sign_in')}}
                    </el-button>
                </div>
            </template>
        </template>
        <template v-else>
            <h4>{{ $t('auth.recovery_success') }}</h4>
            <div style="margin: 20px 0 0 0;">
                <p>{{ $t('auth.check_email') }}</p>
            </div>
        </template>
    </form-handler>
</template>

<script>
    export default {
        name: "ResetPasswordForm",
        data() {
            return {
                success: false,
                entity: {
                    email: '',
                }
            }
        }
    }
</script>
<template>
    <form-handler
        class="mt-20"
        :modelUpdate="false"
        name="registration-form"
        resource="auth/register"
        :afterFormSendSuccess="() => {this.success = true}"
    >
        <template v-if="!success">
            <form-row name="first_name">
                <el-input v-model="entity.first_name" :placeholder="$t('labels.first_name')" autocomplete="off"></el-input>
            </form-row>
            <form-row name="last_name">
                <el-input v-model="entity.last_name" :placeholder="$t('labels.last_name')" autocomplete="off"></el-input>
            </form-row>
            <form-row name="email">
                <el-input v-model="entity.email" placeholder="Email" autocomplete="off"></el-input>
            </form-row>
            <form-row name="password">
                <el-input v-model="entity.password" :type="eye ? 'text' : 'password'" :placeholder="$t('labels.password')" autocomplete="off">
                    <fa-icon slot="suffix" class="el-input__icon pointer" :icon="eye ? 'eye' : 'eye-slash'" @click="eye = !eye"/>
                </el-input>
            </form-row>

            <el-row :gutter="20">
                <el-col :xl="{span: 24}">
                    <el-button class="w-100" type="primary" @click="formHandlerSend('registration-form')">
                        {{$t('labels.sign_up')}}
                    </el-button>
                </el-col>
            </el-row>

            <template slot="after">
                <div class="text-center">
                    {{$t('labels.already_have_account')}}
                    <el-button type="text" @click="dialogShow('login-dialog', 'registration-dialog')">
                        {{$t('labels.sign_in')}}
                    </el-button>
                </div>
            </template>
        </template>
        <template v-else>
            <h4>{{ $t('labels.thanks_of_reg') }}</h4>
            <div style="margin: 20px 0 0 0;">
                <p>{{ $t('labels.registration_success') }}</p>
                <p>{{ $t('labels.approve_you_email') }}</p>
            </div>
        </template>
    </form-handler>
</template>

<script>
    export default {
        name: "RegistrationForm",
        data() {
            return {
                success: false,
                eye: false,
                entity: {
                    first_name: '',
                    last_name: '',
                    email: '',
                    password: ''
                }
            }
        }
    }
</script>
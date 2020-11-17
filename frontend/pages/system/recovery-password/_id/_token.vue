<template>
  <div class="mt-20 text-center">
    <h3>{{ $t('auth.change_password') }}</h3>

    <div class="mt-20" style="color: red;">{{ errors.other }}</div>

    <div class="recovery_form" v-if="showPassForm" style="width: 340px; margin: 0 auto;">
      <form-row name="other"/>

      <form-handler
        name="reset-password-form"
        :modelUpdate="false"
        method="put"
        :resource="'system/recovery-password/update/' + $route.params.id"
        :afterFormSendSuccess="success"
      >
        <form-row name="password">
          <el-input v-model="entity.password" :type="eye ? 'text' : 'password'" :placeholder="$t('labels.password')" autocomplete="off">
            <fa-icon slot="suffix" class="el-input__icon pointer" :icon="eye ? 'eye' : 'eye-slash'" @click="eye = !eye"/>
          </el-input>
        </form-row>
      </form-handler>

      <el-row :gutter="20">
        <el-col :xl="{span: 24}" :sm="{span: 24}">
          <el-button class="w-100" type="primary" @click="formHandlerSend('reset-password-form')">
            {{$t('auth.new_pass_submit')}}
          </el-button>
        </el-col>
      </el-row>
    </div>
    <div v-else>
      <p class="mt-20">
        <span class="text-message">{{ succsessPass }}</span>
      </p>
      <div class="mt-20">
        <nuxt-link to="/">
          <el-button type="primary">{{ $t('labels.on_main') }}</el-button>
        </nuxt-link>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        entity: {
          password: ''
        },
        eye: false,
        confMsg: '',
        showPassForm: false,
        succsessPass: '',
        errors: {}
      }
    },
    created() {
      this.$axios.get(this.$env.apiUrl + 'system/recovery-password/check', {params:  this.$route.params})
        .then(response => {
          this.showPassForm = true
        })
        .catch(error => {
          this.errors = error.response.data.errors
        });
    },
    methods: {
      success(data) {
        this.succsessPass = data;
        this.showPassForm = true
      }
    }
}
</script>

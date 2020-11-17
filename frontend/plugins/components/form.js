import Vue from 'vue'

Vue.component('form-handler', () => import('../../components/form/Handler'));
Vue.component('form-row', () => import('../../components/form/Row'))

Vue.mixin({
    methods: {
        formHandlerSend(name) {
            this.$root.$emit('formHandler' + name + 'Send')
        },
    }
})
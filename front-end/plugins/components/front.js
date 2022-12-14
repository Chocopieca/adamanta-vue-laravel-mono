import Vue from 'vue'

Vue.component('no-image', () => import('../../components/NoImage'))
Vue.component('loading', () => import('../../components/Loading'))
Vue.component('Button', () => import('../../components/common/Button'))
Vue.component('TextField', () => import('../../components/common/TextField'))
Vue.component('Selector', () => import('../../components/common/Selector'))
Vue.component('Snackbar', () => import('../../components/common/Snackbar'))

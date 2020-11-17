import Vue from 'vue'

Vue.component('modal', () => import('../../components/Modal.vue'));

Vue.mixin({
   methods: {
       dialogShow(showName, hideName = false) {
           if(hideName) {
               this.$root.$emit(hideName, false)
               this.$root.$emit(showName, true)
           } else {
               this.$root.$emit(showName, true)
           }
       },
       dialogHide(name) {
           this.$root.$emit(name, false)
       }
   }
})
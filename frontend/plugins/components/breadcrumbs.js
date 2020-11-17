import Vue from 'vue'

Vue.component('breadcrumbs', () => import('../../components/Breadcrumbs'));

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
import {Tab, Tabs} from 'vue-tabs-component'

Nova.booting((Vue, router) => {
    Vue.component('index-form-translations', require('./components/IndexField'));
    Vue.component('detail-form-translations', require('./components/DetailField'));
    Vue.component('form-form-translations', require('./components/FormField'));

    Vue.component('tabs', Tabs);
    Vue.component('tab', Tab);
});

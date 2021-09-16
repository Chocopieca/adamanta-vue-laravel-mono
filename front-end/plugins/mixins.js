import Vue from 'vue'
import { mapGetters } from 'vuex'

Vue.mixin({
    data () {
        return {
            device_type: false,
            device_mode: false,
        }
    },
    computed: {
        ...mapGetters([
            'domRendered',
            'cabinetActiveTab',
            'cabinetActiveLibraryTab',
            'headData',
            'crumbs',
            'user',
            'trans',
            'languages',
            'genres',
            'menu',
            'settings'
        ]),
        getDeviceType() {
            return this.$root.device_type
        },
        getDeviceMode() {
            return this.$root.device_mode
        }
    },
    methods: {
        $t(label, defLabel = '') {
            if(this.trans !== undefined && label !== undefined) {
                const labels = label.split('.')
                let translation = this.trans

                labels.forEach((val) => {
                    translation = translation[val] ? translation[val] : false
                })

                return translation === false ? defLabel : translation
            }

            return defLabel !== '' ? defLabel : label
        },
        notify(msg, opt = {}) {
            const def = {
                title: '',
                dangerouslyUseHTMLString: true,
                message: '<strong>'+msg+'</strong>',
                position: 'top-right',
                type: 'success',
                duration: 4000
            }

            this.$notify(Object.assign({}, def, opt))
        },
        getCurrentLang() {
            // this.languages.find(lang => lang.code === this.$lang.getCurrentCode())
            const lang = false
            return lang ?? {
                title: 'Русский',
                code: 'ru',
                iso_code: 'ru_RU'
            }
        },
        getCountSlides() {
            const spans = {
                large_displays: 6,
                desktop: 6,
                tablet_portrait: 3,
                small_tablet: 2,
                smart_phone: 2
            }

            return spans[this.getDeviceType] ? spans[this.getDeviceType] : 1
        },
        addParamsToLocation(params) {
            params = Object.assign(this.$route.query, params)
            for(const k in params) {
                if (!params[k]) delete params[k]
            }
            params = Object.keys(params)
              .map(key => {
                  return (encodeURIComponent(key) + '=' + encodeURIComponent(params[key]))
              })
              .join('&')

            history.pushState({}, null, this.$route.path + (params.length ? '?' + params : ''))
        },
    }
})

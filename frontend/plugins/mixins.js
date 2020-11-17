import Vue from 'vue'
import { mapGetters } from 'vuex'

Vue.mixin({
    data () {
        return {
            overlay: false,
            sidebar: {
                left: {
                    mini: false,
                    hidden: true,
                },
                right: {
                    mini: false,
                    hidden: true,
                    full_hidden: true
                }
            },
            device_type: false,
            device_mode: false,
            sidebarActive: '',
            defContainerStyle: ''
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
        getFullClass() {
            let fullClass = 'layout-full'

            if(this.$root.sidebar.left.mini) {
                fullClass += ' left-sidebar-mini'
            }

            if(this.$root.sidebar.left.hidden) {
                fullClass += ' left-sidebar-hidden'
            }

            if(this.$root.sidebar.right.hidden) {
                fullClass += ' right-sidebar-hidden'
            }

            if(this.$root.sidebar.right.full_hidden) {
                fullClass += ' right-sidebar-full-hidden'
            }

            return fullClass
        },
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
                let labels = label.split('.')
                let translation = this.trans

                labels.forEach((val) => {
                    translation = translation[val] ? translation[val] : false
                })

                return translation === false ? defLabel : translation
            }

            return defLabel !== '' ? defLabel : label
        },
        sidebarHidden(type, overlay = undefined) {
            this.$root.sidebar[type].hidden = !this.$root.sidebar[type].hidden
            this.$root.sidebar[type === 'left' ? 'right' : 'left'].hidden = true
            this.$root.overlay = overlay !== undefined ? overlay : !this.$root.sidebar[type].hidden
        },
        notAuthShowLogin(callback) {
            if(!this.user) {
                this.dialogShow('login-dialog')
            } else {
                callback()
            }
        },
        notify(msg, opt = {}) {
            let def = {
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
            let lang = false //this.languages.find(lang => lang.code === this.$lang.getCurrentCode())
            return lang ? lang : {
                title: 'Русский',
                code: 'ru',
                iso_code: 'ru_RU'
            }
        },


        getCountSlides() {
            let spans = {
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
            for(let k in params) {
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

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
        },
        vuetifyBreakpoint() {
          return this.$vuetify.breakpoint
        },
        vuetifyMainGreen() {
          return this.$vuetify.theme.themes.light.main_green;
        },
        vuetifyMainBlue() {
          return this.$vuetify.theme.themes.light.main_blue;
        },
        vuetifyMainBlack_blue() {
          return this.$vuetify.theme.themes.light.main_black_blue;
        },
        vuetifyMainWhite() {
          return this.$vuetify.theme.themes.light.main_white;
        },
        vuetifyMainGray() {
          return this.$vuetify.theme.themes.light.main_gray;
        },
        vuetifyWarning() {
          return this.$vuetify.theme.themes.light.warning;
        },
        vuetifyError() {
          return this.$vuetify.theme.themes.light.error;
        },
        vuetifyMainBlack() {
          return this.$vuetify.theme.themes.light.main_black;
        },
        vuetifyTransparent() {
          return '#00000000';
        },
        baseUrl() {
          return this.$env.appBase;
        },
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
        dateConvertor(timestamp = new Date) {
          let month = String(timestamp.getMonth() + 1);
          let day = String(timestamp.getDate());
          const year = String(timestamp.getFullYear());

          if (month.length < 2) month = '0' + month;
          if (day.length < 2) day = '0' + day;

          return `${day}.${month}.${year}`;
        },
    }
})

export default ({ app, env, store }, inject) => {
    inject('lang', {
        set: (lang) => {
            app.$cookies.set('language', lang, {
                path: '/',
                maxAge: 60 * 60 * 24 * 7
            })
        },
        getCurrentCode: () => {
            return (app.$cookies.get('language') || 'ru')
        },
        link: (str, absolute = false) => {
            let settings = store.getters['settings']
            let prefix = ''

            if(settings['localizationEnabled']) {
                prefix = (app.$cookies.get('language') || 'ru') + '/'
            }

            return (absolute ? env.baseUrl : '/') + prefix + str
        }
    })

    inject('auth', {
        setToken: (token = false) => {
            app.$cookies.set('token', token, {
                path: '/',
                maxAge: 60 * 60 * 24 * 7
            })
        },
        getToken: () => {
            return (app.$cookies.get('token') || false)
        },
    })
}

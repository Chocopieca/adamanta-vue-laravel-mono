export default {
    state: {
        locale: 'ru'
    },
    mutations: {
        SET_LANG(state, locale) {
            state.locale = locale
        }
    },
    actions: {
        setLang(context, locale) {
            context.commit('SET_LANG', locale);
        }
    }
}

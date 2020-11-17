export default {
    state: {
        domRendered: false,
        cabinetActiveTab: 'profile',
        cabinetActiveLibraryTab: 'bookmarks'
    },
    getters: {
        domRendered: state => state.domRendered,
        cabinetActiveTab: state => state.cabinetActiveTab,
        cabinetActiveLibraryTab: state => state.cabinetActiveLibraryTab,
    },
    mutations: {
        SET_APP (state, app) {
            state[app.state] = app.data
        }
    },
    actions: {
        setApp(context, app) {
            context.commit('SET_APP', app)
        }
    }
}

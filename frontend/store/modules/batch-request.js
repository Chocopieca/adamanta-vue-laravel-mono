export default {
    state: {
        user: {},
        settings: {},
        trans: {},
        languages: {},
        genres: {},
        menu: {},
    },
    getters: {
        user: state => state.user,
        settings: state => state.settings,
        trans: state => state.trans,
        languages: state => state.languages,
        genres: state => state.genres,
        menu: state => state.menu,
    },
    mutations: {
        SET_BATCH (state, batch) {
            state[batch.state] = batch.data;
        },
        SET_SINGLE_BATCH (state, batch) {
            state[batch.state][batch.key] = batch.value;
        }
    },
    actions: {
        setBatch(context, batch) {
            context.commit('SET_BATCH', batch);
        },
        setSingleBatch(context, batch) {
            context.commit('SET_SINGLE_BATCH', batch);
        }
    }
}

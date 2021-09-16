export default {
    state: {
        crumbs: [],
    },
    getters: {
        crumbs: state => state.crumbs,
    },
    mutations: {
        SET_CRUMBS_DATA (state, data) {
            state.crumbs = data;
        },
        REPLACE_CRUMBS_DATA (state, data) {
            let index = state.crumbs.findIndex((crumb) => data.id === crumb.id);

            if(index >= 0) {
                state.crumbs.splice(index, 1, data);
            } else {
                state.crumbs.push(data);
            }
        },
        CLEAR_CRUMBS_DATA (state) {
            state.crumbs = [];
        },
    },
    actions: {
        setCrumbsData(context, data) {
            context.commit('SET_CRUMBS_DATA', data);
        },
        replaceCrumbsData(context, data) {
            context.commit('REPLACE_CRUMBS_DATA', data);
        },
        clearCrumbsData(context) {
            context.commit('CLEAR_CRUMBS_DATA');
        },
    }
}

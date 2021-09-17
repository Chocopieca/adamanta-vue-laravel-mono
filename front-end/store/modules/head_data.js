let defData = {
    title: '',
    meta_title: '',
    meta_description: '',
    meta_keywords: '',
    slug: '',
    image: '',
    no_index: false
};

export default {
    state: {
        headData: defData,
    },
    getters: {
        headData: state => state.headData,
    },
    mutations: {
        SET_HEAD_DATA (state, data) {
            state.headData = data;
        },
        CLEAR_HEAD_DATA (state) {
            state.headData = defData;
        },
    },
    actions: {
        setHeadData(context, data) {
            let setData = defData;

            for (let param in setData) {
                setData[param] = data[param]
            }

            context.commit('SET_HEAD_DATA', setData);
        },

        clearHeadData(context) {
            context.commit('CLEAR_HEAD_DATA');
        },
    }
}

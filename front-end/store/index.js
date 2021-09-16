import Vuex from 'vuex';

import app from './modules/app';
import batchRequest from './modules/batch-request';
import headData from './modules/head_data';
import breadcrumbs from './modules/breadcrumbs';

const createStore = () => {
    return new Vuex.Store({
        namespaced: true,
        modules: {
            app,
            batchRequest,
            headData,
            breadcrumbs
        }
    });
};

export default createStore

'use strict';

export default (that, store, callback = false) => {
    that.$axios.get('batch/get')
        .then((ctx) => {
            let data = ctx.data;

            for (let key in data) {
                store.dispatch('setBatch', {state: key, data: data[key]});
            }

            if(callback !== false) {
                callback()
            }
        });
}
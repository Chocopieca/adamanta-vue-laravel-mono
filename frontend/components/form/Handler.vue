<template>
    <div :ref="'form_' + name">
        <slot></slot>

        <el-row v-if="sendBtn" :gutter="20" type="flex" :justify="sendBtn.position ? sendBtn.position : 'center'">
            <el-col :class="'el-col el-col-24 ' + (sendBtn.class ? sendBtn.class : 'el-col-xl-24')">
                <el-button class="w-100" type="primary" @click="sendForm()" :disabled="sendButtonDisabled">
                    {{$t('labels.' + sendBtn.label)}}
                </el-button>
            </el-col>

            <slot name="adButtons"></slot>
        </el-row>

        <slot name="after"></slot>
    </div>
</template>

<script>
    import env from '../../.env';

    export default {
        name: "FormHandler",
        props: [
            'name',
            'sendBtn',
            'method',
            'resource',
            'model',
            'modelUpdate',
            'redirectTo',
            'separateErrors',
            'apiParam',
            'callAfterFormSendOnError',
            'afterFormSendSuccess',
            'entity',
            'withoutFormData',
            'clearErrorsTimeout',
            'afterSave'
        ],
        data() {
            return {
                defaultEntity: false,
                errors: {},
                sendButtonDisabled: false,
            }
        },
        created() {
            this.$root.$on('formHandler' + this.name + 'Send', () => {
                this.sendForm();
            })
        },
        mounted() {
            // Set default values from parent component
            if(this.defaultEntity === false) {
                this.defaultEntity = JSON.stringify(this.getEntity());
            }

            // Load current model if example current update form
            if (this.checkOnUpdate()) {
                this.$axios.get(
                    (this.model ? this.model : this.resource) + '/' + this.getRouteParam(),
                ).then((ctx) => {
                    let data = ctx.data;

                    // Set entities for current form
                    if (this.defaultEntity !== undefined) {
                        let parent = this.$parent.entity;

                        if (data && parent) {
                            for (let prop in parent) {
                                if(data[prop] === undefined) {
                                    this.$set(this.$parent.entity, prop, '');
                                } else if (data[prop] !== '' && data[prop] !== null) {
                                    this.$set(this.$parent.entity, prop, data[prop]);
                                }
                            }
                        } else {
                            this.$set(this.$parent, 'entity', JSON.parse(this.defaultEntity));
                        }
                    }

                    this.$emit('handlerFormLoaded', data);
                })
            } else {
                this.$emit('handlerFormLoaded', {});
            }
        },
        methods: {
            getApiParam() {
                return this.apiParam ? this.apiParam : 'id';
            },
            sendForm() {
                this.sendButtonDisabled = true;

                let headers = {};
                let formData = this.getEntity();
                if (!this.withoutFormData === true) {
                    headers = {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    };
                    formData = new FormData();
                    this.appendData(formData, this.getEntity());
                }

                return this.forRequest(formData, '', headers);
            },
            forRequest(data, param = '', headers) {
                this.$axios[(this.method ? this.method : 'post')](env.apiUrl + this.resource + param, data, headers)
                    .then((ctx) => {
                        this.clearErrorsWithTimeout();

                        if (typeof this.afterFormSendSuccess === 'function') {
                            this.afterFormSendSuccess(ctx.data);
                        }

                        if(this.afterSave) {
                            this.notify(this.afterSave.message, {
                                duration: this.afterSave.duration || 4000
                            });

                            if(this.afterSave.clearForm) {
                                this.$set(this.$parent, 'entity', JSON.parse(this.defaultEntity));
                            }
                        }

                        if (this.redirectTo) {
                            this.$router.push({name: this.redirectTo});
                        }
                    })
                    .catch((error) => {
                        if (error.response.data.errors) {
                            this.errors = error.response.data.errors;

                            for (let key in this.errors) {
                                this.$root.$emit('setRowErrors' + key, this.errors[key]);
                            }
                        }

                        if (this.callAfterFormSendOnError && typeof this.afterFormSendSuccess === 'function') {
                            this.afterFormSendSuccess();
                        }

                        this.clearErrorsWithTimeout();
                    });
            },
            appendData(form, data, wrapper = '') {
                for (let x in data) {
                    let wrap = (wrapper === '' ? x : wrapper + '[' + x + ']');

                    if (typeof data[x] == 'object' && data[x] !== null) {
                        // Search file object
                        if (data[x].type !== undefined && data[x].type.indexOf('image') !== -1) {
                            form.set(wrap, (data[x].file ? data[x].file : data[x]));
                        } else {
                            this.appendData(form, data[x], wrap);
                        }
                    } else {
                        form.set(wrap, data[x] === null ? '' : data[x]);
                    }
                }
            },
            clearErrorsWithTimeout() {
                setTimeout(() => {
                    for (let key in this.errors) {
                        this.$root.$emit('clearRowErrors' + key);
                    }

                    this.errors = [];

                    this.sendButtonDisabled = false;
                }, this.clearErrorsTimeout || 4000)
            },
            getEntity() {
                return this.entity ? this.entity : this.$parent.entity
            },
            checkOnUpdate() {
                if(this.modelUpdate !== false) {
                    return this.$route.params[this.getApiParam()] !== undefined || this.modelUpdate;
                }

                return false;
            },
            getRouteParam() {
                let param = this.$route.params[this.getApiParam()];
                return param ? param : '';
            }
        }
    }
</script>
<template>
    <custom-modal emit="meta-tags" width="600px" title="Настройка мета тегов">
        <slot/>

        <el-tabs v-if="init" v-model="activeTab">
            <template v-for="(lang, key) in languages">
                <el-tab-pane :label="lang.name" :name="lang.code" :key="key">
                    <el-row v-show="show">
                        <el-col class="mb-4">
                            <div class="mb-1 font-bold">Заголовок</div>
                            <el-input v-model="entity[lang.code].meta_title" maxlength="100" show-word-limit @input="changeInput()" />
                        </el-col>
                        <el-col class="mb-4">
                            <div class="mb-1 font-bold">Ключевые слова</div>
                            <el-input v-model="entity[lang.code].meta_keywords" maxlength="240" show-word-limit @input="changeInput()" />
                        </el-col>
                        <el-col class="mb-4">
                            <div class="mb-1 font-bold">Описание</div>
                            <el-input v-model="entity[lang.code].meta_description" type="textarea" :rows="4" maxlength="300" show-word-limit @input="changeInput()" />
                        </el-col>
                    </el-row>
                </el-tab-pane>
            </template>
        </el-tabs>

        <el-row>
            <el-col>
                <el-button type="success" @click="save()">Сохранить</el-button>
            </el-col>
        </el-row>
    </custom-modal>
</template>

<script>
    export default {
        name: "MetaTagsModal",
        props: ['keyPrefix'],
        data() {
            return {
                init: false,
                show: true,
                languages: Nova.config.languages,
                activeTab: 'ru',
                entity: {}
            }
        },
        methods: {
            changeInput() {
                // Re-render form for select language
                this.show = false;
                this.$nextTick(() => {
                    this.show = true;
                })
            },
            save() {
                Nova.request().post('/api/settings/save-by-key', {
                    group: 'admin',
                    key: this.keyPrefix + 'MetaTagsTemplate',
                    show_on_settings_page: 0,
                    data: this.entity
                }).then(response => {
                    this.dialogHide('meta-tags')
                    this.$toasted.show("Сохранено успешно", {type: "success"});
                })
            }
        },
        created() {
            Nova.request().get('/api/settings/by-key', {params: {key: this.keyPrefix + 'MetaTagsTemplate'}})
                .then(response => {
                    let data = response.data;

                    if(Object.keys(data.data).length) {
                        this.entity = data.data;
                    } else {
                        for (let lang in this.languages) {
                            this.entity[this.languages[lang]['code']] = {
                                meta_title: '',
                                meta_keywords: '',
                                meta_description: ''
                            }
                        }
                    }

                    this.init = true;
                })
        }
    }
</script>
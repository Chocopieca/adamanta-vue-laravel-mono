<template>
    <div>
        <h3 class="py-6 px-8">{{ field.title }}</h3>
        <div class="flex">
            <div class="flex">
                <div class="w-1/5 py-6 px-8">
                    <label class="inline-block text-80 pt-2 leading-tight">
                        Язык
                    </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                    <select
                        id="language_select"
                        v-model="language"
                        class="w-2/6 form-control form-select"
                        :class="errorClasses"
                        @change="changeSelect($event)"
                    >
                        <option value="" selected disabled>
                            {{__('Choose an option')}}
                        </option>

                        <option
                            v-for="option in languages"
                            :value="option.id"
                            :selected="option.id == language"
                        >
                            {{ option.title }}
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <div v-for="trans in fields" v-if="show">
            <component
                @file-deleted="updateLastRetrievedAtTimestamp"
                :is="'form-' + trans.component"
                :errors="validationErrors"
                :resource-id="resourceId"
                :resource-name="resourceName"
                :field="trans"
            />
        </div>
    </div>
</template>

<script>
    import { FormField, HandlesValidationErrors } from 'laravel-nova'

    export default {
        mixins: [FormField, HandlesValidationErrors],
        props: ['resourceName', 'resourceId', 'field'],

        data: () => ({
            show: 1,
            fields: {},
            language: 1,
            currentLanguage: 0,
            languages: Nova.config.languages,
        }),
        async created() {
            this.fields = this.field.trans[0].fields;
        },
        methods: {
            changeSelect(event) {
                this.setFieldsForCurrentLanguage();

                this.currentLanguage = event.target.value-1;

                // Re-render form for select language
                this.show = 0;
                this.$nextTick(() => {
                    this.fields = this.field.trans[event.target.value-1].fields;
                    this.show = 1;
                })
            },

            /*
             * Set the initial, internal value for the field.
             */
            setInitialValue() {
                //
            },

            /**
             * Fill the given FormData object with the field's internal value.
             */
            fill(formData) {
                // Set first language
                this.setFieldsForCurrentLanguage();

                // Collect data for api
                let fields = [];
                this.field.trans.forEach((item) => {
                    let trans = {language_id: item.lang.id};

                    item.fields.forEach(function(field) {
                        trans[field.attribute] = field.value
                    });

                    fields.push(trans);
                });

                formData.append(
                    this.field.attribute,
                    JSON.stringify({
                        data: fields, options:
                        this.field.options
                    }) || ''
                )
            },

            /**
             * Update the field's internal value.
             */
            handleChange(value) {
                //
            },

            setFieldsForCurrentLanguage() {
                this.field.trans[this.currentLanguage].fields.forEach((item, key) => {
                    this.field.trans[this.currentLanguage].fields[key].value = this.$children[key].value;
                });
            }
        },
    }
</script>

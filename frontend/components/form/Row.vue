<template>
    <div :class="(sizes ? sizes : 'col-xl-12')">
        <div v-if="label" class="form-label">
            <span>{{label}} </span>
        </div>
        <div class="form_text_field" style="position: relative">
            <div v-if="required || required === undefined" class="form-required">*</div>
            <slot/>
        </div>

        <div v-if="$slots.info" class="mb-2 mt-1" style="color: #999999">
            <slot name="info"/>
        </div>

        <div class="errors">
            <div v-if="error">{{error}}</div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Row",
        props: ['label', 'name', 'names', 'sizes', 'info', 'required', 'prepend', 'type'],
        data() {
            return {
                error: '',
            }
        },
        mounted() {
            if (this.name) {
                this.$root.$on('clearRowErrors' + this.name, () => this.error = '');
                this.$root.$on('setRowErrors' + this.name, (error) => this.error = error);
            }
        },
    }
</script>
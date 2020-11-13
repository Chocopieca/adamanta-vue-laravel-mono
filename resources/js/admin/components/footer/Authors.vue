<template>
    <MetaTagsModal keyPrefix="authors">
        <div class="mb-3"><b>Переменные</b></div>
        <p><b>Имя автора:</b> {$authorName}</p>
    </MetaTagsModal>
</template>

<script>
    import MetaTagsModal from '../modals/MetaTagsModal'

    export default {
        name: "Authors",
        components: {
            MetaTagsModal
        }
    }
</script>
<template>
    <MetaTagsModal keyPrefix="genres">
        <div class="mb-3"><b>Переменные</b></div>
        <p><b>Название жанра:</b> {$genreName}</p>
    </MetaTagsModal>
</template>

<script>
    import MetaTagsModal from '../modals/MetaTagsModal'

    export default {
        name: "Genres",
        components: {
            MetaTagsModal
        }
    }
</script>
<template>
    <MetaTagsModal keyPrefix="books">
        <div class="mb-3"><b>Переменные</b></div>
        <p><b>Заголовок книги:</b> {$bookTitle}</p>
        <p><b>Год книги:</b> {$bookYear}</p>
        <p><b>Имя автора:</b> {$bookAuthorName}</p>
    </MetaTagsModal>
</template>

<script>
    import MetaTagsModal from '../modals/MetaTagsModal'

    export default {
        name: "Books",
        props: ['data'],
        components: {
            MetaTagsModal
        }
    }
</script>
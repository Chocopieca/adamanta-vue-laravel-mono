<template>
    <aside :id="type + '-sidebar-def-theme'" :class="'def-sidebar def-sidebar-' + part + '-' + type">
        <div style="padding: 10px 0 20px 0;">
            <slot/>
        </div>
    </aside>
</template>

<script>
    export default {
        name: "sidebar",
        props: ['type', 'part']
    }
</script>
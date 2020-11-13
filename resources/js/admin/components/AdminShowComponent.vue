<template>
    <component :is="prefix + '-' + $route.params.resourceName" :data="data"/>
</template>

<script>
    export default {
        name: "AdminShowComponent",
        props: ['prefix', 'data'],
    }
</script>
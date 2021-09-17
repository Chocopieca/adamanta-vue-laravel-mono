<template>
  <div>
    <slot v-if="content"/>
    <div v-loading="true" v-else style="height: 400px" />
  </div>
</template>

<script>
	export default {
		name: "Loading",
        props: {
          content: {
            type: Boolean,
            default: true
          }
        }
	}
</script>
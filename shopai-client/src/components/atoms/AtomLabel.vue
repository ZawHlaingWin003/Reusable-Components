<template>
	<label :for="props.for" class="text-sm">
		<slot />
		<span class="text-red-600 ml-1" v-if="props.required">*</span>
	</label>
</template>

<script setup>
const props = defineProps({
	for: String,
	required: Boolean
});
</script>

<style lang="scss" scoped></style>
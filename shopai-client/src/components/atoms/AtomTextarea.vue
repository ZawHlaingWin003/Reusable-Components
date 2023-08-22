<template>
    <textarea
        rows="4"
        :class="[
            'p-2 text-black rounded-md w-full border-[1.5px] focus:outline-none focus:border-blue-800 transition disabled:bg-gray-200 disabled:border-gray-400',
            props.invalid
                ? 'border-red-500 focus:border-red-700'
                : 'border-gray-300',
        ]"
        :id="props.id"
        :value="props.modelValue"
        :required="props.required"
        @input="($event) => emit('update:modelValue', $event.target.value)"
    ></textarea>
</template>

<script setup>
const props = defineProps({
    id: String,
    modelValue: [String, Number],
    required: Boolean,
    invalid: Boolean,
    ariaDescribedBy: String,
});

const emit = defineEmits(["update:modelValue"]);
</script>

<style scoped></style>

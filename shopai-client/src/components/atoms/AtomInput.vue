<template>
    <input
        :class="[
            'p-2 text-black rounded-md w-full border-[1.5px] focus:outline-none focus:border-blue-800 transition disabled:bg-gray-200 disabled:border-gray-400',
            field.invalid
                ? 'border-red-500 focus:border-red-700'
                : 'border-gray-300',
        ]"
        :id="field.id"
        :value="props.modelValue"
        :required="field.required"
        @input="($event) => emit('update:modelValue', $event.target.value)"
    />
</template>

<script setup>
import { inject } from "vue";
const props = defineProps({
    id: String,
    modelValue: [String, Number],
    required: Boolean,
    invalid: Boolean,
    ariaDescribedBy: String,
});

const emit = defineEmits(["update:modelValue"]);

const field = inject("field", props);
</script>

<style lang="scss" scoped></style>

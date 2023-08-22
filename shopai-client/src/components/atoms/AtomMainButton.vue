<template>
    <component
        :is="props.as"
        :class="buttonClass"
        :disabled="props.disabled"
    >
        <AtomButtonLoader v-if="props.isLoading" class="absolute" />
        
        <component
            :is="props.leftIcon"
            :class="['mr-2', props.isLoading && 'invisible']"
        />

        <span :class="[props.isLoading && 'invisible']">
            <slot />
        </span>
        <component
            :is="props.rightIcon"
            :class="['ml-2', props.isLoading && 'invisible']"
        />
    </component>
</template>

<script setup>
import { computed } from "vue";
import AtomButtonLoader from "./AtomButtonLoader.vue";

const props = defineProps({
    leftIcon: Object,
    rightIcon: Object,
    isLoading: Boolean,
    disabled: Boolean,
    as: {
        type: [String, Object],
        default: "button",
    },
    variant: {
        type: String,
        validator(value) {
            // The value must match one of these strings
            return ["primary", "secondary", "danger"].includes(value);
        },
        default: "primary",
    },
});

const buttonClass = computed(() => {
    let colorClass = "";
    switch (props.variant) {
        case "primary":
            colorClass = "text-white bg-blue-500 hover:bg-blue-400 active:bg-blue-600";
            break;
        case "secondary":
            colorClass = "text-blue-500 bg-white border border-blue-500 hover:text-white hover:bg-blue-500 active:bg-blue-600";
            break;
        case "danger":
            colorClass = "text-white bg-red-500 hover:bg-red-400 active:bg-red-600";
            break;
    }
    return `inline-flex items-center justify-center px-4 py-2 rounded-sm ${colorClass} ${props.disabled ? 'text-white border-none bg-gray-400 hover:bg-gray-400 active:bg-gray-400 cursor-not-allowed' : ''}`;
});
</script>

<style lang="scss" scoped></style>

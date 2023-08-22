<template>
    <div class="input-group my-2">
        <AtomLabel
            :for="props.id"
            :required="props.required"
            v-if="props.label"
            >{{ props.label }}</AtomLabel
        >
        <slot />
        <AtomInputErrorMessage v-if="props.error">
            {{ props.error }}
        </AtomInputErrorMessage>
        <AtomInputHelperMessage id="helper-password" v-if="props.help">
            {{ props.help }}
        </AtomInputHelperMessage>
    </div>
</template>

<script setup>
import { provide, computed } from "vue";

import AtomLabel from "@/components/atoms/AtomLabel.vue";
import AtomInputErrorMessage from "@/components/atoms/AtomInputErrorMessage.vue";
import AtomInputHelperMessage from "@/components/atoms/AtomInputHelperMessage.vue";

const props = defineProps({
    id: {
        type: String,
        default: () =>
            `field-${
                Date.now().toString(36) +
                Math.random().toString(36).substr(2, 5)
            }`,
    },
    label: String,
    required: Boolean,
    error: String,
    help: String,
});

provide(
    "field",
    computed(() => {
        return {
            ...props,
            invalid: !!props.error
        }
    })
);
</script>

<style scoped></style>

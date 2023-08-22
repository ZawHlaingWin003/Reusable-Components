<template>
    <div class="space-y-8">
        <div class="flex flex-wrap gap-4 border p-4 w-1/2 mx-auto">
            <AtomMainButton :leftIcon="IconTooling"> Icon Left </AtomMainButton>
    
            <AtomMainButton :rightIcon="IconSupport"> Icon Right </AtomMainButton>

            <AtomMainButton
                as="a"
                href="https://youtube.com"
                :leftIcon="IconCommunity"
            >
                Link Button
            </AtomMainButton>

    
            <AtomMainButton
                as="a"
                href="https://youtube.com"
                :leftIcon="IconCommunity"
                :isLoading="isButtonLoading"
                :disabled="isButtonLoading"
                @click.prevent="loadButton"
            >
                Loading Button
            </AtomMainButton>
    
            <AtomMainButton :rightIcon="IconSupport">
                Primary Button
            </AtomMainButton>
    
            <AtomMainButton variant="secondary" :rightIcon="IconEcosystem">
                Secondary One
            </AtomMainButton>
    
            <AtomMainButton variant="danger" :rightIcon="IconDocumentation">
                Danger Button
            </AtomMainButton>

            <AtomMainButton variant="success" :rightIcon="IconDocumentation">
                Test Button
            </AtomMainButton>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";

import AtomMainButton from "../components/atoms/AtomMainButton.vue";
import IconTooling from "@/components/icons/IconTooling.vue";
import IconSupport from "@/components/icons/IconSupport.vue";
import IconCommunity from "@/components/icons/IconCommunity.vue";
import IconEcosystem from "@/components/icons/IconEcosystem.vue";
import IconDocumentation from "@/components/icons/IconDocumentation.vue";

let isButtonLoading = ref(false);

function loadButton() {
    isButtonLoading.value = true;

    setTimeout(() => {
        isButtonLoading.value = false;
    }, 2000);
}
</script>

<style lang="scss" scoped></style>

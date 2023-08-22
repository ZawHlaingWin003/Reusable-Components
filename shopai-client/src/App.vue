<script setup>
import { RouterLink, RouterView } from "vue-router";
</script>

<template>
    <header class="px-20 pt-10 text-center">
        <img
            alt="Vue logo"
            class="logo mx-auto"
            src="@/assets/logo.svg"
            width="125"
            height="125"
        />

        <div class="wrapper my-4">
            <nav class="space-x-4">
                <RouterLink to="/" class="p-2 bg-blue-400 rounded text-white text-sm"
                    >Home</RouterLink
                >
                <RouterLink
                    to="/inputs"
                    class="p-2 bg-blue-400 rounded text-white text-sm"
                    >Inputs</RouterLink
                >
                <RouterLink
                    to="/buttons"
                    class="p-2 bg-blue-400 rounded text-white text-sm"
                    >Buttons</RouterLink
                >
                <RouterLink
                    to="/draggable-custom"
                    class="p-2 bg-blue-400 rounded text-white text-sm"
                    >Draggable(Custom)</RouterLink
                >
                <RouterLink
                    to="/draggable-library"
                    class="p-2 bg-blue-400 rounded text-white text-sm"
                    >Draggable(Library)</RouterLink
                >
                <RouterLink
                    to="/testing"
                    class="p-2 bg-blue-400 rounded text-white text-sm"
                    >Test Draggable</RouterLink
                >
            </nav>
        </div>
    </header>

    <div class="px-20 py-10">
        <RouterView />
    </div>
</template>

<style scoped></style>

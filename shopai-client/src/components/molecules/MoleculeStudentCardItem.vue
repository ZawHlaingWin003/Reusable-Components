<template>
    <div class="bg-blue-300 px-4 py-2 rounded shadow flex gap-4 cursor-move">
        <div class="handle cursor-move ">
            <p
                class="rounded-full w-8 h-8 flex items-center justify-center bg-green-400 font-bold"
            >
                {{ index }}
            </p>
        </div>
        <div>
            <p class="font-bold">{{ student.name }}</p>
            <p class="text-sm">{{ student.email }}</p>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    student: Object,
    index: {
        type: Number,
        default: null,
    },
});
</script>

<style lang="scss" scoped></style>

<template>
    <div class="flex gap-8">
        <div
            class="drop-zone border bg-gray-300 py-4 px-8 space-y-4 h-fit text-center"
            @drop="onDrop($event, 1)"
            @dragenter.prevent
            @dragover.prevent
        >
            <h1 class="font-bold text-orange-500 p-2 bg-purple-800 rounded">
                Team A Naw Ya Htar
            </h1>
            <template v-if="getList(1).length">
                <div
                    v-for="item in getList(1)"
                    :key="item.id"
                    class="bg-blue-300 px-8 py-2 rounded cursor-move"
                    draggable="true"
                    @dragstart="startDrag($event, item)"
                >
                    <p class="font-bold">{{ item.name }}</p>
                    <p class="text-sm">{{ item.email }}</p>
                </div>
            </template>
            <template v-else>
                <p class="font-bold text-xs my-0">
                    (Drag & Drop students here to add)
                </p>
            </template>
        </div>

        <div
            class="drop-zone border bg-gray-300 py-4 px-8 space-y-4 h-fit text-center"
            @drop="onDrop($event, 2)"
            @dragenter.prevent
            @dragover.prevent
        >
            <h1 class="font-bold text-yellow-500 p-2 bg-purple-800 rounded">
                Team Kyan Sit Thar
            </h1>
            <template v-if="getList(2).length">
                <div
                    v-for="item in getList(2)"
                    :key="item.id"
                    class="bg-blue-300 px-8 py-2 rounded cursor-move"
                    draggable="true"
                    @dragstart="startDrag($event, item)"
                >
                    <p class="font-bold">{{ item.name }}</p>
                    <p class="text-sm">{{ item.email }}</p>
                </div>
            </template>
            <template v-else>
                <p class="font-bold text-xs my-0">
                    (Drag & Drop students here to add)
                </p>
            </template>
        </div>

        <div
            class="drop-zone border bg-gray-300 py-4 px-8 space-y-4 h-fit text-center"
            @drop="onDrop($event, 3)"
            @dragenter.prevent
            @dragover.prevent
        >
            <h1 class="font-bold text-red-500 p-2 bg-purple-800 rounded">
                Team Ba Yint Naung
            </h1>
            <template v-if="getList(3).length">
                <div
                    v-for="(item, index) in getList(3)"
                    :key="item.id"
                    draggable="true"
                    @dragstart="startDrag($event, item)"
                >
                    <MoleculeStudentCardItem :student="item" :index="index" />
                </div>
            </template>
            <template v-else>
                <p class="font-bold text-xs my-0">
                    (Drag & Drop students here to add)
                </p>
            </template>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import MoleculeStudentCardItem from "../components/molecules/MoleculeStudentCardItem.vue";

const items = ref([
    {
        id: 0,
        name: "David",
        email: "david@gmail.com",
        list: 3,
    },
    {
        id: 1,
        name: "Kylo",
        email: "kylo@gmail.com",
        list: 2,
    },
    {
        id: 2,
        name: "Clair",
        email: "clair@gmail.com",
        list: 1,
    },
    {
        id: 3,
        name: "John",
        email: "john@gmail.com",
        list: 1,
    },
    {
        id: 4,
        name: "Denial",
        email: "denial@gmail.com",
        list: 3,
    },
    {
        id: 5,
        name: "Rose",
        email: "rose@gmail.com",
        list: 1,
    },
]);

const getList = (list) => {
    return items.value.filter((item) => item.list == list);
};

const startDrag = (event, item) => {
    console.log(item);
    event.dataTransfer.dropEffect = "move";
    event.dataTransfer.effectAllowed = "move";
    event.dataTransfer.setData("itemID", item.id);
};

const onDrop = (event, list) => {
    const itemID = event.dataTransfer.getData("itemID");
    const item = items.value.find((item) => item.id == itemID);
    item.list = list;
};
</script>

<style scoped></style>

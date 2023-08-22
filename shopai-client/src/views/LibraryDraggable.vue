<template>
    <div>
        <h1 class="font-bold text-xl font-serif">Sort Card by Drag and Drop</h1>
        <!-- <pre>
            {{ groupCloud }}
        </pre> -->

        <div class="flex gap-4 my-4">
            <p
                v-for="(group, index) in groupCloud"
                :key="index"
                class="p-1 px-2 rounded bg-gray-300 hover:bg-gray-400 active:bg-gray-500 text-xs cursor-pointer"
            >
                {{ group }}
            </p>
        </div>

        <!-- 
            Draggable component renders as a div. If you want to use as a ul element, use tag attribute.

            Ghost Class will style the place where the card will be dropped.

            Drag Class is the style for dragging item that you are dragging.

            Handle is used to specify which element should be used to drag elements. Default is the entire item slot.
        -->
        <template v-if="!groups.length">
            <AtomSectionLoader class="mx-auto my-12" />
        </template>
        <template v-else>
            <div class="flex bg-gray-200 p-2 rounded">
                <div class="flex flex-col gap-4 w-1/3 p-2">
                    <MoleculeGroupCard
                        v-for="(group, index) in splitGroups[0]"
                        :key="index"
                        :group="group"
                    />
                </div>
                <div class="flex flex-col gap-4 w-1/3 p-2">
                    <MoleculeGroupCard
                        v-for="(group, index) in splitGroups[1]"
                        :key="index"
                        :group="group"
                    />
                </div>
                <div class="flex flex-col gap-4 w-1/3 p-2">
                    <MoleculeGroupCard
                        v-for="(group, index) in splitGroups[2]"
                        :key="index"
                        :group="group"
                    />
                </div>
            </div>
        </template>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import axios from "axios";
import MoleculeGroupCard from "../components/molecules/MoleculeGroupCard.vue";
import AtomSectionLoader from "../components/atoms/AtomSectionLoader.vue";

const groups = ref([]);
const splitGroups = ref([]);

const getGroups = async () => {
    try {
        const response = await axios.get("/api/groups");
        console.log(response);
        groups.value = response.data.groups;
        splitGroups.value = response.data.splitGroups;
    } catch (error) {
        console.error("Error fetching groups:", error);
    }
};

const groupCloud = computed(() => {
    return [
        "All",
        ...groups.value.map((group) => {
            return group.name.toUpperCase();
        }),
    ];
});

const onGroupChange = (e) => {
    let item = e.added || e.moved;
    console.log(e, item);
};

// onMounted(() => {
//     getGroups;
// });
onMounted(getGroups);

// new Set collect the unique values in array and return new array

// const getStudents = computed(() => {
//     return {
//         aNawYaHtar: students.value.filter((student) => student.list == 1),
//         kyanSitThar: students.value.filter((student) => student.list == 2),
//         // baYintNaung: students.value.filter((student) => student.list == 3),
//     };
// });
</script>

<style></style>

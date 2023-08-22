<template>
    <div>
        <div class="group-card rounded bg-blue-200 divide-y-2">
            <div class="group-name p-4 flex items-center gap-2">
                <img src="@/assets/hamburger-menu-1.svg" alt="" class="w-8 h-8 cursor-move handle">
                <p class="text-xl font-bold">{{ group.name }}</p>
            </div>
            <div class="group-students p-4">
                <template v-if="!students.length">
                    <p class="font-bold text-xs mb-2">
                        (Drag & Drop students here to add)
                    </p>
                </template>

                <Draggable
                    :list="students"
                    group="student"
                    item-key="name"
                    nmae="flip-list"
                    @change="onChange"
                    ghost-class="ghost"
                    drag-class="drag"
                    class="space-y-4"
                    :class="{
                        'border-2 border-black border-dotted p-4': !students.length
                    }"
                >
                    <template #item="{ element, index }">
                        <div>
                            <MoleculeStudentCardItem
                                :student="element"
                                :index="index"
                            />
                        </div>
                    </template>
                </Draggable>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";

import { ref, watch, watchEffect } from "vue"
import MoleculeStudentCardItem from "./MoleculeStudentCardItem.vue";

const props = defineProps({
    group: Object,
});

const students = ref(props.group.students)

watchEffect(() => {
    props.group.students,
    (newStudents) => students.value = newStudents
})

const onChange = (e) => {
    let item = e.added || e.moved;

    if (!item) return;

    let index = item.newIndex;
    let prevStudent = props.group.students[index - 1];
    let nextStudent = props.group.students[index + 1];
    let currentStudent = props.group.students[index];

    let position = currentStudent.position;

    if (prevStudent && nextStudent) {
        position = (prevStudent.position + nextStudent.position) / 2;
    } else if (prevStudent) {
        position = prevStudent.position + prevStudent.position / 2;
    } else if (nextStudent) {
        position = nextStudent.position / 2;
    }

    axios
        .put(`/api/students/${currentStudent.id}/move`, {
            position: position,
            groupId: props.group.id,
        })
        .then((response) => {
            console.log("Result ", response);
        });
};
</script>

<style scoped>
.flip-list-move {
    transition: transform 0.5s;
}

.no-move {
    transition: transform 0s;
}

.ghost {
    background-color: lightgray;
    border: 1px dotted purple;
    border-radius: 5px;
}

.ghost > * {
    visibility: hidden;
}

.drag > div {
    transform: rotate(3deg);
    background-color: #268fff;
}
</style>

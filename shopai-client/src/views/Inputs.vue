<script setup>
import { ref } from "vue";

import AtomLabel from "../components/atoms/AtomLabel.vue";
import AtomInput from "../components/atoms/AtomInput.vue";
import AtomInputErrorMessage from "../components/atoms/AtomInputErrorMessage.vue";
import AtomInputHelperMessage from "../components/atoms/AtomInputHelperMessage.vue";
import AtomTextarea from "../components/atoms/AtomTextarea.vue";
import MoleculeInputGroup from "../components/molecules/MoleculeInputGroup.vue";
import AtomAutosizeTextarea from "../components/atoms/AtomAutosizeTextarea.vue";

const form = ref({
    name: "",
    email: "",
    password: "",
    content: "",
    biography: ""
});

const errors = ref({});

function submit() {
    errors.value = {
        name: "Name field is required",
        email: "Email field is required",
        password: "Password field is required",
        content: "Content field is required",
    };
}
</script>

<template>
    <main>
        <form @submit.prevent="submit">
            <div class="input-group my-2">
				<MoleculeInputGroup
                    label="Name"
                    required
                    :error="errors.name"
                >
                    <AtomInput
                        type="text"
                        placeholder="Enter Your Name ..."
                        v-model="form.name"
                    />
                </MoleculeInputGroup>
            </div>
            <div class="input-group">
                <MoleculeInputGroup
                    label="Email"
                    id="email"
                    required
                    :error="errors.email"
                    help="We'll not share your mail."
                >
                    <AtomInput
                        type="text"
                        placeholder="Enter Your Email ..."
                        v-model="form.email"
                    />
                </MoleculeInputGroup>
            </div>
            <div class="input-group my-2">
                <AtomLabel for="password" required>Password</AtomLabel>
                <AtomInput
                    type="text"
                    placeholder="Enter Your Password ..."
                    id="password"
                    v-model="form.password"
                    required
                    :invalid="!!errors.password"
                />
                <AtomInputErrorMessage v-if="errors.password">
                    {{ errors.password }}
                </AtomInputErrorMessage>
                <AtomInputHelperMessage id="helper-password">
                    Should be at least 8 characters long.
                </AtomInputHelperMessage>
            </div>
            <div class="input-group">
                <AtomLabel for="content" required>Content</AtomLabel>
                <AtomTextarea
                    id="content"
                    v-model="form.content"
                    required
                    :invalid="!!errors.content"
                />
                <AtomInputErrorMessage v-if="errors.content">
                    {{ errors.content }}
                </AtomInputErrorMessage>
            </div>
            <div class="input-group">
                <AtomLabel>Biography</AtomLabel>
                <AtomAutosizeTextarea rows="2" v-model="form.biography" />
            </div>
            <button
                type="submit"
                class="px-4 py-2 bg-blue-400 hover:bg-blue-300 active:bg-blue-500 rounded-sm"
            >
                Submit
            </button>
        </form>
    </main>
</template>

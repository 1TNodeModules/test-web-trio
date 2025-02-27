<template>
    <div class="p-10 justify-center items-center text-center">
        <span class="font-bold">Nouvelle personne</span>
        <form class="flex  justify-center items-center w-xs flex-col border border-gray-600 p-4 rounded-2xl gap-4"
              @submit.prevent="create">
            <span class="text-red-800" v-if="error.display">{{ error.message }}</span>
            <CustomInput required placeholder="Nom" v-model:value="lastname"/>
            <CustomInput required placeholder="Prénom" v-model:value="firstname"/>
            <CustomInput required placeholder="date de naissance" type="date" v-model:value="birth_date"/>

            <CustomBtn label="Créer" type="submit" class="w-full"/>
        </form>
    </div>
</template>

<script setup>
import {ref} from 'vue';
import CustomInput from "../CustomInput.vue";
import CustomBtn from "../CustomBtn.vue";

let lastname = ref('');
let firstname = ref('');
let birth_date = ref('');
let error = ref({display: false, message: ''});

const emit = defineEmits(['create-person']);

function create() {
    emit('create-person', {
        lastname: lastname.value,
        firstname: firstname.value,
        birth_date: birth_date.value
    });
}

</script>


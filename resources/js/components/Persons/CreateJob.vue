<template>
    <div class="p-10 justify-center items-center text-center">
        <span class="font-bold">Nouvel Emploi</span>
        <form class="flex  justify-center items-center w-xs flex-col border border-gray-600 p-4 rounded-2xl gap-4"
              @submit.prevent="create">
            <CustomInput required placeholder="Titre" v-model:value="title"/>
            <CustomInput required placeholder="début" type="date" v-model:value="start_date"/>
            <CustomInput placeholder="fin" type="date" :required="false" v-model:value="end_date"/>
            <DropDown v-model:value="company" placeholder="Entreprise" label="name" value="id"
                      :data="companies"></DropDown>
            <CustomBtn label="Ajouter" type="submit" class="w-full"/>
        </form>
    </div>
</template>

<script setup>

import {ref} from "vue";
import CustomInput from "../CustomInput.vue";
import CustomBtn from "../CustomBtn.vue";
import DropDown from "../DropDown.vue";

const emit = defineEmits(['create-job']);

defineProps({
    companies: Array,
});

let company = ref('');
let title = ref('');
let start_date = ref('');
let end_date = ref(null);

function create() {
    emit('create-job', {
        title: title.value,
        companies_id: company.value,
        start_date: start_date.value,
        end_date: end_date.value
    });
}
</script>

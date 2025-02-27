<template>
    <div class="flex flex-col justify-center items-center">
        <Modal :visible="modalVisible" @update:visible="modalVisible = $event">
            <CreatePerson @create-person="(data) => create(data)"/>
        </Modal>
        <h1 class="mt-10 text-2xl">Liste des personnes</h1>
        <h2 class="mt-10 text-2xl">Filtrer par entreprise</h2>
        <DropDown class="w-xs" v-model:value="companyFilter" placeholder="Entreprise" label="name" value="id"
                  :data="companies"></DropDown>
        <div class=" flex justify-center items-center">
            <div class="flex flex-wrap flex-1 p-20  gap-9">
                <Card v-for="p in persons" :person='p'/>
            </div>
        </div>
        <CustomBtn label="Ajouter une personne" type="submit" class="w-50 hover:cursor-pointer"
                   @click="displayForm()"/>
    </div>
</template>

<script setup>
import {ref, onMounted, watch} from 'vue';
import axiosInstance from "@/myAxios.js";
import CustomBtn from "../components/CustomBtn.vue";
import CreatePerson from "../components/Persons/CreatePerson.vue";
import Card from "../components/Persons/Card.vue";
import Modal from "../components/modal.vue";
import DropDown from "@/components/DropDown.vue";


let persons = ref([])
let companies = ref([])
let modalVisible = ref(false);
let companyFilter = ref('');

const sort = [
    {field: "lastname", direction: 'asc'},
]

onMounted(async () => {
    let query = await axiosInstance.post('/persons/search', {sort: sort});
    persons.value = query.data.data;

    let companiesQuery = await axiosInstance.get('/companies/');
    companies.value = companiesQuery.data.data;
})

function displayForm() {
    modalVisible.value = true;
}

watch(companyFilter, async (companyId, oldCompanyId) => {
    let filters = [];
    if (companyId) {
        filters = [
            {field: "jobs.companies_id", operator: "=", value: companyId},
        ]
    }

    let query = await axiosInstance.post('/persons/search', {
        filters: filters,
        sort: sort
    });
    persons.value = query.data.data;
})

async function create(data) {
    const body = {
        lastname: data.lastname,
        firstname: data.firstname,
        birth_date: data.birth_date
    }

    try {
        const res = await axiosInstance.post('/persons', body);
        persons.value.unshift(res.data.data);
        modalVisible.value = false;
    } catch (e) {
        error.value.display = true;
        error.value.message = e.response.data.message;
    }

}
</script>


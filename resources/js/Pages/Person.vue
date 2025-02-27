<template>
    <div class="flex flex-col justify-center items-center mt-20">
        <Modal :visible="modalVisible" @update:visible="modalVisible = $event">
            <CreateJob :companies="companies" @create-job="(data) => createJob(data)"/>
        </Modal>
        <div v-if="person"
             class="flex tems-center w-xs flex-col p-4  gap-4  ">
            <div class="flex gap-2 text-xl">
                <span class="">{{ person.lastname.toUpperCase() }}</span>
                <span class="">{{ person.firstname }}</span>

            </div>
            <span class="">née le <b>{{ person.birth_date }}</b></span>
            <span>Emplois :</span>
            <div class="flex flex-col gap-10 ">
                <div class="flex flex-1 flex-col " v-for="j in person.jobs">
                    <span><b>{{ j.title }}</b> Chez {{ j.companies.name }}</span>
                </div>
            </div>

        </div>
        <CustomBtn label="Ajouter un emploi" class="w-50 hover:cursor-pointer" @click="displayForm()"/>
    </div>

</template>

<script setup>
import {onMounted, ref} from "vue";
import axiosInstance from "../myAxios.js";
import {useRoute} from 'vue-router'
import CustomBtn from "@/components/CustomBtn.vue";
import CreateJob from "@/components/Persons/CreateJob.vue";
import Modal from "@/components/modal.vue";

const route = useRoute()

let person = ref(null);
let companies = ref([]);
let modalVisible = ref(false);

onMounted(async () => {

    const start_date = route.query.start_date;
    const end_date = route.query.end_date || null;

    let personsQuery = await axiosInstance.get('/persons/' + route.params.id);
    person.value = personsQuery.data.data;

    let companiesQuery = await axiosInstance.get('/companies/');
    companies.value = companiesQuery.data.data;

    if (start_date) {
        const filters = [
            {field: "start_date", operator: ">", value: start_date},
            {field: "persons_id", operator: "=", value: route.params.id}
        ]

        if (end_date) {
            filters.push({field: "end_date", operator: "<", value: end_date})
        }

        let jobsDateQuery = await axiosInstance.post('/jobs/search', {
            filters: filters
        });

        if (jobsDateQuery.status === 200) {
            person.value.jobs = jobsDateQuery.data.data;
        }
    }
})

function displayForm() {
    modalVisible.value = true;
}

async function createJob(data) {
    let jobQuery = await axiosInstance.post('/jobs', {
        ...data,
        persons_id: route.params.id
    });

    if (jobQuery.status === 201) {
        let newJob = jobQuery.data.data;
        person.value.jobs.unshift(newJob);
        modalVisible.value = false;
    }
}

</script>

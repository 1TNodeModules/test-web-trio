<template>
    <router-link :to="`/persons/${person.id}`">
        <div
            class="flex   items-center w-xs flex-col border border-gray-600 p-4 rounded-2xl gap-4  hover:cursor-pointer hover:border-cyan-900 hover:border-2 ">
            <div class="flex gap-2">
                <span class="">{{ person.lastname.toUpperCase() }}</span>
                <span class="">{{ person.firstname }}</span>

            </div>
            <span>{{ getAge(person.birth_date) + ' ans' }}</span>
            <span class="font-bold">Postes occupés actuellement :</span>
            <span class="text-gray-600" v-for="j in getActualJobs()">- {{ j.title }}</span>
        </div>
    </router-link>

</template>


<script setup>
import moment from "moment/moment.js";

const {person} = defineProps(['person']);

function getAge(date) {
    return moment().diff(date, 'years');
}

function getActualJobs() {
    return person.jobs.filter((j) => j.end_date == null);
}
</script>

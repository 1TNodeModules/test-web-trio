<template>
    <select v-model="value" id="countries"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected="selected" :value="null">-------- {{ placeholder }} --------</option>
        <option v-for="option in data" :value="option.id">{{ option[label] }}</option>
    </select>
</template>

<script setup>


defineProps({
    placeholder: String,
    value: String,
    label: String,
    data: Array
});

const value = defineModel('value');
</script>


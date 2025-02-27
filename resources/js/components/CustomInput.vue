

<template>
    <div class="flex flex-col w-full gap-6 mt-6">
        <div class="relative w-full min-w-[200px] h-10">
            <input
                v-model="value"
                :required="required"
                :type="type"
                maxlength="150"
                id="id"
                class="bg-gray-50 border border-light-purple text-gray-900 text-sm rounded-lg focus:ring-purple focus:border-purple block w-full p-2.5"
                :placeholder="placeholder" />
        </div>
    </div>
</template>

<script setup>

defineProps({
    placeholder: String,
    type: String,
    value: String,
    required: Boolean,
});

const value = defineModel('value');
</script>

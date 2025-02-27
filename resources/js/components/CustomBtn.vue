<template>
    <button
        class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-teal-700 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
        :type="props.type"
        :style="{ backgroundColor: props.color }"
    >
        {{ props.label }}
    </button>
</template>
<script setup>
const props = defineProps({
    label: String,
    type: String,
    color: String,
});
</script>

<template>
    <div
        v-if="visible"
        @click="$emit('update:visible', !visible)"
        class="fixed inset-0 z-50 flex w-full h-screen transition-opacity duration-300 bg-black  place-items-center opacity-96">
        <div
            @click.stop
            class="flex flex-col items-center justify-center w-full max-w-xl mx-auto text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
            <slot/>
        </div>
    </div>
</template>
<script setup>
var props = defineProps({
    visible: Boolean,
});
</script>

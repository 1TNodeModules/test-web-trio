import './bootstrap';

import { createApp } from 'vue';
import {createRouter, createWebHistory} from "vue-router";
import App from "./App.vue";
import Index from "./Pages/Index.vue";
import Person from "./Pages/Person.vue";

const routes = [
    {path: '/', component: Index},
    {path: '/persons/:id', component: Person}
]

const  router = createRouter({
    history: createWebHistory(),
    routes
})

const app = createApp(App).use(router);
app.mount('#app');


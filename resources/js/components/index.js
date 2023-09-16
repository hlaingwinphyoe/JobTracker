import { createApp } from 'vue/dist/vue.esm-bundler';

import Employer from "./page/Employer.vue";

const app = createApp({});

app.component("employer", Employer);

app.mount("#job-app");

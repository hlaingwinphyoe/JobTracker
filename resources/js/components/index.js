import { createApp } from "vue/dist/vue.esm-bundler";

import Employer from "./page/Employer.vue";
import LatestJob from "./page/LatestJob.vue";
import JobIndex from "./jobs/Index.vue";
import EmployerIndex from "./employers/Index.vue";
import EmployerJobs from './composables/EmployerJobs.vue';
import EmployerProfile from './employees/Index.vue';

const app = createApp({});

app.component("employer", Employer);
app.component("latest-jobs", LatestJob);
app.component("job-index", JobIndex);
app.component("employer-index", EmployerIndex);
app.component('employer-job-card', EmployerJobs)
app.component('employer-profile', EmployerProfile)

app.mount("#job-app");

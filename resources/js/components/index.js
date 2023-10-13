import { createApp } from "vue/dist/vue.esm-bundler";

import Employer from "./page/Employer.vue";
import LatestJob from "./page/LatestJob.vue";
import JobIndex from "./jobs/Index.vue";
import EmployerIndex from "./employers/Index.vue";
import EmployerJobs from './composables/EmployerJobs.vue';
import EmployeeProfile from './employees/Index.vue';
import GetStarted from './page/GetStarted.vue';

const app = createApp({});

app.component("employer", Employer);
app.component("latest-jobs", LatestJob);
app.component("job-index", JobIndex);
app.component("employer-index", EmployerIndex);
app.component('employer-job-card', EmployerJobs);
app.component('employee-profile', EmployeeProfile);
app.component('get-started', GetStarted);

app.mount("#job-app");

import { createApp } from 'vue/dist/vue.esm-bundler';

import Employer from "./page/Employer.vue";
import LatestJob from "./page/LatestJob.vue";
import JobIndex from "./jobs/Index.vue";
import EmployerIndex from "./employers/Index.vue";

const app = createApp({});

app.component("employer", Employer);
app.component("latest-jobs", LatestJob);
app.component('job-index', JobIndex);
app.component('employer-index', EmployerIndex);

app.mount("#job-app");

<template>
  <!-- Category Tab -->

  <ul
    class="flex flex-wrap items-center mb-10 justify-center text-sm font-medium text-center text-gray-500"
  >
    <li class="mr-2">
      <button
        @click="chooseType('')"
        class="inline-block px-4 py-3 rounded-lg hover:text-gray-500 hover:bg-gray-100"
        :class="isActive('')"
      >
        All
      </button>
    </li>
    <li class="mr-2" v-for="item in types" :key="item.id">
      <button
        @click="chooseType(item.slug)"
        class="inline-block px-4 py-3 rounded-lg hover:text-gray-500 hover:bg-gray-100"
        :class="isActive(item.slug)"
      >
        {{ item.name }}
      </button>
    </li>
  </ul>
  <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-4 lg:gap-6">
    <div class="" v-for="jobPost in jobPosts" :key="jobPost.id" id="job-card">
      <Card :jobPost="jobPost" />
    </div>
  </div>

  <div class="text-center mt-10">
    <Loader v-if="loading" />
    <button
      @click="seeMore"
      v-else
      class="rounded text-gray-200 bg-gradient-to-br from-primary-400 via-tertiary-400 to-tertiary-500 enabled:hover:bg-gradient-to-tr px-2.5 py-1.5 flex mx-auto mt-3 disabled:opacity-50"
      :disabled="param.page >= last_page"
      :class="param.page >= last_page ? 'cursor-not-allowed' : ''"
    >
      See More
    </button>
  </div>
</template>

<script>
import { onMounted, reactive, toRefs } from "vue";
import Card from "../composables/Card.vue";
import Loader from "../composables/Loader.vue";
export default {
  components: {
    Card,
    Loader,
  },
  props: ["types"],
  setup() {
    const state = reactive({
      jobPosts: [],
      last_page: 1,
      loading: false,
      param: {
        page: 1,
        page_size: 8,
        type_id: "",
      },
    });

    const isActive = (key) => {
      if (state.param.type_id == key) {
        return "active";
      } else {
        return "";
      }
    };

    const chooseType = (key) => {
      state.loading = true;
      state.param.type_id = key;
      state.param.page = 1;
      state.jobPosts = [];

      getJobs();
    };

    const seeMore = () => {
      if (state.last_page > state.param.page) {
        state.param.page += 1;
        state.loading = true;
        axios.get("/wapi/get-jobs", { params: state.param }).then((res) => {
          state.loading = false;
          state.jobPosts.push(...res.data.data);
        });
      }
    };

    const getJobs = () => {
      state.loading = true;
      axios.get("/wapi/get-jobs", { params: state.param }).then((res) => {
        state.loading = false;
        state.jobPosts = res.data.data;
        state.last_page = res.data.meta.last_page;
      });
    };

    onMounted(() => {
      getJobs();
    });

    return {
      ...toRefs(state),
      seeMore,
      chooseType,
      isActive,
    };
  },
};
</script>

<style>
.active {
  background: #27a26f !important;
  color: white !important;
}
</style>

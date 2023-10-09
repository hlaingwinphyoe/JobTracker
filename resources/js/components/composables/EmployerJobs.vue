<template>
  <div class="px-5">
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 xl:gap-6">
      <div class="" v-for="jobPost in jobPosts" :key="jobPost.id">
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
  </div>
</template>

<script>
import { onMounted, reactive, toRefs } from "vue";
import Loader from "./Loader.vue";
import Card from "./Card.vue";
export default {
  components: {
    Loader,
    Card,
  },
  props: ["employer"],
  setup(props) {
    const state = reactive({
      jobPosts: [],
      last_page: 1,
      loading: false,
      param: {
        page: 1,
        page_size: 6,
      },
    });

    const seeMore = () => {
      if (state.last_page > state.param.page) {
        state.param.page += 1;
        state.loading = true;
        axios
          .get(`/wapi/get-employer-jobs/${props.employer.id}`, {
            params: state.param,
          })
          .then((res) => {
            state.loading = false;
            state.jobPosts.push(...res.data.data);
          });
      }
    };

    onMounted(() => {
      axios
        .get(`/wapi/get-employer-jobs/${props.employer.id}`, {
          params: state.param,
        })
        .then((res) => {
          state.loading = false;
          state.jobPosts = res.data.data;
          state.last_page = res.data.meta.last_page;
        });
    });

    return {
      ...toRefs(state),
      seeMore,
    };
  },
};
</script>

<style></style>

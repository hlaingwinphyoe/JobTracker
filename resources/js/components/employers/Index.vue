<template>
  <section class="w-full gap-6 px-24 py-5">
    <!-- Content -->
    <div>
      <div class="mb-3 flex justify-between items-center">
        <div class="text-gray-500 capitalize">Search Results</div>
        <div class="flex items-center">
          <span class="">
            <label for="sort" class="text-sm text-gray-500 mr-2"> Order By: </label>
            <select
              id="sort"
              name="sort"
              v-model="param.sort"
              @change="filterSort"
              class="bg-transparent border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-500 focus:border-primary-500 p-2.5 text-sm"
            >
              <option selected value="">Default</option>
              <option value="desc">Name Descending</option>
              <option value="asc">Name Ascending</option>
            </select>
          </span>
          <button
            @click.prevent="reset"
            class="p-2 bg-red-500 rounded-lg ml-2 text-white"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="icon icon-tabler icon-tabler-refresh"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
              <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
            </svg>
          </button>
        </div>
      </div>
      <div>
        <div
          class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-8"
        >
          <div class="" v-for="employee in employers" :key="employee.id">
            <EmployerCard :employee="employee" />
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
    </div>
  </section>
</template>

<script>
import { onMounted, reactive, ref, toRefs } from "vue";
import "vue3-carousel/dist/carousel.css";
import { Carousel, Navigation, Slide } from "vue3-carousel";
import EmployerCard from "../composables/EmployerCard.vue";
import Loader from "../composables/Loader.vue";
export default {
  components: {
    EmployerCard,
    Loader,
  },
  props: ["categories"],
  setup() {
    const state = reactive({
      employers: [],
      loading: false,
      last_page: 1,
      param: {
        page: 1,
        page_size: 12,
        search: "",
        sort: "",
      },
    });

    const getEmployers = () => {
      state.loading = true;
      axios.get("/wapi/get-employers", { params: state.param }).then((res) => {
        state.loading = false;
        state.employers = res.data.data;
        state.last_page = res.data.meta.last_page;
      });
    };

    const seeMore = () => {
      if (state.last_page > state.param.page) {
        state.param.page += 1;
        state.loading = true;
        axios
          .get("/wapi/get-employers", { params: state.param })
          .then((res) => {
            state.loading = false;
            state.employers.push(...res.data.data);
          });
      }
    };

    const reset = () => {
      state.param = {
        page: 1,
        page_size: 12,
        search: "",
        sort: "",
      };
      getEmployers();
    };

    const filterSort = () => {
      getEmployers();
    };

    onMounted(() => {
      getEmployers();
    });

    return {
      ...toRefs(state),
      seeMore,
      filterSort,
      reset,
    };
  },
};
</script>

<style scoped></style>

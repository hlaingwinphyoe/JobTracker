<template>
  <section class="w-full gap-6 px-10 lg:px-24 py-5">
    <!-- Content -->
    <div>
      <div class="mb-3 flex justify-between items-center">
        <div class="text-gray-500 capitalize">Search Results</div>
        <div class="flex items-center">
          <span class="">
            <label for="sort" class="text-sm text-gray-500 mr-2">
              Order By:
            </label>
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
        </div>
      </div>
      <div>
        <div
          class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-4 lg:gap-8"
        >
          <div class="" v-for="employer in employers" :key="employer.id">
            <EmployerCard :employer="employer" />
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
        region: "",
        type: "",
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

    const filterSort = () => {
      getEmployers();
    };

    const getQuery = () => {
      let params = window.location.href.split("?");
      if (params.length == 2) {
        let vars = params[1].split("&");
        let getVars = {};
        let tmp = "";
        vars.forEach(function (v) {
          tmp = v.split("=");
          if (tmp.length == 2) getVars[tmp[0]] = tmp[1];
        });
        state.param.search = getVars.search;
        state.param.region = getVars.region;
        state.param.type = getVars.type;
      }
    };

    onMounted(() => {
      getQuery();
      getEmployers();
    });

    return {
      ...toRefs(state),
      seeMore,
      filterSort,
    };
  },
};
</script>

<style scoped></style>

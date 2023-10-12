<template>
  <div class="flex items-center">
    <div
      class="group relative mx-auto w-96 overflow-hidden rounded-[16px] bg-gray-300 p-[1.5px] transition-all duration-300 ease-in-out hover:bg-gradient-to-r hover:from-primary-500 hover:via-purple-500 hover:to-tertiary-500"
    >
      <div
        class="group-hover:animate-spin-slow invisible absolute -top-40 -bottom-40 left-10 right-10 bg-gradient-to-r from-transparent via-white/90 to-transparent group-hover:visible"
      ></div>
      <div class="relative rounded-[15px] overflow-hidden h-[26rem] bg-white">
        <div class="space-y-4">
          <a :href="'/job-lists' + jobPost.slug">
            <img
              class="rounded-t-lg"
              src="https://placehold.co/400x250"
              alt=""
            />
          </a>

          <div class="px-4 pb-5">
            <div class="flex items-center justify-between mb-4">
              <div class="flex gap-1.5 items-center">
                <a
                  :href="'/employer-lists/' + jobPost.owner_id"
                  class="cursor-pointer"
                >
                  <img
                    class="flex-shrink-0 w-8 h-8 rounded-full"
                    src="https://i.imgur.com/7D7I6dI.png"
                    alt=""
                  />
                </a>
                <div class="flex">
                  <a
                    :href="'/employer-lists/' + jobPost.owner_id"
                    class="text-sm hover:underline"
                    >{{ jobPost.owner }}</a
                  >
                </div>
              </div>
              <span>
                <a
                  href="#"
                  class="bg-tertiary-100 hover:bg-tertiary-200 text-tertiary-800 text-xs font-semibold px-2.5 py-1 rounded border border-tertiary-400 whitespace-nowrap"
                  >{{ jobPost.job_type }}</a
                >
              </span>
            </div>
            <a :href="'/job-lists/' + jobPost.slug">
              <h5 class="mb-4 text-lg capitalize hover:underline line-clamp-2">
                {{ jobPost.title }}
              </h5>
            </a>

            <div class="mb-2 flex justify-between items-center">
              <span class="text-sm me-3 text-gray-500 mb-3">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="icon icon-tabler icon-tabler-clock-hour-3 inline-flex items-center mb-[3px]"
                  width="15"
                  height="15"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                  <path d="M12 12h3.5" />
                  <path d="M12 7v5" />
                </svg>
                {{ jobPost.publish }}
              </span>
              <span class="text-sm text-gray-500 mb-3">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="icon icon-tabler icon-tabler-location inline-flex items-center mb-[3px]"
                  width="15"
                  height="15"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path
                    d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"
                  />
                </svg>
                {{ jobPost.region_name }}
              </span>
            </div>

            <div class="flex items-center justify-between">
              <h5 class="text-lg text-primary-500 font-semibold">
                {{ jobPost.salary }} Lakhs<span
                  class="text-sm text-gray-500 font-light"
                  >/Month</span
                >
              </h5>
              <span>
                <div
                  id="save-tooltip"
                  role="tooltip"
                  class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-500 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700"
                >
                  Saved Post
                  <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <a
                  href="javascript:void(0)"
                  @click="saveJob"
                  data-tooltip-target="save-tooltip"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-heart text-gray-500"
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
                    <path
                      d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"
                    />
                  </svg>
                </a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { onMounted, reactive, toRefs } from "vue";
export default {
  props: ["jobPost"],
  setup(props, { emit }) {
    const state = reactive({
      employee: "",
    });
    const saveJob = () => {
      axios
        .get(`/wapi/save-jobs/${state.employee.id}/${props.jobPost.id}`)
        .then((res) => {
          console.log("save jobs");
        });
    };

    onMounted(() => {
      axios.get("/wapi/get-auth-employee").then((res) => {
        state.employee = res.data.auth_employee;
      });
    });

    return {
      ...toRefs(state),
      saveJob,
    };
  },
};
</script>

<style></style>

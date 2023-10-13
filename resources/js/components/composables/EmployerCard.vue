<template>
  <div class="flex items-center">
    <div
      class="group relative mx-auto w-96 overflow-hidden rounded-[16px] bg-gray-300 p-[1.5px] transition-all duration-300 ease-in-out hover:bg-gradient-to-r hover:from-primary-500 hover:via-purple-500 hover:to-tertiary-500"
    >
      <div
        class="group-hover:animate-spin-slow invisible absolute -top-40 -bottom-40 left-10 right-10 bg-gradient-to-r from-transparent via-white/90 to-transparent group-hover:visible"
      ></div>
      <div class="relative rounded-[15px] bg-white p-6">
        <div class="space-y-4">
          <!-- <img src="https://nuxt.com/assets/home/ux-fast-light.svg" alt="" /> -->
          <img
            :src="employee.profile ? '/storage/profile/'+employee.profile : 'user.png'"
            class="employer-profile mx-auto block border-2 border-gray-300 rounded-full p-1"
            alt=""
          />
          <article class="pb-4">
            <div class="text-center my-3">
              <a
                :href="'/employer-lists/' + employee.id"
                class="hover:underline"
              >
                <h5 class="font-bold">{{ employee.name }}</h5>
              </a>
              <small class="text-gray-500 text-opacity-75">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="icon icon-tabler icon-tabler-building-community inline-flex items-center mb-[3px]"
                  width="17"
                  height="17"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path
                    d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"
                  />
                  <path d="M13 7l0 .01" />
                  <path d="M17 7l0 .01" />
                  <path d="M17 11l0 .01" />
                  <path d="M17 15l0 .01" />
                </svg>
                {{ employee.company }}
              </small>
            </div>
            <p class="flex items-center justify-between my-4">
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
                {{ employee.region_name }}
              </span>
              <span class="text-sm text-gray-500 mb-3">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="icon icon-tabler icon-tabler-briefcase inline-flex items-center mb-[3px]"
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
                    d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"
                  />
                  <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" />
                  <path d="M12 12l0 .01" />
                  <path d="M3 13a20 20 0 0 0 18 0" />
                </svg>
                {{ employee.industry }}
              </span>
            </p>
            <div class="text-center">
              <!-- <a
                :href="'/employer-lists/' + employee.id"
                class="border-2 border-primary-400 hover:bg-primary-500 hover:text-white hover:border-primary-500 p-3 rounded-lg"
                >{{ employee.job_count }} Open Jobs</a
              > -->
              <a
                :href="'/employer-lists/' + employee.id"
                class="relative inline-flex items-center justify-start px-6 py-3 overflow-hidden font-medium transition-all bg-transparent rounded border border-primary-500 group"
              >
                <span
                  class="w-48 h-48 rounded rotate-[-40deg] bg-primary-500 absolute bottom-0 left-0 -translate-x-full ease-out duration-500 transition-all translate-y-full mb-9 ml-9 group-hover:ml-0 group-hover:mb-32 group-hover:translate-x-0"
                ></span>
                <span
                  class="relative w-full text-left text-black transition-colors duration-300 ease-in-out group-hover:text-white"
                  >{{ employee.job_count }} Open Jobs</span
                >
              </a>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["employee"],
  setup() {},
};
</script>

<style scoped>
.employer-profile {
  width: 7rem;
  height: 7rem;
  border-radius: 50%;
}
</style>

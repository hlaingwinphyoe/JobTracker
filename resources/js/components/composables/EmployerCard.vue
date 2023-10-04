<template>
  <div class="bg-white border border-gray-200 rounded-lg shadow px-4 py-10">
    <img
      src="https://placehold.co/600x600"
      class="employer-profile mx-auto block"
      alt=""
    />
    <div class="text-center my-3">
      <a href="javascript:void(0)" class="hover:underline">
        <h5 class="font-bold">{{ employee.name }}</h5>
      </a>
      <small class="text-gray-500 text-opacity-75">{{ employee.company }}</small>
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
      <a href="javascript:void(0)" class="border-2 border-primary-400 hover:bg-primary-500 hover:text-white hover:border-primary-500 p-3 rounded-lg"
        >{{ employee.job_count }} Open Jobs</a
      >
    </div>
  </div>
</template>

<script>
export default {
  props: ['employee'],
  setup() {

  }
};
</script>

<style scoped>
.employer-profile {
  width: 7rem;
  height: 7rem;
  border-radius: 50%;
}
</style>

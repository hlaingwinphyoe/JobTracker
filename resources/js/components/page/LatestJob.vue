<template>
  <!-- Category Tab -->

  <ul
    class="flex flex-wrap items-center mb-10 justify-center text-sm font-medium text-center text-gray-500"
  >
    <li class="mr-2">
      <a
        href="#"
        class="inline-block px-4 py-3 rounded-lg bg-primary-500 text-white hover:text-white"
        >All</a
      >
    </li>
    <li class="mr-2" v-for="item in types" :key="item.id">
      <a
        href="#"
        class="inline-block px-4 py-3 rounded-lg hover:text-gray-900 hover:bg-gray-100"
        >{{ item.name }}</a
      >
    </li>
  </ul>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 lg:gap-8">
    <div class="" v-for="i in 12" :key="i">
      <Card />
    </div>
  </div>

  <div class="text-center mt-10">
    <a
      href="javascript:void(0)"
      class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-primary-500 border border-transparent rounded-md shadow-sm hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600"
    >
      See More
    </a>
  </div>
</template>

<script>
import Card from "../composables/Card.vue";
export default {
  components: {
    Card,
  },
  props: ["types"],
};
</script>

<style></style>

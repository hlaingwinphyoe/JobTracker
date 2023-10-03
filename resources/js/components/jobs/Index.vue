<template>
  <section class="container mx-auto mt-5">
    <!-- Category Tab -->
    <div class="flex flex-wrap gap-2 mb-5 items-center">
      <div class="hidden lg:block cursor-pointer" @click.prevent="prev">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="w-6 h-6 text-secondary-500"
          viewBox="0 0 24 24"
        >
          <path
            fill="currentColor"
            d="M11.8 13H15q.425 0 .713-.288T16 12q0-.425-.288-.713T15 11h-3.2l.9-.9q.275-.275.275-.7t-.275-.7q-.275-.275-.7-.275t-.7.275l-2.6 2.6q-.3.3-.3.7t.3.7l2.6 2.6q.275.275.7.275t.7-.275q.275-.275.275-.7t-.275-.7l-.9-.9Zm.2 9q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Z"
          />
        </svg>
      </div>
      <div class="w-11/12">
        <Carousel
          ref="refCarousel"
          v-bind="settings"
          :breakpoints="breakpoints"
          :itemsToScroll="2"
        >
          <Slide
            @click.prevent="chooseCategory('NEW')"
            class="text-center cursor-pointer inline-block px-4 py-3 bg-primary-500 rounded-lg text-white"
          >
            <span class="carousel__item text-sm font-medium">All</span>
          </Slide>
          <template v-for="item in categories" :key="item.key">
            <Slide
              @click.prevent="chooseCategory(item.key)"
              class="text-center cursor-pointer inline-block px-4 py-3 rounded-lg hover:text-gray-900 hover:bg-gray-100"
            >
              <span class="carousel__item text-sm font-medium">{{
                item.name
              }}</span>
            </Slide>
          </template>
        </Carousel>
      </div>
      <div class="hidden lg:block cursor-pointer" @click.prevent="next">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="w-6 h-6 text-secondary-500"
          viewBox="0 0 24 24"
        >
          <path
            fill="currentColor"
            d="m12 16l4-4l-4-4l-1.4 1.4l1.6 1.6H8v2h4.2l-1.6 1.6L12 16Zm0 6q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Z"
          />
        </svg>
      </div>
    </div>
  </section>

  <!-- Content -->
  <section class="w-full gap-6 px-24">
    <div>
      <div class="mb-3 flex justify-between items-center">
        <h1 class="text-2xl capitalize font-semibold">All Jobs</h1>
        <div class="flex items-center">
          <span class="">
            <label for="sort" class="text-sm text-gray-500"> Salary: </label>
            <select
              id="sort"
              name="sort"
              class="bg-transparent border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-500 focus:border-primary-500 p-2.5"
            >
              <option selected>Default</option>
              <option value="desc">Low to High</option>
              <option value="asc">High to Low</option>
            </select>
          </span>
          <a
            href="/employer-lists"
            class="p-2.5 bg-red-500 rounded-lg ml-2 text-white"
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
          </a>
        </div>
      </div>
      <div>
        <div
          class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4"
        >
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
      </div>
    </div>
  </section>
</template>

<script>
import { reactive, ref, toRefs } from "vue";
import Card from "../composables/Card.vue";
import "vue3-carousel/dist/carousel.css";
import { Carousel, Navigation, Slide } from "vue3-carousel";
export default {
  components: {
    Card,
    Carousel,
    Navigation,
    Slide,
  },
  props: ["categories"],
  setup() {
    const state = reactive({
      settings: {
        itemsToShow: 1,
        snapAlign: "center",
      },
      breakpoints: {
        1024: {
          itemsToShow: 5,
          snapAlign: "start",
        },
        1280: {
          itemsToShow: 6,
          snapAlign: "start",
        },
        1536: {
          itemsToShow: 7,
          snapAlign: "start",
        },
      },
    });

    const chooseCategory = () => {};

    const refCarousel = ref(null);

    const next = () => {
      refCarousel.value.data.next();
    };

    const prev = () => {
      refCarousel.value.data.prev();
    };

    return {
      ...toRefs(state),
      chooseCategory,
      refCarousel,
      next,
      prev,
    };
  },
};
</script>

<style scoped></style>

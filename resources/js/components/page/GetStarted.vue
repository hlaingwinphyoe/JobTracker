<template>
  <nav class="absolute top-0 left-0 bg-gray-50 w-full z-20">
    <div
      class="container flex flex-wrap items-center justify-between mx-auto p-4"
    >
      <div class="flex items-center">
        <a href="/" class="flex items-center">
          <img src="/logo.png" class="h-8 mr-3" alt="Logo" />
          <span
            class="self-center text-black text-2xl font-semibold whitespace-nowrap"
            >{{ siteName }}</span
          >
        </a>

        <nav
          class="hidden md:flex flex-wrap items-center mb-5 text-base md:mb-0 md:pl-8 md:ml-8 md:border-l md:border-gray-200"
        >
          <a
            href="/"
            class="mr-5 leading-6 text-gray-500 hover:text-black relative text-base w-fit block after:block after:content-[''] after:absolute after:h-[2px] after:bg-primary-500 after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-left"
          >
            Home
          </a>

          <a
            href="/job-lists"
            class="mr-5 leading-6 text-gray-500 hover:text-black relative text-base w-fit block after:block after:content-[''] after:absolute after:h-[2px] after:bg-primary-500 after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-left"
          >
            Browse Jobs
          </a>

          <a
            href="/employer-lists"
            class="mr-5 leading-6 text-gray-500 hover:text-black relative text-base w-fit block after:block after:content-[''] after:absolute after:h-[2px] after:bg-primary-500 after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-left"
          >
            Employers
          </a>
        </nav>
      </div>

      <div class="flex md:order-2">
        <button
          @click="openRegisterModal"
          type="button"
          class="text-white bg-primary-500 hover:bg-primary-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-md text-sm px-4 py-2.5 text-center mr-3 md:mr-0"
        >
          Sign Up
        </button>
      </div>
    </div>
  </nav>
  <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
    <h1
      class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-black md:text-5xl lg:text-6xl"
    >
      Recruit Faster and Grow your Employer Brand!
    </h1>
    <p
      class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48"
    >
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis
      repellendus eius qui unde ratione nisi facilis minus exercitationem rem
      magnam incidunt dicta sint atque inventore quaerat, necessitatibus sed
      nostrum dolorem!
    </p>
    <div
      class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4"
    >
      <button
        type="button"
        @click="openLoginModal"
        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-primary-500 hover:bg-primary-600 focus:ring-4 focus:ring-primary-300"
      >
        Company Login
        <svg
          class="w-3.5 h-3.5 ml-2"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 14 10"
        >
          <path
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M1 5h12m0 0L9 1m4 4L9 9"
          />
        </svg>
      </button>
      <a
        href="/faq"
        class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 text-base font-medium text-center text-black rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400"
      >
        Learn more
      </a>
    </div>
  </div>

  <Login v-model:login="login" @open-register="openRegisterModal" />
  <Register v-model:open="open" @open-login="openLoginModal" />
</template>

<script>
import { computed, reactive, toRefs } from "vue";
import Login from "../auth/Login.vue";
import Register from "../auth/Register.vue";
export default {
  components: {
    Login,
    Register,
  },
  setup() {
    const state = reactive({
      login: false,
      open: false,
    });
    const openLoginModal = () => {
      state.open = false;
      state.login = !state.login;
      document.body.classList.add("overflow-hidden");
    };

    const openRegisterModal = () => {
      state.login = false;
      state.open = !state.open;
      document.body.classList.add("overflow-hidden");
    };
    return {
      ...toRefs(state),
      openLoginModal,
      openRegisterModal,
      siteName: computed(() => import.meta.env.VITE_APP_NAME),
    };
  },
};
</script>

<style></style>

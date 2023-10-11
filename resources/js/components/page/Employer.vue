<template>
  <section class="container mx-auto lg:px-12 mt-8 mb-16 relative">
    <div
      class="bg-tertiary-400 rounded-ss-[5rem] rounded-ee-[5rem] px-8 h-[28rem] z-30 drop-shadow-md relative flex flex-col-reverse md:flex-row items-center justify-center"
    >
      <div class="flex flex-col justify-center items-start gap-5 pl-8">
        <h1 class="text-3xl md:text-6xl text-gray-200 font-semibold">
          <span
            class="text-4xl md:text-7xl text-transparent font-extrabold bg-clip-text bg-gradient-to-r from-secondary-500 to-gray-500"
            >Advertise
          </span>
          Your Jobs To Millions Of Users
        </h1>
        <div class="relative inline-flex group">
          <div
            class="absolute transitiona-all duration-1000 opacity-70 -inset-px bg-gradient-to-r from-primary-800 via-tertiary-500 to-tertiary-700 rounded-xl blur-lg group-hover:opacity-100 group-hover:-inset-1 group-hover:duration-200 animate-tilt"
          ></div>
          <a
            href="#"
            title="Get quote now"
            class="relative inline-flex items-center justify-center px-6 py-2.5 text-lg font-bold text-white transition-all duration-200 bg-gray-900 font-pj rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
            role="button"
            >Post a job now
          </a>
        </div>
      </div>
      <img src="/images/collaborate.png" class="h-56 md:h-[30rem]" alt="" />
    </div>
    <div
      class="bg-tertiary-300 bg-opacity-70 rounded-ss-[5rem] rounded-ee-[5rem] w-[75vw] h-[28rem] absolute left-16 -bottom-5 drop-shadow-sm z-20"
    ></div>
  </section>

  <Register v-model:open="open" />
</template>

<script>
import { reactive, toRefs } from "vue";
import Register from "../auth/Register.vue";
export default {
  components: { Register },
  setup() {
    const state = reactive({
      open: false,
    });
    const openRegisterModal = () => {
      state.open = !state.open;
      document.body.classList.add("overflow-hidden");
    };
    return {
      ...toRefs(state),
      openRegisterModal,
    };
  },
};
</script>

<style></style>

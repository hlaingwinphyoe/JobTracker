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
        <button
          @click="openRegisterModal"
          type="button"
          class="btn btn-dark hover-border-1"
        >
          <span>Post a job now</span>
        </button>
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

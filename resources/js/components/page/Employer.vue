<template>
  <section class="container mx-auto mt-8 mb-16 relative">
    <div
      class="bg-tertiary-400 rounded-ss-[5rem] rounded-ee-[5rem] px-8 h-[28rem] grid grid-cols-2 gap-4 z-30 drop-shadow-md relative"
    >
      <div class="flex flex-col justify-center items-start gap-5 pl-8">
        <h1 class="text-6xl text-gray-200 font-semibold">
          <span
            class="text-7xl text-transparent font-extrabold bg-clip-text bg-gradient-to-r from-secondary-500 to-gray-500"
            >Advertise
          </span>
          Your Jobs To Millions Of Users
        </h1>
        <button
          @click="openRegisterModal"
          type="button"
          class="text-white bg-secondary-600 hover:bg-secondary-700 focus:ring-2 focus:outline-none focus:ring-secondary-400 font-medium rounded-lg px-5 py-2.5 text-center"
        >
          Post a job now
        </button>
      </div>
      <img src="/images/collaborate.png" class="h-[30rem]" alt="" />
    </div>
    <div
      class="bg-tertiary-300 bg-opacity-70 rounded-ss-[5rem] rounded-ee-[5rem] w-[78.5vw] h-[28rem] absolute left-12 -bottom-6 drop-shadow-sm z-20"
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

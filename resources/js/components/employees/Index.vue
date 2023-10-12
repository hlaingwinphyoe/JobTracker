<template>
  <div class="relative">
    <img
      :src="employee.profile ? employee.profile : '/user.png'"
      class="h-32 w-32 p-3 mx-auto rounded-full border-2 border-tertiary-500 object-contain mb-3 md:mb-0"
      alt="user"
    />
    <button
      @click="openUpload"
      class="absolute p-2 text-gray-300 bg-gray-200 bottom-1 rounded-full right-[60px] hover:bg-gray-300"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="icon icon-tabler icon-tabler-camera-filled text-black"
        width="22"
        height="22"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        fill="none"
        stroke-linecap="round"
        stroke-linejoin="round"
      >
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path
          d="M15 3a2 2 0 0 1 1.995 1.85l.005 .15a1 1 0 0 0 .883 .993l.117 .007h1a3 3 0 0 1 2.995 2.824l.005 .176v9a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-9a3 3 0 0 1 2.824 -2.995l.176 -.005h1a1 1 0 0 0 1 -1a2 2 0 0 1 1.85 -1.995l.15 -.005h6zm-3 7a3 3 0 0 0 -2.985 2.698l-.011 .152l-.004 .15l.004 .15a3 3 0 1 0 2.996 -3.15z"
          stroke-width="0"
          fill="currentColor"
        />
      </svg>
    </button>
  </div>

  <div class="mt-4 text-center">
    <h4 class="text-xl">{{ employee.name }}</h4>
    <p class="text-gray-500">
      {{ employee.email }}
    </p>
  </div>

  <UploadModal v-model:upload="uploadModal" :employee_id="employee.id" />
</template>

<script>
import { computed, reactive, toRefs } from "vue";
import UploadModal from "./Upload.vue";
export default {
  props: ["employee"],
  components: {
    UploadModal,
  },
  setup() {
    const state = reactive({
      uploadModal: false,
    });

    const openUpload = () => {
      state.uploadModal = !state.uploadModal;
      document.body.classList.add("overflow-hidden");
    };

    return {
      ...toRefs(state),
      openUpload,
    };
  },
};
</script>

<style></style>

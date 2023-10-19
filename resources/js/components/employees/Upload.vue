<template>
  <section
    id="searchModal"
    class="overflow-x-hidden fixed top-0 left-0 w-full h-full inset-0 z-50"
    v-if="upload"
  >
    <div
      class="relative md:px-4 md:flex md:items-center md:justify-center min-h-full"
    >
      <div
        class="bg-secondary-500 bg-opacity-70 w-full h-full absolute z-10 overscroll-contain"
        @click.prevent="closeModal"
      ></div>

      <div
        class="bg-white rounded-3xl md:p-4 z-50 md:m-4 relative h-auto md:min-h-fit w-full md:max-w-2xl"
      >
        <div class="p-6 space-y-6 mb-5">
          <h4 class="text-2xl font-semibold text-secondary-600">
            Change Profile
          </h4>
          <button
            @click="closeModal"
            class="absolute top-0 right-5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
          >
            <svg
              class="w-3 h-3"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 14 14"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
              />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>

          <div class="space-y-4">
            <div class="flex items-center justify-center gap-6 w-full">
              <div v-if="imageUrl">
                <div
                  class="overflow-hidden cursor-pointer p-2 rounded relative group"
                >
                  <div
                    class="rounded h-full group-hover:bg-gray-200 z-50 opacity-0 group-hover:opacity-80 group-hover:-translate-y-2 transition duration-300 ease-in-out cursor-pointer absolute inset-x-0 -bottom-2 text-black flex items-center"
                  >
                    <div>
                      <div
                        class="transform-gpu p-4 space-y-3 text-xl group-hover:opacity-100 group-hover:translate-y-3 translate-x-12 translate-y-4 pb-10 transition duration-300 ease-in-out"
                      >
                        <div @click="removeImage" class="opacity-100">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-trash-x-filled"
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
                              d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16zm-9.489 5.14a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z"
                              stroke-width="0"
                              fill="currentColor"
                            />
                            <path
                              d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z"
                              stroke-width="0"
                              fill="currentColor"
                            />
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                  <img
                    :src="imageUrl"
                    class="object-contain w-full aspect-auto group-hover:scale-110 transition duration-300 ease-in-out h-36 mb-3 md:mb-0"
                    alt=""
                  />
                </div>
              </div>
              <label
                for="dropzone-file"
                class="flex flex-col items-center justify-center p-4 h-40 border-2 border-gray-200 border-dashed rounded cursor-pointer bg-gray-200 dark:hover:bg-bray-800 hover:bg-gray-300"
              >
                <div
                  class="flex flex-col items-center justify-center pt-5 pb-6"
                >
                  <svg
                    class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 20 16"
                  >
                    <path
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"
                    />
                  </svg>
                  <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                    <span class="font-semibold">Click to upload</span>
                  </p>
                  <p class="text-xs text-gray-500 dark:text-gray-400">
                    SVG, PNG, JPG (MAX. 400x400px)
                  </p>
                </div>
                <input
                  id="dropzone-file"
                  type="file"
                  accept="image/*"
                  class="hidden"
                  @change="handleChange($event)"
                  @click="$event.target.value = ''"
                />
              </label>
            </div>

            <hr
              class="h-1 border-0 bg-gradient-to-r from-tertiary-500 via-tertiary-400 to-tertiary-500"
            />

            <!-- Avatars -->
            <ul
              class="grid w-full gap-2 grid-cols-4 md:grid-cols-5 lg:grid-cols-6"
            >
              <li v-for="avatar in avatars" :key="avatar.name">
                <input
                  type="radio"
                  :id="avatar.name"
                  name="avatar_name"
                  v-model="avatarForm.avatar_name"
                  :value="avatar.name"
                  class="hidden peer"
                  required
                />
                <label
                  :for="avatar.name"
                  class="inline-flex items-center justify-center w-full px-2 py-3 border-2 rounded cursor-pointer border-secondary-100 peer-checked:text-white peer-checked:border-tertiary-500 peer-checked:shadow-lg text-gray-400 hover:border-tertiary-400"
                >
                  <div class="block">
                    <div class="w-full mb-2">
                      <img
                        :src="avatar.url"
                        class="h-12 object-contain mx-auto rounded"
                        :alt="avatar.name"
                      />
                    </div>
                  </div>
                </label>
              </li>
            </ul>

            <button
              type="button"
              @click="onSubmit"
              class="normal-font text-white bg-tertiary-500 enabled:hover:bg-tertiary-600 focus:ring-2 focus:outline-none focus:ring-tertiary-300 font-medium rounded text-sm px-5 py-2.5 mt-3 block mb-0 mx-auto disabled:opacity-50 disabled:cursor-not-allowed"
              :disabled="!avatarForm.avatar_name && !imageUrl"
            >
              Upload
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { computed, onMounted, reactive, toRaw, toRefs, watch } from "vue";
export default {
  props: ["upload", "employee_id"],
  emits: ["update:upload"],
  setup(props, { emit }) {
    const state = reactive({
      form: new FormData(),
      avatarForm: {},
      avatars: [],
      imageRef: "",
      imageUrl: "",
    });

    watch(
      () => state.imageRef,
      (newVal, oldVal) => {
        if (!(state.imageRef instanceof File)) {
          return;
        }
        let fileReader = new FileReader();

        fileReader.readAsDataURL(state.imageRef);

        fileReader.addEventListener("load", function () {
          state.imageUrl = fileReader.result;
        });
      }
    );

    const handleChange = () => {
      if (event.target.files.length === 0) {
        state.imageRef = "";
        state.imageUrl = "";
        return;
      }
      state.avatarForm = {};
      state.imageRef = event.target.files[0];
    };

    const onSubmit = () => {
      if (state.avatarForm.avatar_name) {
        axios
          .post(`/wapi/avatar-upload/${props.employee_id}`, state.avatarForm)
          .then((res) => {
            closeModal();
            location.reload();
          });
      }
      else {
        state.form.append("media", state.imageRef);
        axios
          .post(`/wapi/image-upload/${props.employee_id}`, state.form)
          .then((res) => {
            closeModal();
            location.reload();
          });
      }
    };

    const closeModal = () => {
      emit("update:upload", false);
      state.avatarForm = {};
      state.form = new FormData();
      document.body.classList.remove("overflow-hidden");

      removeImage();
    };

    const removeImage = () => {
      state.imageRef = "";
      state.imageUrl = "";
    };

    onMounted(() => {
      axios.get("/wapi/get-avatars").then((res) => {
        state.avatars = res.data;
      });
    });

    return {
      ...toRefs(state),
      closeModal,
      removeImage,
      handleChange,
      onSubmit,
    };
  },
};
</script>

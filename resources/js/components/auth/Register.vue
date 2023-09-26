<template>
  <div
    class="modal modal-xl d-block bg-black bg-opacity-50"
    id="registerModal"
    tabindex="-1"
    v-if="open"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow" style="border-radius: 3em">
        <div class="row">
          <div class="col-md-7">
            <div class="modal-body relative p-4">
              <button
                class="btn-close position-absolute"
                style="right: 30px; top: 30px"
                @click="closeModal"
              ></button>
              <img src="logo.png" class="logo d-block mx-auto" alt="" />
              <h4 class="text-center text-primary fw-bold text-uppercase">
                Welcome! Log In
              </h4>

              <form class="row g-3 m-1">
                <div class="col-12">
                  <label for="name" class="form-label"
                    >Name <span class="text-danger">*</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.name"
                    id="name"
                    autocomplete="off"
                    required
                  />
                  <div v-if="errors['name']" class="text-danger fw-bold small">
                    {{ errors["name"][0] }}
                  </div>
                </div>
                <div class="col-12">
                  <label for="email" class="form-label"
                    >Email <span class="text-danger">*</span></label
                  >
                  <input
                    type="email"
                    class="form-control"
                    v-model="form.email"
                    id="email"
                    required
                  />
                  <div v-if="errors['email']" class="text-danger fw-bold small">
                    {{ errors["email"][0] }}
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="phone" class="form-label"
                    >Phone <span class="text-danger">*</span></label
                  >
                  <input
                    type="tel"
                    v-model="form.phone"
                    class="form-control"
                    id="phone"
                    required
                  />
                  <div v-if="errors['phone']" class="text-danger fw-bold small">
                    {{ errors["phone"][0] }}
                  </div>
                </div>
                <div class="col-md-6 position-relative">
                  <label for="password" class="form-label"
                    >Password <span class="text-danger">*</span></label
                  >
                  <input
                    :type="passwordField"
                    class="form-control"
                    v-model="form.password"
                    id="password"
                    autocomplete="off"
                    required
                  />
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="position-absolute"
                    style="
                      top: 42px;
                      right: 20px;
                      height: 20px;
                      cursor: pointer;
                    "
                    @click="showPassword"
                  >
                    <path
                      v-if="passwordField === 'password'"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88"
                    />
                    <path
                      v-else
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                    />
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                  </svg>
                  <div
                    v-if="errors['password']"
                    class="text-danger fw-bold small"
                  >
                    {{ errors["password"][0] }}
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="company" class="form-label"
                    >Company Name <span class="text-danger">*</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.company_name"
                    id="company"
                  />
                  <div
                    v-if="errors['company_name']"
                    class="text-danger fw-bold small"
                  >
                    {{ errors["company_name"][0] }}
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="type" class="form-label"
                    >Company Type <span class="text-danger">*</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.company_type"
                    id="type"
                  />
                  <div
                    v-if="errors['company_type']"
                    class="text-danger fw-bold small"
                  >
                    {{ errors["company_type"][0] }}
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="inputAddress" class="form-label"
                    >Location <span class="text-danger">*</span></label
                  >
                  <select class="form-select" v-model="form.region">
                    <option selected>Choose Region</option>
                    <option
                      v-for="region in regionList"
                      :key="region.id"
                      :value="region.id"
                    >
                      {{ region.name }}
                    </option>
                  </select>
                  <div
                    v-if="errors['region']"
                    class="text-danger fw-bold small"
                  >
                    {{ errors["region"][0] }}
                  </div>
                </div>
                <div class="col-12">
                  <label for="description" class="form-label"
                    >Description
                  </label>
                  <textarea
                    class="form-control"
                    v-model="form.desc"
                    id="description"
                    rows="3"
                  ></textarea>
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      id="gridCheck"
                      required
                    />
                    <label class="form-check-label" for="gridCheck">
                      I accept terms & conditions
                    </label>
                  </div>
                </div>
                <div class="col-12">
                  <button @click.prevent="onSubmit" class="btn btn-primary" :disabled="isLoading">
                    <div v-if="isLoading" class="spinner-border text-white spinner-border-sm" role="status">
                      <span class="visually-hidden">Loading...</span>
                    </div>
                    <span v-else>Sign Up</span>
                  </button>
                  <a href="javascript:void(0)" class="ms-3"
                    >I'm a candidate. Register Here</a
                  >
                </div>
              </form>
            </div>
          </div>

          <div
            class="col-5 bg-primary shadow-lg"
            style="border-radius: 0 3em 3em 0"
          >
            <img src="images/employer_sign_up.svg" class="h-100 w-100" alt="" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { computed, onMounted, reactive, toRaw, toRefs } from "vue";
export default {
  props: ["open"],
  emits: ["update:open"],
  setup(props, { emit }) {
    const state = reactive({
      passwordField: "password",
      form: {
        name: "",
        phone: "",
        email: "",
        password: "",
        company_name: "",
        company_type: "",
        region: "",
        desc: "",
      },
      isLoading: false,
      regionList: [],
      errors: [],
    });

    const showPassword = () => {
      state.passwordField =
        state.passwordField === "password" ? "text" : "password";
    };

    const onSubmit = () => {
      state.isLoading = true;
      axios
        .post("/wapi/employer-register", state.form)
        .then((res) => {
          state.isLoading = false;
          closeModal();
          setTimeout(() => {
            location.reload();
          }, 500);
        })
        .catch((err) => {
          state.isLoading = false;
          if (err.response.status === 422) {
            state.errors = toRaw(err.response.data.errors);
          }
        });
    };

    const closeModal = () => {
      emit("update:open", false);
      state.form = {
        name: "",
        phone: "",
        email: "",
        password: "",
        company_name: "",
        company_type: "",
        region: "",
        desc: "",
      };
      document.body.classList.remove("overflow-hidden");
    };

    onMounted(() => {
      axios.get("/wapi/get-regions").then((res) => {
        state.regionList = res.data.regions;
      });
    });

    return {
      ...toRefs(state),
      closeModal,
      showPassword,
      onSubmit,
      siteName: computed(() => import.meta.env.VITE_APP_NAME),
    };
  },
};
</script>

<style></style>

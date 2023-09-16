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
              <!-- <img src="logo.png" class="logo d-block mx-auto" alt="" /> -->
              <h4 class="text-center text-primary fw-bold text-uppercase">
                Become An Employer
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
                </div>
                <div class="col-md-6">
                  <label for="phone" class="form-label"
                    >Phone <span class="text-danger">*</span></label
                  >
                  <input type="tel" class="form-control" id="phone" required />
                </div>
                <div class="col-md-6">
                  <label for="password" class="form-label"
                    >Password <span class="text-danger">*</span></label
                  >
                  <input
                    type="password"
                    class="form-control"
                    v-model="form.password"
                    id="password"
                    autocomplete="off"
                    required
                  />
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
                </div>
                <div class="col-md-4">
                  <label for="inputAddress" class="form-label"
                    >Location <span class="text-danger">*</span></label
                  >
                  <select
                    class="form-select"
                    v-model="form.region_id"
                  >
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
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
                  <button type="submit" class="btn btn-primary">Sign Up</button>
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
            <!-- <img
              src="images/employer_sign_up.svg"
              class="h-100 w-100"
              alt=""
            /> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { computed, onMounted, reactive, toRefs } from "vue";
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
        region_id: "",
        desc: "",
      },
    });

    const closeModal = () => {
      emit("update:open", false);
      state.form = {
        name: "",
        phone: "",
        email: "",
        password: "",
        company_name: "",
        company_type: "",
        region_id: "",
        desc: "",
      };
      document.body.classList.remove("overflow-hidden");
    };

    onMounted(() => {});

    return {
      ...toRefs(state),
      closeModal,
      siteName: computed(() => import.meta.env.VITE_APP_NAME),
    };
  },
};
</script>

<style></style>

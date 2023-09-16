<template>
  <section class="feature-job">
    <div class="container">
      <div class="row my-5 align-items-center justify-content-between">
        <div class="col-12 col-lg-6">
          <h1 class="display-3 mb-5 fw-bold">
            Hire Expirence Candidates For Your Business
          </h1>

          <button class="btn btn-primary" @click="openRegisterModal">
            Become Employer
          </button>
        </div>
        <div class="col-12 col-lg-6">
          <div>
            <!-- <img
              src="images/photo-1.jpg"
              class="job-image d-block mx-auto"
              alt=""
            /> -->
          </div>
        </div>
      </div>
    </div>
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

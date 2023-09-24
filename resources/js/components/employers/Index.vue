<template>
  <section class="container mt-5">
    <div class="row">
      <div class="col-12">
        <div class="d-flex align-items-center justify-content-between">
          <span
            >Showing <span class="fw-bold">1-10</span> of
            <span class="fw-bold">12800</span> employers</span
          >
          <div class="d-flex align-items-center">
            <span class="text-nowrap">Sort By: </span>
            <select name="sort" id="" class="form-select mx-2">
              <option value="desc">Name Descending</option>
              <option value="asc">Name Asecending</option>
            </select>
            <button class="btn btn-danger text-nowrap">
              <i class="fa-solid fa-rotate"></i> Reset
            </button>
          </div>
        </div>
        <div class="row gy-4 mt-2">
          <div class="col-6 col-md-4 col-lg-3" v-for="i in 8" :key="i">
            <EmployerCard />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import EmployerCard from "../composables/EmployerCard.vue";
export default {
  props: ["types"],
  components: {
    EmployerCard,
  },
};
</script>

<style></style>

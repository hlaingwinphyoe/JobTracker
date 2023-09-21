<template>
  <section class="container mt-5">
    <div class="row">
      <div class="col-md-4 col-lg-3">
        <div class="position-sticky" style="top: 5.5em;">
          <div class="card border-0 rounded-5 bg-white shadow-sm">
            <div class="card-body p-4">
              <h5 class="fw-bold">Type Of Jobs</h5>
              <div class="my-3">
                <div
                  class="form-check mb-3"
                  v-for="item in types"
                  :key="item.id"
                >
                  <input
                    class="form-check-input"
                    type="checkbox"
                    :value="item.id"
                    :id="`job_type_` + item.id"
                  />
                  <label class="form-check-label" :for="`job_type_` + item.id">
                    {{ item.name }}
                  </label>
                </div>
              </div>

              <h5 class="fw-bold">Salary Range</h5>
              <div class="my-3">
                <div class="form-check mb-3">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value="10-50"
                    id="salary_range"
                  />
                  <label class="form-check-label" for="salary_range">
                    10 - 50 Lakhs
                  </label>
                </div>
                <div class="form-check mb-3">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value="50-100"
                    id="salary_range"
                  />
                  <label class="form-check-label" for="salary_range">
                    50 - 100 Lakhs
                  </label>
                </div>
                <div class="form-check mb-3">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value="100-200"
                    id="salary_range"
                  />
                  <label class="form-check-label" for="salary_range">
                    100 - 200 Lakhs
                  </label>
                </div>
                <div class="form-check mb-3">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value="200-500"
                    id="salary_range"
                  />
                  <label class="form-check-label" for="salary_range">
                    200 - 500 Lakhs
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value="500"
                    id="salary_range"
                  />
                  <label class="form-check-label" for="salary_range">
                    Above 500 Lakhs
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8 col-lg-9">
        <div class="d-flex align-items-center justify-content-between">
          <span
            >Showing <span class="fw-bold">1-10</span> of
            <span class="fw-bold">12800</span> jobs</span
          >
          <div class="d-flex align-items-center">
            <span class="text-nowrap">Sort By: </span>
            <select name="sort" id="" class="form-select mx-2">
              <option value="desc">Newest Jobs</option>
              <option value="asc">Oldest Jobs</option>
            </select>
            <button class="btn btn-danger text-nowrap"><i class="fa-solid fa-rotate"></i> Reset</button>
          </div>
        </div>
        <div class="row gy-4 mt-2">
          <div class="col-12 col-md-6 col-lg-4" v-for="i in 9" :key="i">
            <Card />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Card from "../composables/Card.vue";
export default {
  props: ["types"],
  components: {
    Card,
  },
};
</script>

<style scoped>
.sticky {
  position: -webkit-sticky;
  position: sticky;
  top: 10px;
}
</style>

<template>
  <div class="card border-0 rounded-4 bg-white shadow-sm">
    <div class="card-body p-4">
      <img
        src="https://placehold.co/600x600"
        class="employer-profile mx-auto d-block"
        alt=""
      />
      <div class="text-center my-3">
        <a href="javascript:void(0)" class="text-decoratin-none">
          <h5 class="text-primary fw-bold">Jadon Ardam</h5>
        </a>
        <small class="text-secondary text-opacity-75"
          >Startup Company Ltd.</small
        >
      </div>
      <p
        class="d-flex flex-column align-items-center justify-content-between my-3"
      >
        <small class="mb-2">
          <i class="fa-solid fa-earth-asia"></i>
          Mandalay
        </small>
        <small>
          <i class="fa-solid fa-briefcase"></i>
          Software House
        </small>
      </p>
      <div class="text-center mb-2">
        <a href="javascript:void(0)" class="btn btn-outline-primary"
          >12 Open Jobs</a
        >
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
.employer-profile {
  width: 7rem;
  height: 7rem;
  border-radius: 50%;
}
</style>

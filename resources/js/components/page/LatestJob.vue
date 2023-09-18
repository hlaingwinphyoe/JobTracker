<template>
  <!-- Category Tab -->
  <div class="py-2">
    <ul class="nav nav-pills align-items-center justify-content-center">
      <li class="nav-item">
        <a class="nav-link active" href="#">All</a>
      </li>
      <li class="nav-item" v-for="item in types" :key="item.id">
        <a class="nav-link" href="#">{{ item.name }}</a>
      </li>
    </ul>
  </div>
  <ul class="row list-unstyled gy-4 mt-3">
    <li class="col-12 col-md-3" v-for="i in 8" :key="i">
      <!-- Job Card -->
      <Card />
    </li>
  </ul>

  <div class="text-center pt-3">
    <a href="javascript:void(0)" class="btn btn-primary">
      See More
    </a>
  </div>
</template>

<script>
import Card from "../composables/Card.vue";
export default {
  components: {
    Card,
  },
  props: ['types'],
};
</script>

<style></style>

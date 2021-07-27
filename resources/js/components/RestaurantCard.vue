<template>
  <div class="card" style="width: 18rem; margin: 5px">
    <div class="card-body">
      <h5 class="card-title">{{ name }}</h5>
      <em class="card-title">{{ email }}</em><br>
      <em class="card-title">{{ address }}</em>
    </div>
  </div>
</template>

<script>
export default {
  name: "RestaurantCard",
  props: {
    name: String,
    email: String,
    address: String,
  },
};
</script>
<template>
  <div class="">
    <div class="card d-flex badge" style="width: 18rem; margin: 5px">
      <a :href="link">
        <div class="d-flex justify-content-center">
          <span class="badge badge-primary ml-2" v-for="type in types" :key="type.id">{{ type.name }}</span>
        </div>
        <div class="card-body">
          <img src="img/pancake-burger-200x150.jpg" alt="">
          <h5 class="card-title">{{ name }}</h5>
          <em class="card-title">{{ email }}</em><br/>
          <em class="card-title">{{ address }}</em>
        </div>
      </a>
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
    link: String,
    types: Array,
  },
};
</script>
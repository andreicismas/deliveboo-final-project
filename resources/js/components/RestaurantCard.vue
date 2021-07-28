<template>
  <div>
    <div class="card" style="width: 18rem; margin: 5px">
      <a :href="link">
        <span v-for="type in types" :key="type.id">{{ type.name }}</span>
        <div class="card-body">
          <h5 class="card-title">{{ name }}</h5>
          <em class="card-title">{{ email }}</em
          ><br />
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
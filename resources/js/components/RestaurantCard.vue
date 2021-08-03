<template>
  <div>
    <a :href="link">
      <div class="restaurant-card">
        <div class="type-container">
          <span class="type-item" v-for="type in types" :key="type.id">{{ type.name }}</span>
        </div>
        <div class="img-container">
          <img :src="img" alt="">
        </div>
        <h5>{{ name }}</h5>
      </div>
    </a>
  </div>
</template>

<script>
export default {
  name: "RestaurantCard",
  props: {
    name: String,
    link: String,
    img: String,
    types: Array,
  },
  methods: {
    // getImgUrl(url){
    //   const urlHttp =  this.img;
    //   if(url){
    //     return '/storage/covers/' + this.indice + '/' + url
    //   }
    //   if (url) {
    //     return  url
    //     // return  'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png'
    //   }
    //   else  {
    //   }
    // }
  },
};
</script>
<template>
  <div>
    <div class="card" style="width: 18rem; margin: 5px">
      <a :href="link">
      <img :src="getImgUrl(img)" class="card-img-top" alt="">
      

        <span v-for="type in types" :key="type.id">{{ type.name }}</span>
        <div class="card-body">
          <h5 class="card-title">{{ name }}</h5>
          <h5 class="card-title">{{ indice }}</h5>
          <em class="card-title">{{ email }}</em
          ><br />
          <em class="card-title">{{ address }}</em>
        </div>
      </a>
    </div>
  </div>
</template>

<script>
    //   import * as FilePond from 'filepond';

    //   const pond = FilePond.create({
    //     multiple: true,
    //     name: 'filepond'
    // });

    // document.body.appendChild(pond.element);

export default {
  name: "RestaurantCard",
  props: {
    name: String,
    email: String,
    address: String,
    link: String,
    types: Array,
    img:Text,
    indice:Number
  },
  methods:{


    getImgUrl(url){
      const urlHttp =  this.img;
      if(url){
        return '/storage/covers/' + this.indice + '/' + url
      }
      if (url) {
        
        return  url
        // return  'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png' 
      }
      else  {
     
      }
    
    }
  }
};
</script>
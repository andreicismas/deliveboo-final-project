<template>
  <div>
    <div class="d-flex justify-content-center row col-6-md">
      <type-filter-button
        :types="typesList"
        v-model="filterList"
      ></type-filter-button>
    </div>

    <div class="d-flex flex-wrap justify-content-between align-items-center">
      <restaurant-card
        v-for="restaurant in restaurantsList"
        :key="restaurant.id" 
        :name="restaurant.name" 
        :email="restaurant.email"
        :address="restaurant.address"
        :link="restaurant.link"
        :types="restaurant.types"
      >
    </restaurant-card>
    </div>

  </div>
</template>

<script>
import RestaurantCard from "./RestaurantCard.vue";
import TypeFilterButton from "./TypeFilterButton.vue";
// import axios from "axios";

export default {
  components: { RestaurantCard, TypeFilterButton },
  name: "RestaurantsIndex",
  props: {},
  data() {
    return {
      allRestaurantsList: [],
      typesList: [],
      filterList: [],
    };
  },
  computed: {
    restaurantsList() {
      if (this.filterList.length == 0) {
        return this.allRestaurantsList;
      } else {

        var temp = this.allRestaurantsList;
        for (let i = 0; i < this.filterList.length; i++) {
          var result = [];
          temp.forEach((element) => {
            for (let j = 0; j < element.types.length; j++) {
              if (element.types[j].id == this.filterList[i]) {
                  if (!result.includes(element)) {
                      result.push(element);
                  }
              }
            }
          });
          temp = result;
        }

        return result;
      }
    },
  },
  mounted() {
    axios
      .get("/api/user")
      .then((resp) => {
        this.allRestaurantsList = resp.data.results;
      })
      .catch((er) => {
        alert("Impossibile recuperare l'elenco dei ristoranti.");
      });
    axios
      .get("/api/types")
      .then((resp) => {
        this.typesList = resp.data.results;
      })
      .catch((er) => {
        alert("Impossibile recuperare l'elenco delle tipologie.");
      });
  },
};
</script>
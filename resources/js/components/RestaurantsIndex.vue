<template>
<div>
    <type-filter-button :types="typesList" v-model="filterList"></type-filter-button>

    <restaurant-card v-for="restaurant in restaurantsList" :key="restaurant.id"
        :name="restaurant.name"
        :email="restaurant.email"
        :address="restaurant.address"
        :link="restaurant.link"
        :types="restaurant.types">
    </restaurant-card>
</div>
</template>

<script>
import RestaurantCard from './RestaurantCard.vue';
import TypeFilterButton from './TypeFilterButton.vue';
// import axios from "axios";

export default {
  components: { RestaurantCard, TypeFilterButton },
    name: "RestaurantsIndex",
    props: {

    },
    data() {
        return {
            allRestaurantsList: [],
            // restaurantsList: [],
            typesList: [],
            filterList: []
        }
    },
    computed: {
        restaurantsList() { 
            if(this.filterList.length == 0) {
                return this.allRestaurantsList;
            } else {
                for (let i = 0; i < this.filterList.length; i++) {
                    var result = [];
                    this.allRestaurantsList.forEach(element => {
                        for(let j = 0; j < element.types.length; j++) {
                            if (element.types[j].id == this.filterList[i]) {
                                result.push(element);
                            }
                        }
                    })
                }
                return result;
            }
        }
    },
    mounted() {
        axios.get("/api/user").then(resp => {
                this.allRestaurantsList = resp.data.results;
                // this.restaurantsList = resp.data.results;
            })
            .catch(er => {
                alert("Impossibile recuperare l'elenco dei ristoranti.");
            });
        axios.get("/api/types").then(resp => {
                this.typesList = resp.data.results;
            })
            .catch(er => {
                alert("Impossibile recuperare l'elenco delle tipologie.");
            });
    }
}
</script>
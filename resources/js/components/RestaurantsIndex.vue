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

                // strategia sottrattiva, non funziona idky, non sembra refreshare la filterList :/
                // var result = this.allRestaurantsList;
                // for (let i = 0; i < this.filterList.length; i++) {
                //     for (let j = 0; j < result.length; j++) {
                //         for (let k = 0; k < result[j].types.length; k++) {
                //             if (result[j].types[k].id != this.filterList[i]) {
                //                 result.splice(j, 1);
                //                 j--;
                //             }
                //         }
                //     }
                // }

                // strategia additiva, più filtri sdoppiano i risultati con entrambi i type invece che ridurli agli stessi
                var result = [];
                for (let i = 0; i < this.filterList.length; i++) {
                    this.allRestaurantsList.forEach(element => {
                        for(let j = 0; j < element.types.length; j++) {
                            if (element.types[j].id == this.filterList[i]) {
                                result.push(element);
                            }
                        }
                    })
                }

                // soluzione più probabile: funzione ricorsiva con while

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
<template>
<div>

    

       <button class="btn btn-primary m-1 " 

       v-for="types in  typesList" 
       :key="types.id"
       :name="types.name"

       >{{types.name}}</button>


</div>
</template>

<script>
export default {
    name:"TypeRistorants",
    props:{
        name:String
    },

    data(){
        return {
            allTypesList:[],
            typesList:[]
        };
    },

    mounted(){

        axios.get("/api/type")
        .then(resp=>{
            this.allTypesList = resp.data.results;    
            this.typesList = resp.data.results;    
        })

        .catch(er=>{
            alert("ce un errore nel recuperare i dati ");
        });
    }
   
}
</script>
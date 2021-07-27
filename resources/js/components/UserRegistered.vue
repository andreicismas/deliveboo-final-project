<template>
<div >
    <div class="card-body"  
        v-for="user in  usersList" 
        :key="user.id">
        
        <h5 class="card-title">{{user.name}}</h5>
        <em class="card-title">{{user.email}}</em><br>
        <em class="card-title">{{user.address}}</em> <br>
        
        
            <span class="badge badge-pill badge-primary" 
            v-for="(user,type) in types" 
            :key="type.id"> 
            {{user.type.name}} 
            </span>

        
    </div>
</div>
</template>

<script>
export default {
    name:"UserRegistered",

    props:{
       
        types:Array
        
    },
    data(){
        return {
            allUsersList:[],
            usersList:[]
            
        };
    },

    mounted(){

        axios.get("/api/user")
        .then(resp=>{
            this.allUsersList = resp.data.results;    
            this.usersList = resp.data.results;   
        })

        .catch(er=>{
            alert("ce un errore nel recuperare i dati ");
        });
        
    }
}
</script>

                           
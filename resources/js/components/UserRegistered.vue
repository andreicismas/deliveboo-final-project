<template>
<div>
    <h5 class="card-title">{{name}}</h5>
    <em class="card-title">{{email}}</em><br>
    <em class="card-title">{{address}}</em>
</div>
</template>

<script>
export default {
    name:"UserRegistered",

    props:{
        name:String,
        email:String,
        address:String
    }
}
</script>
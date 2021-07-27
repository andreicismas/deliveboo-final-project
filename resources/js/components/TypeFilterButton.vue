<template>
    
       <button class="btn btn-primary m-1">{{ name }}</button>

</template>

<script>
export default {
    name:"TypeFilterButton",
    props:{
        name:String
    }
}
</script>
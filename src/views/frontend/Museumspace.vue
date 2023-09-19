<template>
    <main>
        <h1>館內地圖</h1>
     <museum></museum>   
    </main>
    
</template>
   
<script>
import museum from "@/components/museum.vue"
export default {
    components:{
        museum
    },
    data(){
       return {
       
       }
    },
    methods:{
    
    }
}
</script>

<style scoped lang="scss">
main{
    width: 83.33%;
    margin: auto;
    overflow-x: hidden;

}

</style>
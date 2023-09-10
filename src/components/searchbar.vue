<template>
    <div class="searchbar_search">
        <form action="">
          <input
            type="text"
            placeholder="Search"
            id="search"
            v-model="searchinput"
          />
          <button type="button">
            <font-awesome-icon :icon="['fas', 'magnifying-glass']" id="searchbar_searchglass"/>
          </button>
        </form>
    </div>
</template>
   
<script>
export default {
    data(){
       return {
        searchinput:"",
       }
    },
    methods:{
    
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
@import "../assets/sass/style.scss";

</style>
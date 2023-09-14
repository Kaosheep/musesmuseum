<template>
    <div :class="['searchbarclick_search',{click:isClick}]">
        <form action="">
          <input
            type="text"
            placeholder="Search"
          />
          <button type="button" @click="opensearch">
            <font-awesome-icon :icon="['fas', 'magnifying-glass']" id="searchbar_searchglass"/>
          </button>
        </form>
    </div>
</template>
   
<script>
export default {
    data(){
       return {
        isClick:false,
       }
    },
    methods:{
      opensearch(){
        this.isClick=!this.isClick
      }
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
@import "../assets/sass/style.scss";

</style>
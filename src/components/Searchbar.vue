<template>
  <div class="searchbar_search">
    <form action="">
      <input
        type="text"
        placeholder="Search"
        id="search"
        v-model="searchinput"
        @change="searchbar()"
      />
      <button type="button" @click="searchbar()">
        <font-awesome-icon
          :icon="['fas', 'magnifying-glass']"
          id="searchbar_searchglass"
        />
      </button>
    </form>
  </div>
</template>

<script>
export default {
  props: ["functype"],
  data() {
    return {
      searchinput:""
    };
  },
  methods: {
    searchbar() {
      if (this.functype === 1) {
        this.$emit('update-search-text', this.searchinput) 
      }else if(this.functype === 2){
        this.$emit('update-search-text', this.searchinput) 
      }
    },

  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss"></style>

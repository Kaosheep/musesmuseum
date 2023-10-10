<template>
    <div>
    <button class="bTab">最新消息</button>
  </div>
  <div>
    
  </div>
</template>
     
<script>
import PinkButton from "/src/components/PinkButton.vue";
import Searchbar from "/src/components/Searchbar.vue";
import Searchbarclick from "/src/components/Searchbarclick.vue";
export default {
    components: {
        Searchbar,
        Searchbarclick,
        PinkButton
    },
    data() {
        return {
            faq: []
        }
    },
    methods: {

    },
}
</script>
  
<style scoped lang="scss">
@import "@/assets/sass/style.scss";
</style>
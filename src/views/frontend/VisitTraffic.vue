<template>
    <Header></Header>
    這是交通頁面
</template>
<script>
import Header from '@/components/Header.vue';

export default {
    data() {
        return {

        }
    },
    mounted() {
        document.body.style.height = `auto`;
    },
    components: {
        Header
    },
    methods: {

    },
}
</script>
  
<style scoped lang="scss">
@import "@/assets/sass/style.scss";
@import "@/assets/sass/page/_visitTraffic.scss";
</style>
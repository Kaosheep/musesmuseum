<template>
    <form action="">
        <label>管理員帳號</label>
        <input type="text">
        <label>管理員密碼</label>
        <input type="text">
        <button><RouterLink to="/DashBoard">登入</RouterLink></button>
    </form>
</template>
   
<script>
export default {
    data(){
       return {
       
       }
    },
    methods:{
    
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
@import "@/assets/sass/style.scss";

</style>
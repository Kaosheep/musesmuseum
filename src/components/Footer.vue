<template>
    <footer>
        <div class="footer">
        <div class="col">
            <router-link to="/"><h3>MUSES MUSEUM</h3></router-link>
            <table>
                <tr>
                    <td>參觀時間</td>
                    <td>| 09:00-16:00</td>
                </tr>
                <tr>
                    <td>地址</td>
                    <td>| 希臘市和平區謬思路100號</td>
                </tr>
                <tr>
                    <td>電話</td>
                    <td>| 02-1234567</td>
                </tr>
            </table>
        </div>
        <div class="col">
            <label for="email">訂閱電子報</label>
            <div class="send">
                <form action="">
                <input type="text" placeholder="輸入電子信箱..." id="email">
                <button ><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            </div>
        </div>
        <div class="col">
            <div class="social">
                <span><i class="sicon fa-solid fa-envelope"></i></span>
                <span><i class="sicon fa-brands fa-square-facebook"></i></span>
                <span><i class="sicon fa-brands fa-youtube"></i></span>
            </div>
        </div>
    </div>
    </footer>
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
@import "../assets/sass/style.scss";

</style>

<template>
 <header>
    <div class="burger" @click="togglemenu">
        <div :class="['bar',{active:isClick}]"></div>   
    </div>
    <div class="logo">
        <router-link to="/"><img src="../assets/image/logo/smalllogo.png" alt=""></router-link>
    </div>
 </header>
 <nav>
    <div class="logo">
        <router-link to="/" @click="closemenu"><img src="../assets/image/logo/smalllogo.png" alt=""></router-link>
    </div>
    <div class="login">
        <router-link to="/login" @click="closemenu">會員登入</router-link>
    </div>
    <div class="menu">
        <ul>
            <li v-for="(li,index) in navlist"
            :key="index">
                <router-link :to="li.link" @click="closemenu"><h3>{{li.title}}</h3></router-link>
                <ul v-if="li.sublist">
                    <li v-for="(subli,index) in li.sublist"
                    :key="index">
                        <router-link :to="subli.sublink" @click="closemenu">{{subli.subtitle}}</router-link>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
 </nav>
 <router-view/>
</template>

<script>
export default {
    data(){
        return {
            navlist:[
                {title:'購票專區',link:"/"},
                {title:'展覽資訊',link:"/exhibition",sublist:[
                    {subtitle:'常設展覽',sublink:"/"},
                    {subtitle:'當期展覽',sublink:"/"},
                ]},
                {title:'藝術典藏',link:"/collection",sublist:[
                    {subtitle:'文物區',sublink:"/"},
                    {subtitle:'畫作區',sublink:"/"},
                ]},
                {title:'園區導覽',link:"/Space",sublist:[
                    {subtitle:'館內地圖',sublink:"/"},
                    {subtitle:'周邊景點',sublink:"/"},
                    {subtitle:'附屬空間',sublink:"/"}
                ]},
                {title:'參觀與服務' ,link:"/Visit",sublist:[
                    {subtitle:'注意事項',sublink:"/"},
                    {subtitle:'常見問題',sublink:"/faq"},
                    {subtitle:'交通資訊',sublink:"/"}
                ]},
                {title:'關於我們',link:"/About",sublist:[
                    {subtitle:'歷史沿革',sublink:"/"},
                    {subtitle:'歷代館長',sublink:"/"},
                ]},
                {title:'商品',link:"/shop"}
            ],
            isClick:false
        }
    },
    methods:{
        togglemenu(){
            const nav = document.querySelector('nav');
            const headerlogo = document.querySelector('header .logo')
            this.isClick = !this.isClick;
            if(this.isClick){
                nav.style.transform = 'translateY(0%)';   
            }else{
                nav.style.transform = 'translateY(-100%)'; 
            }
            if(this.isClick){
                headerlogo.style.height = '0%';
                headerlogo.style.transition = '';
            }else{
                headerlogo.style.height = '100%';
                headerlogo.style.transition = '.2s .2s';
            }
        },
        closemenu(){
            document.querySelector('nav').style.transform = 'translateY(-100%)';
            document.querySelector('header .logo').style.height = '100%';
            document.querySelector('header .logo').style.transition = '.2s .2s';
            this.isClick=false;
        }
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
@import "../assets/sass/style.scss";

</style>
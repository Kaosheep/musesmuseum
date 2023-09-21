<template>
    <Header></Header>
    <main class="VisitTraffic">
        <div class="VisitTraffic-title">
            <h1 class="VisitTraffic-h1">交通資訊<br>traffic</h1>
            <p class="VisitTraffic-add">地址：希臘市和平區謬思路100號</p>
        </div>
        <div class="VisitTraffic-nav">
            <span id="VisitTrafficPublic" @click="PublicAppear">大眾運輸</span>
            <span id="VisitTrafficCar" @click="CarAppear">自行開車</span>
            <span id="VisitTrafficPork" @click="PorkAppear">停車資訊</span>
        </div>
        <!-- 大眾運輸表格 -->
        <form id="VisitTrafficPF" style="display: block;">
            <div class="VisitTrafficFlex">
                <div v-for="(item, index) in VisitTrafficPublicForm " class="VisitTrafficPFtext">
                    <h2 class="VisitTrafficPF-h2">{{ item.title }}</h2>
                    <p v-html="item.text" class="VisitTrafficPF-p"></p>
                </div>
            </div>
        </form>
        <!-- 自行開車表格  -->
        <form id="VisitTrafficCF" style="display: none;">
            <div class="VisitTrafficFlex">
                <div v-for="(item, index) in  VisitTrafficCarForm " :class="'VisitTrafficCFCar-' + index">
                    <h2 :class="'VisitTrafficCFCarH2-' + index">{{ item.title }}</h2>
                    <p :class="'VisitTrafficCFCarP-' + index" v-html="item.text"></p>
                </div>
            </div>
        </form>
        <!-- 停車資訊 -->
        <form id="VisitTrafficPorkF" style="display: none;">
            <div class="VisitTrafficFlex">
                <div v-for="( item, index ) in  VisitTrafficPorkForm " :class="'VisitTrafficPorkCar-' + index">
                    <h2 :class="'VisitTrafficPorkCarH2-' + index">{{ item.title }}</h2>
                    <p v-html="item.text" :class="'VisitTrafficPorkCarP-' + index"></p>
                </div>
            </div>
        </form>

    </main>
</template>
<script>
import Header from '@/components/Header.vue';
import { text } from '@fortawesome/fontawesome-svg-core';

export default {
    data() {
        return {
            VisitTrafficPublicForm: [
                {
                    title: "公車資訊",
                    text: "公車:<br>搭乘655至和平站，向北走路約3分鐘<br>搭乘748至和平站，向北走路約3分鐘<br>搭乘1097至謬思站，直達博物館<br>搭乘378至中央平和站，向東走路約7分鐘"
                },
                {
                    title: "捷運",
                    text: "捷運:<br>機場捷運A17高鐵和平站，自捷運站出口後，經希臘城第五噴水池廣場後直行，右轉和平大道過蠟西小學到達博物館。"
                },
                {
                    title: "火車",
                    text: "火車:<br>搭乘北上／南下火車，到達和平站，從西區出口出火車站，經由女神路轉右轉接人型大道，經過第三噴水池接到和平路，繼續往前直走即可到達博物館。"
                },
                {
                    title: "Ubike",
                    text: "Ubike停靠站:<br>MUSE博物館停站點，直達門口。<br>蠟西國小停站點，往東走即可直達。<br>和平公園停站點，往西走轉向和平路即可直達。<br>第六噴水池停站點，往北走經過健康路即可直達。"
                },
            ],
            VisitTrafficCarForm: [
                {
                    title: "北上",
                    text: "北上:<br>從國道一號的87號出口(通往希臘市安平路)下交流道。<br>沿114縣道→向右轉進入永安路/110縣道 →向左轉進入健康路三段 →向右轉進入快樂路→在第 1 個十字路口向左轉接謬思路 "
                },
                {
                    title: "南下",
                    text: "南下:<br>從國道三號的78號出口(通往希臘市維娜路)下交流道。<br>沿中正路→向左轉進入皮卡路/110縣道 →向右轉進入波羅路 →向右轉進入快樂路→在第 1 個十字路口向左轉接謬思路",
                },
                {
                    title: "機車",
                    text: "機車:<br>走台65線道(機車道)→沿火龍路→向左轉進入皮卡路/110縣道 →向右轉進入波羅路 →向右轉進入快樂路→在第 1 個十字路口向左轉接謬思路",
                },

            ],
            VisitTrafficPorkForm: [
                {
                    title: "博物館停車場",
                    text: "謬思路口進入停車場，內有地下三層。<br>汽車車位：每層皆有100個寬敞的汽車車位。<br>電動車車位：每層皆有20個專用的電動車車位，並提供充電設施。<br>重機車車位：B1、B2提供30個重機車位。<br>機車車位：每層皆有100個機車車位。<br>大型瀏覽車:B1提供10個專用車位。"
                },
                {
                    title: "收費標準",
                    text: "皆以每天00:00為一天，若持有當日博物館門票則免收費。<br>汽車：150/天<br>電動車車位：200/天<br>重型機車車位：100/天<br>機車車位：50/天<br>大型瀏覽車:200/天<br>"
                },
                {
                    title: "民營停車場",
                    text: "1.雲和希臘振興段停車場<br>營業時間：00:00-24:00 每 30 分鐘 10 元，當日最高收費 120 元，跨日重新計算、進場 30 分鐘內出場免費(步行約8分鐘)<br>2.興華停車場<br>全時段費率未知(步行約10分鐘)<br>3.踢吧咪和平停車場<br>全時段每 30 分鐘 10 元，當日最高收費 80 元(步行約12分鐘)<br>4.祥龍街停車場<br>全時段每小時 20 元(步行約11分鐘)<br>5.台灣中油龍岡站<br>步行約20分鐘",
                }
            ],
        }
    },
    mounted() {
        document.body.style.height = `auto`;
    },
    components: {
        Header
    },
    methods: {
        PublicAppear() {
            const VisitTrafficPublicId = document.getElementById("VisitTrafficPublic");
            const VisitTrafficCarId = document.getElementById("VisitTrafficCar");
            const VisitTrafficPorkId = document.getElementById("VisitTrafficPork");
            const VisitTrafficPFId = document.getElementById("VisitTrafficPF");
            const VisitTrafficCFId = document.getElementById("VisitTrafficCF");
            const VisitTrafficPorkFId = document.getElementById("VisitTrafficPorkF");


            if (VisitTrafficPFId.style.display === "none") {
                VisitTrafficPFId.style.display = "block";
                VisitTrafficCFId.style.display = "none";
                VisitTrafficPorkFId.style.display = "none";
                VisitTrafficPublicId.style.backgroundColor = "$myellow";
                VisitTrafficPublicId.style.borderColor = "#fff";
                VisitTrafficCarId.style.backgroundColor = "#fff";
                VisitTrafficCarId.style.borderColor = "$myellow";
                VisitTrafficPorkId.style.backgroundColor = "#fff";
                VisitTrafficPorkId.style.borderColor = "$myellow";


            }
        },
        CarAppear() {
            const VisitTrafficPublicId = document.getElementById("VisitTrafficPublic");
            const VisitTrafficCarId = document.getElementById("VisitTrafficCar");
            const VisitTrafficPorkId = document.getElementById("VisitTrafficPork");
            const VisitTrafficPFId = document.getElementById("VisitTrafficPF");
            const VisitTrafficCFId = document.getElementById("VisitTrafficCF");
            const VisitTrafficPorkFId = document.getElementById("VisitTrafficPorkF");
            if (VisitTrafficCFId.style.display === "none") {
                VisitTrafficCFId.style.display = "block";
                VisitTrafficPFId.style.display = "none";
                VisitTrafficPorkFId.style.display = "none";


                VisitTrafficPublicId.style.backgroundColor = "#fff";
                VisitTrafficPublicId.style.borderColor = "$myellow";
                VisitTrafficCarId.style.backgroundColor = "$myellow";
                VisitTrafficCarId.style.borderColor = "#fff";
                VisitTrafficPorkId.style.backgroundColor = "#fff";
                VisitTrafficPorkId.style.borderColor = "$myellow";
            }
        },
        PorkAppear() {
            const VisitTrafficPFId = document.getElementById("VisitTrafficPF");
            const VisitTrafficCFId = document.getElementById("VisitTrafficCF");
            const VisitTrafficPorkFId = document.getElementById("VisitTrafficPorkF");
            if (VisitTrafficPorkFId.style.display === "none") {
                VisitTrafficPorkFId.style.display = "block";
                VisitTrafficPFId.style.display = "none";
                VisitTrafficCFId.style.display = "none";

                VisitTrafficPublicId.style.backgroundColor = "#fff";
                VisitTrafficPublicId.style.borderColor = "$myellow";
                VisitTrafficCarId.style.backgroundColor = "#fff";
                VisitTrafficCarId.style.borderColor = "$myellow";
                VisitTrafficPorkId.style.backgroundColor = "$myellow";
                VisitTrafficPorkId.style.borderColor = "#fff";
            }
        },
    }
}
</script>
  
<style scoped lang="scss">
@import "@/assets/sass/page/_visitTraffic.scss";
</style>
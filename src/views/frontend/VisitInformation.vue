<template>
    <Header v-if="windowWidth > 768"></Header>
    <main class="visitInformation-main">
        <div class="visitInformation-title">
            <h1>參觀須知 <br v-if="windowWidth < 769">Notice</h1>
        </div>
        <div class="visitInformation-ulBorder" id="visitInformationUlBorder">
            <ul>
                <li v-for="(visitorInformation, index) in visitorRule" class="visitInformation-nav">
                    <dev class="visitInformation-icon">
                        <img :src="visitorInformation.imgurl">
                    </dev>
                    <dev class="visitInformation-txt">
                        <p>{{ visitorInformation.txt }}</p>
                    </dev>
                </li>
            </ul>
        </div>
        <div class="visitInformation-bg"></div>
    </main>
    <Footer></Footer>
</template>
  
<script>
import Header from '@/components/Header.vue';
import Footer from '@/components/Footer.vue';


export default {
    data() {
        return {
            visitorRule: [
                {
                    imgurl: require("@/assets/image/visit/visitImage01.png"),
                    txt: "請勿飲食、嚼食檳榔、口香糖或吸菸。",
                },
                {
                    imgurl: require("@/assets/image/visit/visitImage02.png"),
                    txt: "請勿攜帶寵物（合格導盲犬、導盲幼犬除外）。",
                },
                {
                    imgurl: require("@/assets/image/visit/visitImage03.png"),
                    txt: "請勿隨地吐痰、亂丟垃圾 、賭博、玩牌、喧鬧、酗酒或追逐嬉戲等。",
                },
                {
                    imgurl: require("@/assets/image/visit/visitImage04.png"),
                    txt: "拍照時，禁止使用閃光燈、腳架；若為商業及出版使用，請向館方提出申請。",
                },
                {
                    imgurl: require("@/assets/image/visit/visitImage05.png"),
                    txt: "請勿攜帶違禁品、危險物品等進入園區。",
                },
                {
                    imgurl: require("@/assets/image/visit/visitImage06.png"),
                    txt: "展場內需降低談話音量，通訊設備或電子裝置應調整為靜音。",
                },
            ],
            windowWidth: window.innerWidth,
        }
    },
    mounted() {
        document.body.style.height = `auto`;
    },

    components: {
        Header,
        Footer
    },
}


</script>
<style scoped lang="scss">
@import "@/assets/sass/page/_visitInformation.scss";
</style>

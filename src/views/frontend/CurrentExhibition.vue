<template>
    <main class="cur_exhi_main">
        <div class="cur_carousel_header">
            <VerHeader :title="'展 覽 區 Exhibitions'"></VerHeader>
        </div>
        <div class="cur_container">
            <button class="cur_scroll_left" type="button" @click="scrollpage('left')">
                <img src="@/assets/image/paint/arrow.svg" alt="" />
            </button>
            <div class="cur_exb_search">
                <div class="cur_exhi_title">
                    <span>常設展覽</span>
                </div>
                <Searchbar @click="searchClick" />
                <Searchbarclick />
            </div>
            <div class="cur_exhi_section">
                <div class="cur_img_deco"></div>
                <div class="cur_exhi_img">
                    <img :src="curexhibitions[currentIndex].curexhiImg" alt="">
                </div>
                <div class="cur_exhi_desc">
                    <div class="cur_back_deco">
                    </div>
                    <div class="cur_exhi_desc_deco">
                    </div>
                    <h3 class="cur_title">{{ curexhibitions[currentIndex].curexhiTitle }}</h3>
                    <p>{{ curexhibitions[currentIndex].curexhiDesc }}</p>
                    <span class="cur_loc">展覽地點：{{ curexhibitions[currentIndex].curexhiLoc }}</span>
                    <div class="background_deco"></div>
                    <div class="cur_buy_tickbtn">
                        <div class="cur_buy_tickbtn_deco"></div>
                        <router-link to="/Home/Tick">
                            <ThinArrow :text="'前往購票'"></ThinArrow>
                        </router-link>
                    </div>
                </div>
                <div class="cur_exhi_desc_bgc"></div>
            </div>

            <div class="cur_m_title">
                <span>{{ curexhibitions[currentIndex].curexhiTitle }}</span>
            </div>
            <div class="cur_m_info">
                <p>{{ curexhibitions[currentIndex].curexhiDesc }}</p>
                <span class="cur_loc">展覽地點：{{ curexhibitions[currentIndex].curexhiLoc }}</span>
            </div>

            <button class="cur_scroll_right" type="button" @click="scrollpage('right')">
                <img src="@/assets/image/paint/arrow.svg" alt="" />
            </button>
        </div>
    </main>
</template>
<script>
import VerHeader from '/src/components/VerHeader.vue'
import Searchbar from '/src/components/Searchbar.vue'
import Searchbarclick from '/src/components/Searchbarclick.vue'
import ThinArrow from '/src/components/ThinArrow.vue'
export default {
    components: {
        VerHeader,
        Searchbar,
        Searchbarclick,
        ThinArrow,
    },
    data() {
        return {
            curexhibitions: [
                {
                    curexhiImg: "http://localhost/musesmuseum/public/image/exhi/spec_ex6.jpg",
                    curexhiTitle: "色彩之旅：印象主義大師",
                    curexhiDesc: "被譽為「印象派之父」的莫內，終其一生實踐印象派美學，在不同時節天候的自然光線下，捕捉色彩無限可能的變化，將印象派對「光」與「色彩」的迷醉淋漓盡致發揮。",
                    curexhiLoc: "展區A",
                },
                {
                    curexhiImg: "http://localhost/musesmuseum/public/image/exhi/spec_ex7.jpg",
                    curexhiTitle: "城市攝影：鏡像內心的多重情感",
                    curexhiDesc: "透過每位攝影師的獨特視角，捕捉各個城市情感和故事的瞬間。展覽旨在呈現城市的多面性，包括喜悅、憤怒、哀傷和歡樂。每張照片都是攝影師內心世界的一個映像，將觀眾引領進入一場充滿情感的旅程。",
                    curexhiLoc: "展區B",
                },
                {
                    curexhiImg: "http://localhost/musesmuseum/public/image/exhi/spec_ex5.jpg",
                    curexhiTitle: "萌翻你的心！小瓢蟲大出動",
                    curexhiDesc: "150隻大小不一的小瓢蟲又萌又可愛，排列組合成各式各樣的有趣場景，迷倒無數的大人小孩，以童話故事做為背景，象徵著抗疫與幸福，對小朋友來說也是寓教於樂的好時機。",
                    curexhiLoc: "展區C",
                },
                {
                    curexhiImg: "http://localhost/musesmuseum/public/image/exhi/spec_ex8.jpg",
                    curexhiTitle: "藍色之路： 來自波斯的瑰麗藝術",
                    curexhiDesc: "波斯藝術或伊朗藝術是世界歷史上最豐富的藝術遺產之一，不同的時期，來自鄰近文明的藝術的影響非常重要，後來波斯藝術作為更廣泛的伊斯蘭藝術風格的一部分，產生並受到了重大影響。",
                    curexhiLoc: "展區D",
                },
            ],
            currentIndex: 0,
        };
    },
    methods: {
        scrollpage(direction) {
            if (direction === 'left') {
                this.currentIndex = (this.currentIndex - 1 + this.curexhibitions.length) % this.curexhibitions.length;
            } else {
                this.currentIndex = (this.currentIndex + 1) % this.curexhibitions.length;
            }
        },
    },
}
</script>
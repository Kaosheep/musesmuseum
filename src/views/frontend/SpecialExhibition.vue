<template>
    <main class="specexhi_main">
        <div class="carousel_header">
            <VerHeader></VerHeader>
        </div>
        <div class="exb_search">
            <div class="spec_title">
                <span>當期展覽</span>
            </div>
            <Searchbar @click="searchClick" />
            <Searchbarclick />
        </div>
        <div class="img_deco">
        </div>

        <div class="exhi_section">
            <div class="exhi_img">
                <img src="@/assets/image/exhibition/specialexhibition/spec_ex0.jpg" alt="">
            </div>
            <div class="exhi_desc">
                <div class="bgc_deco_a"></div>
                <div class="bgc_deco_b"></div>
                <div class="bgc_deco_c"></div>
                <div class="bgc_deco_d"></div>
                <div class="back_deco">
                </div>
                <div class="exhi_desc_deco">
                </div>
                <span>2024/02/01-2024/03/30</span>
                <h3>春之詠歌：多彩藝術的季節</h3>
                <p>來自各地藝術家們帶來的多種形式的作品，包括繪畫、雕塑、攝影、錄像藝術、裝置藝術和互動藝術。透過不同的媒介和風格，試圖捕捉春天所帶來的生命力和變化。</p>
                <span>展覽地點：謬思藝廊</span>
                <div class="buy_tickbtn_deco"></div>
            </div>
            <div class="exhi_desc_bgc"></div>
            <button class="exsearch" type="button" @click="scrollpage">
                <img src="@/assets/image/exhibition/specialexhibition/arrow_logo.svg" alt="" />
            </button>
        </div>
        <div class="m_date">
            <span>2024/02/01-2024/03/30</span>
        </div>
        <div class="m_title">
            <span>春之詠歌：多彩藝術的季節華章</span>
        </div>
        <div class="buy_tickbtn">
            <ThinArrow :text="'前往購票'"></ThinArrow>
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
    methods: {
        scrollpage() {
            document.querySelector(".wrap").scrollLeft +=
                document.querySelector(".col").offsetWidth;
        },
    }
}
</script>
<style scoped lang="scss">
.searchbar_search {
    margin-left: auto;
}

.searchbarclick_search {
    display: none;
}

.buy_tickbtn {
    width: 100%;
    text-align: end;
    padding-right: 5%;
}
</style>
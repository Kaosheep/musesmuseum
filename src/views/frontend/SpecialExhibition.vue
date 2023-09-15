<template>
    <div class="exb_search">
        <Searchbar></Searchbar>
    </div>
    <div class="img_deco">
        <img src="@/assets/image/exhibition/specialexhibition/spex_deco0.png" alt="">
    </div>
    <div class="exhi_section">
        <div class="exhi_img">
            <img src="@/assets/image/exhibition/specialexhibition/spec_ex0.jpg" alt="">
            <div class="bgc_deco">
            </div>
        </div>
        <div class="exhi_desc">
            <div class="bgc_deco">
                <img src="@/assets/image/exhibition/specialexhibition/spex_deco1.png" alt="">
            </div>
            <div class="back_deco">
                <img src="@/assets/image/exhibition/specialexhibition/spex_deco2.png" alt="">
            </div>
            <div class="exhi_desc_deco">
                <img src="@/assets/image/exhibition/specialexhibition/spex_deco4.png" alt="">
            </div>
            <span>2024/02/01-2024/03/30</span>
            <h3>春之詠歌：多彩藝術的季節</h3>
            <p>來自各地藝術家們帶來的多種形式的作品，包括繪畫、雕塑、攝影、錄像藝術、裝置藝術和互動藝術。透過不同的媒介和風格，試圖捕捉春天所帶來的生命力和變化。</p>
            <span>展覽地點：謬思藝廊</span>
        </div>
        <div class="exhi_desc_bgc"></div>
    </div>

    <div class="buy_tickbtn">
        <img src="@/assets/image/exhibition/specialexhibition/spex_deco5.png" alt="">
        <ThinArrow :text="'前往購票'"></ThinArrow>
    </div>
</template>
<script>
import Searchbar from '/src/components/Searchbar.vue'
import ThinArrow from '/src/components/ThinArrow.vue'
export default {
    components: {
        Searchbar,
        ThinArrow,
    }
}
</script>
<style scoped lang="scss">
.exb_search {
    margin: auto;
    margin-top: 2%;
    text-align: end;
    width: 83.33%;

}

.searchbar_search {
    margin-left: auto;
}

.buy_tickbtn {
    width: 100%;
    text-align: end;
    padding-right: 5%;
}
</style>
<template>
    <div class="carousel_header">
        <VerHeader></VerHeader>
    </div>
    <div class="exb_search">
        <Searchbar></Searchbar>
    </div>
    <div class="img_deco">
    </div>
    <div class="exhi_section">
        <div class="exhi_img">
            <img src="@/assets/image/exhibition/currentexhibition/curr_ex0.jpg" alt="">
        </div>
        <div class="exhi_desc">
            <div class="back_deco">
            </div>
            <div class="exhi_desc_deco">
            </div>
            <h3>色彩之旅：印象主義大師</h3>
            <p>被譽為「印象派之父」的莫內，終其一生實踐印象派美學，在不同時節天候的自然光線下，捕捉色彩無限可能的變化，將印象派對「光」與「色彩」的迷醉淋漓盡致發揮。</p>
            <span>展覽地點：謬思藝廊</span>
            <div class="buy_tickbtn_deco"></div>
        </div>
        <div class="exhi_desc_bgc"></div>
    </div>

    <div class="buy_tickbtn">

        <ThinArrow :text="'前往購票'"></ThinArrow>
    </div>
</template>
<script>
import VerHeader from '/src/components/VerHeader.vue'
import Searchbar from '/src/components/Searchbar.vue'
import ThinArrow from '/src/components/ThinArrow.vue'
export default {
    components: {
        VerHeader,
        Searchbar,
        ThinArrow,
    }
}
</script>
<style scoped lang="scss">
template {
    position: relative;
}

.img_deco {
    background: linear-gradient(-45deg, #EB5F8699 20%, transparent 20% 80%, #EB5F8699 80% 100%), linear-gradient(45deg, #EB5F8699 20%, transparent 20% 80%, #EB5F8699 80% 100%), linear-gradient(-45deg, #ffffff 33%, transparent 33% 66%, #ffffff 66%), linear-gradient(45deg, transparent 33%, #EB5F86 33% 66%, transparent 66%);
    background-size: 1em 1em;
    background-color: transparent;
    opacity: 1;
    width: 3em;
    height: 9em;
    transform: rotate(45deg);
    position: absolute;
    left: 6%;
    z-index: 3;
}

.exhi_section {
    max-width: 1200px;
    margin: 5% auto;
    width: 85%;
    display: flex;
    position: relative;
}

.exhi_img {
    width: 50%;
    margin: 1%;
    overflow: hidden;
}

.exhi_img img {
    width: 100%;
    object-fit: cover;
    vertical-align: bottom;
    border-radius: 4px;
}

.exhi_desc {
    padding: 6%;
    line-height: 2em;
    background-color: #fff;
    width: 50%;
    border: 3px dashed #EB5F86;
    border-radius: 4px;
    margin: 1%;
    position: relative;
    z-index: 1;
}

.exhi_desc .back_deco {
    background: linear-gradient(45deg, #1E5289 20%, transparent 20%, transparent 80%, #1E5289 80%, #1E5289 100%), linear-gradient(135deg, #1E5289 20%, transparent 20%, transparent 80%, #1E5289 80%, #1E5289 100%);
    background-size: 1em 1em;
    background-color: transparent;
    opacity: 1;
    width: 2em;
    height: 2em;
    transform: rotate(45deg);
    position: absolute;
    left: -15.5%;
    bottom: -16%;
}

.exhi_desc .exhi_desc_deco {
    background: linear-gradient(45deg, #FBF796 0%, #FBF796 5%, transparent 5%, transparent 10%, #FBF796 10%, #FBF796 15%, transparent 15%, transparent 20%, #FBF796 20%, #FBF796 25%, transparent 25%, transparent 30%, #FBF796 30%, #FBF796 35%, transparent 35%, transparent 40%, #FBF796 40%, #FBF796 45%, transparent 45%, transparent 50%, #FBF796 50%, #FBF796 55%, transparent 55%, transparent 60%, #FBF796 60%, #FBF796 65%, transparent 65%, transparent 70%, #FBF796 70%, #FBF796 75%, transparent 70%, transparent 80%, #FBF796 80%, #FBF796 85%, transparent 85%, transparent 90%, #FBF796 90%, #FBF796 95%, transparent 95%), linear-gradient(135deg, #FBF796 0%, #FBF796 5%, transparent 5%, transparent 10%, #FBF796 10%, #FBF796 15%, transparent 15%, transparent 20%, #FBF796 20%, #FBF796 25%, transparent 25%, transparent 30%, #FBF796 30%, #FBF796 35%, transparent 35%, transparent 40%, #FBF796 40%, #FBF796 45%, transparent 45%, transparent 50%, #FBF796 50%, #FBF796 55%, transparent 55%, transparent 60%, #FBF796 60%, #FBF796 65%, transparent 65%, transparent 70%, #FBF796 70%, #FBF796 75%, transparent 70%, transparent 80%, #FBF796 80%, #FBF796 85%, transparent 85%, transparent 90%, #FBF796 90%, #FBF796 95%, transparent 95%);
    background-size: 10em 10em;
    background-color: #009CA8;
    opacity: 1;
    width: 12em;
    height: 3em;
    border-radius: 4px;
    transform: rotate(45deg);
    position: absolute;
    right: -12%;
    top: 1%;
}

.exhi_desc_bgc {
    width: 40vw;
    height: 28vw;
    background-color: #EB5F86;
    border-radius: 4px;
    position: absolute;
    right: -0.1%;
    top: 5.5%;
    z-index: 0;
}

.buy_tickbtn_deco {
    background: radial-gradient(circle, #009CA8 25%, transparent 26%);
    background-size: 1em 1em;
    background-color: transparent;
    opacity: 1;
    width: 2em;
    height: 2em;
    transform: rotate(45deg);
    position: absolute;
    left: 82%;
    bottom: -22%;
}

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
}</style>
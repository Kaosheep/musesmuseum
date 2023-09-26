<template>
    <main class="currexhi_main">
        <div class="carousel_header">
            <VerHeader :title="'畫 作 區 Paintings'"></VerHeader>
        </div>
        <div class="container">
            <div class="exb_search">
                <div class="spec_title">
                    <span>常設展覽</span>
                </div>
                <!-- <Searchbar @click="searchClick" />
                <Searchbarclick /> -->
                <Searchbar />
            </div>
            <div class="exhi_section">
                <div class="curr_img_deco"></div>
                <div class="curr_exhi_img">
                    <img src="@/assets/image/exhibition/currentexhibition/curr_ex0.jpg" alt="">

                </div>
                <div class="exhi_desc">
                    <div class="curr_back_deco">
                    </div>
                    <div class="curr_exhi_desc_deco">
                    </div>
                    <h3>色彩之旅：印象主義大師</h3>
                    <p>被譽為「印象派之父」的莫內，終其一生實踐印象派美學，在不同時節天候的自然光線下，捕捉色彩無限可能的變化，將印象派對「光」與「色彩」的迷醉淋漓盡致發揮。。</p>
                    <span>展覽地點：謬思藝廊</span>
                    <div class="buy_tickbtn_deco"></div>
                </div>
                <div class="exhi_desc_bgc">
                    <div></div>
                </div>
                <!-- <button class="exsearch" type="button" @click="scrollpage">
                    <img src="@/assets/image/exhibition/specialexhibition/arrow_logo.svg" alt="" />
                </button> -->
            </div>
            <!-- 

            
            <div class="m_date">
                <span>2024/02/01-2024/03/30</span>
            </div>
            <div class="m_title">
                <span>春之詠歌：多彩藝術的季節華章</span>
            <-->
            <router-link to="/Home/Tick">
                <div class="buy_tickbtn">
                    <ThinArrow :text="'前往購票'"></ThinArrow>
                </div>
            </router-link>
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
// .searchbar_search {
//     margin-left: auto;
// }

// .searchbarclick_search {
//     display: none;
// }

.buy_tickbtn {
    width: 100%;
    text-align: end;
    padding-right: 5%;
    padding-top: 4%;
}
</style>
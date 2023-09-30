<template>
    <main class="cur_exhi_main">
        <div class="cur_carousel_header">
            <VerHeader :title="'展 覽 區 Exhibitions'"></VerHeader>
        </div>
        <div class="cur_container">
            <button class="cur_scroll_left" type="button" @click="scrollpage">
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
                    <img src="@/assets/image/exhibition/currentexhibition/curr_ex0.jpg" alt="">
                </div>
                <div class="cur_exhi_desc">
                    <div class="cur_back_deco">
                    </div>
                    <div class="cur_exhi_desc_deco">
                    </div>
                    <h3 style="color: #EB5F86;">色彩之旅：印象主義大師</h3>
                    <p>被譽為「印象派之父」的莫內，終其一生實踐印象派美學，在不同時節天候的自然光線下，捕捉色彩無限可能的變化，將印象派對「光」與「色彩」的迷醉淋漓盡致發揮。</p>
                    <span>展覽地點：謬思藝廊</span>
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
                <span>色彩之旅：印象主義大師</span>
            </div>

            <button class="cur_scroll_right" type="button" @click="scrollpage">
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
    }
}
</script>
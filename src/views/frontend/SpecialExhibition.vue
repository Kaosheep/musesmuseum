<template>
    <main class="spe_specexhi_main">
        <div class="spe_carousel_header">
            <VerHeader :title="'展 覽 區 Exhibitions'"></VerHeader>
        </div>
        <div class="spe_container">
            <button class="spe_scroll_left" type="button" @click="scrollpage">
                <img src="@/assets/image/paint/arrow.svg" alt="" />
            </button>
            <div class="spe_exb_search">
                <div class="spe_spec_title">
                    <span>當期展覽</span>
                </div>
                <Searchbar @click="searchClick" />
                <Searchbarclick />
            </div>
            <div class="spe_exhi_section">
                <div class="spe_img_deco"></div>
                <div class="spe_exhi_img">
                    <img :src="spexhiImg" alt="">
                </div>
                <div class="spe_exhi_desc">
                    <div class="spe_bgc_deco_a"></div>
                    <div class="spe_bgc_deco_b"></div>
                    <div class="spe_bgc_deco_c"></div>
                    <div class="spe_back_deco">
                    </div>
                    <div class="spe_exhi_desc_deco">
                    </div>
                    <span>{{ formattedExhibitionDate }}</span>
                    <h3 class="spe_title">{{ spexhiTitle }}</h3>
                    <p>{{ spexhiDesc }}</p>
                    <span class="spe_loc">展覽地點：{{ spexhiLoc }}</span>
                    <div class="spe_buy_tickbtn">
                        <div class="spe_buy_tickbtn_deco"></div>
                        <router-link to="/Home/Tick">
                            <ThinArrow :text="'前往購票'"></ThinArrow>
                        </router-link>
                    </div>
                </div>
                <div class="spe_exhi_desc_bgc">
                    <div></div>
                </div>
            </div>

            <div class="spe_m_date">
                <span>{{ formattedExhibitionDate }}</span>
            </div>
            <div class="spe_m_title">
                <span>{{ spexhiTitle }}</span>
            </div>



            <button class="spe_scroll_right" type="button" @click="scrollpage">
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
            spexhiImg: "/src/assets/image/exhibition/specialexhibition/spec_ex0.jpg",
            spexhi_startdate: "2023-10-01",
            spexhi_enddate: "2023-12-30",
            spexhiTitle: "春之詠歌：多彩藝術的季節",
            spexhiDesc: "來自各地藝術家們帶來的多種形式的作品，包括繪畫、雕塑、攝影、錄像藝術、裝置藝術和互動藝術。透過不同的媒介和風格，試圖捕捉春天所帶來的生命力和變化。",
            spexhiLoc: "展區A",
        };
    },
    computed: {
        formattedExhibitionDate() {
            const startDate = new Date(this.spexhi_startdate);
            const endDate = new Date(this.spexhi_enddate);
            const formattedStartDate = startDate.toLocaleDateString();
            const formattedEndDate = endDate.toLocaleDateString();
            return `${formattedStartDate} - ${formattedEndDate}`;
        },
    },
}
</script>
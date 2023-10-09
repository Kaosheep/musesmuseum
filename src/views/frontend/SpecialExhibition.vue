<template>
    <main class="spe_specexhi_main">
        <div class="spe_carousel_header">
            <VerHeader :title="'展 覽 區 Exhibitions'"></VerHeader>
        </div>
        <div class="spe_container">
            <button class="spe_scroll_left" type="button" @click="scrollpage('left')">
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
                    <img :src="spexhibitions[currentIndex].img" alt="">
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
                    <h3 class="spe_title">{{ spexhibitions[currentIndex].spexhiTitle }}</h3>
                    <p>{{ spexhibitions[currentIndex].spexhiDesc }}</p>
                    <span class="spe_loc">展覽地點：{{ spexhibitions[currentIndex].spexhiLoc }}</span>
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



            <button class="spe_scroll_right" type="button" @click="scrollpage('right')">
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
            spexhibitions: [
                {
                    spexhiImg: "/src/assets/image/exhibition/specialexhibition/spec_ex0.jpg",
                    spexhi_startdate: "2023-10-01",
                    spexhi_enddate: "2023-12-30",
                    spexhiTitle: "春之詠歌：多彩藝術的季節",
                    spexhiDesc: "來自各地藝術家們帶來的多種形式的作品，包括繪畫、雕塑、攝影、錄像藝術、裝置藝術和互動藝術。透過不同的媒介和風格，試圖捕捉春天所帶來的生命力和變化。",
                    spexhiLoc: "展區A",
                },
                {
                    spexhiImg: "/src/assets/image/exhibition/specialexhibition/spec_ex1.png",
                    spexhi_startdate: "2023-11-01",
                    spexhi_enddate: "2024-01-30",
                    spexhiTitle: "派對對物：人要金裝，動物要衣裝",
                    spexhiDesc: "當代藝術大師摳擬機挖，獨特的展覽呈現一系列令人驚艷的藝術品，以人與動物為靈感，讓觀眾沉浸在視覺和感官的享受中，引發許多社會議題的思考，隱喻環保和動物權益的問題。",
                    spexhiLoc: "展區C",
                },
                {
                    spexhiImg: "/src/assets/image/exhibition/specialexhibition/spec_ex2.jpg",
                    spexhi_startdate: "2023-12-01",
                    spexhi_enddate: "2024-03-30",
                    spexhiTitle: "線條、形狀、空間：建築美學的探索",
                    spexhiDesc: "本展將呈現現代建築師如何運用線條、形狀和空間來實現獨樹一格的建築美學，並展示建築如何與環境互動，創造出獨特的視覺和情感體驗。",
                    spexhiLoc: "展區D",
                },
                {
                    spexhiImg: "/src/assets/image/exhibition/specialexhibition/spec_ex3.jpg",
                    spexhi_startdate: "2023-09-10",
                    spexhi_enddate: "2023-11-30",
                    spexhiTitle: "獨居沙漠，藝術家喬治亞．歐姬芙",
                    spexhiDesc: "來自各地藝術家們帶來的多種形式的作品，包括繪畫、雕塑、攝影、錄像藝術、裝置藝術和互動藝術。透過不同的媒介和風格，試圖捕捉春天所帶來的生命力和變化。",
                    spexhiLoc: "展區B",
                },
                {
                    spexhiImg: "/src/assets/image/exhibition/specialexhibition/spec_ex4.jpg",
                    spexhi_startdate: "2024-01-30",
                    spexhi_enddate: "2024-03-30",
                    spexhiTitle: "迷幻的萬花筒：點點的哲學和無邊無際的領悟",
                    spexhiDesc: "融合了忠於自我的藝術表現和激進大膽的實驗，藝術家不受任何形式的拘束，以圓點與放射條狀圖騰為主題，進行了反覆的探索和呈現，完美地呈現了整個展覽的感官刺激。請隨著點點的引導，沉浸在這個充滿驚喜和探索的藝術之旅中，感受藝術家對視覺的無限詮釋，並讓您的想像力自由飛翔。",
                    spexhiLoc: "展區A",
                },
                
            ],
            currentIndex: 0,
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
    methods: {
        scrollpage(direction) {
            if (direction === 'left') {
                this.currentIndex = (this.currentIndex - 1 + this.spexhibitions.length) % this.spexhibitions.length;
            } else {
                this.currentIndex = (this.currentIndex + 1) % this.spexhibitions.length;
            }
        },
    }
}
</script>
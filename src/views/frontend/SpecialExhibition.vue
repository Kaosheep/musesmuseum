<template>
    <main class="spe_specexhi_main">
        <div class="spe_carousel_header">
            <VerHeader :title="'展 覽 區 Exhibitions'"></VerHeader>
        </div>
        <div class="spe_container">
            <div 
            class="exhi_item" 
            v-for="(exhi,j) in spexhibitions" 
            :key="j">
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
                        <img :src="`${this.$store.state.imgpublicpath}image/exhi/` + item.exh_img" alt="">
                    </div>
                    <div class="spe_exhi_desc">
                        <div class="spe_bgc_deco_a"></div>
                        <div class="spe_bgc_deco_b"></div>
                        <div class="spe_bgc_deco_c"></div>
                        <div class="spe_back_deco">
                        </div>
                        <div class="spe_exhi_desc_deco">
                        </div>
                        <span>{{ exhi.exh_startdate }}-{{ exhi.exh_enddate }}</span>
                        <h3 class="spe_title">{{ exhi.exh_name }}</h3>
                        <p>{{ exhi.exh_desc }}</p>
                        <span class="spe_loc">展覽地點：{{ exhi.exh_loc }}</span>
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
                    <span>{{ exhi.exh_startdate }}-{{ exhi.exh_enddate }}</span>
                </div>
                <div class="spe_m_title">
                    <span>{{ exhi.exh_name }}</span>
                </div>



                <button class="spe_scroll_right" type="button" @click="scrollpage('right')">
                    <img src="@/assets/image/paint/arrow.svg" alt="" />
                </button>
            </div>
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
            spexhibitions: [],
            currentIndex: 0,
        };
    },
    computed: {
        // formattedExhibitionDate() {
        //     const startDate = new Date(this.spexhi_startdate);
        //     const endDate = new Date(this.spexhi_enddate);
        //     const formattedStartDate = startDate.toLocaleDateString();
        //     const formattedEndDate = endDate.toLocaleDateString();
        //     return `${formattedStartDate} - ${formattedEndDate}`;
        // },
    },
    methods: {
        scrollpage(direction) {
            if (direction === 'left') {
                this.currentIndex = (this.currentIndex - 1 + this.spexhibitions.length) % this.spexhibitions.length;
            } else {
                this.currentIndex = (this.currentIndex + 1) % this.spexhibitions.length;
            }
        },
        fetchexhi() {
            fetch(`${this.$store.state.publicpath}spex_fetch.php`).then(async (response) => {
                this.spexhibitions = await response.json();
            });
        }
    },
    mounted() {
    this.fetchexhi();
  },
}
</script>
<template>
    <main class="specexhi_main">
        <!-- 導覽列 -->
        <div class="carousel_header">
            <VerHeader :title="'畫 作 區 Paintings'"></VerHeader>
        </div>
        <div class="container">
            <!-- 搜尋列 -->
            <div class="exb_search">
                <Searchbar></Searchbar>
            </div>
            <div class="slideshow">
                <div class="slideshow_main">
                    <router-link to="/SpecialExhibition"></router-link>
                    <span>當期展覽</span>
                    <img src="@/assets/image/exhibition/specialexhibition/spec_ex0.jpg" alt="">
                    <div class="deco_main"></div>
                </div>
                <div class="slideshow_left">
                    <img src="@/assets/image/exhibition/specialexhibition/spec_ex1.png" alt="">
                </div>
                <div class="slideshow_right">
                    <img src="@/assets/image/exhibition/specialexhibition/spec_ex3.jpg" alt="">
                </div>
            </div>
        </div>
    </main>
</template>
<script>
import VerHeader from '/src/components/VerHeader.vue'
import Searchbar from '/src/components/Searchbar.vue'
export default {
    components: {
        VerHeader,
        Searchbar,
    }
}
</script>
<style scoped lang="scss"></style>
<template>
    <main class="spaceMap_main">

        <div class="space_title">
            <h2>周邊景點</h2>
            <h2>Attractions</h2>
        </div>
        <div class="map">
            <img src="@/assets/image/space/map.png" alt="">
            <div class="map_pf">
                <img src="@/assets/image/space/mapPF.png" alt="">
            </div>
        </div>
    </main>
</template>

<script>

export default {
    data() {
        return {

        };
    },
    methods: {

    }, mounted() {
        document.body.style.height = `auto`;
    }
};
</script>
<style scoped lang="scss">
.space_title{
    width: 215px;
    border-radius: 8px;
    background-color: $mpink;
    padding: 5px 50px;
    box-shadow: 8px 8px 0px $myellow;
    h2{
        color: #fff;
        
    }
}
.spaceMap_main {
    width: 83.33%;
    margin: 1% auto;


    .map {
        width: 100%;
        position: relative;
        margin-top: 20px;

        .map_pf {
            position: absolute;
            top: 80%;
            bottom: 0;
            right: 0;
            left: 80%;
        }
    }

    img {
        width: 100%;
        padding: 10px;
        vertical-align: top;
    }

}
</style>
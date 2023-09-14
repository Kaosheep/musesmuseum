<template>
    <main class="spaceShop_main">

        <div class="space_title">
            <h2>館內商店</h2>
            <h2>Shop</h2>
        </div>
        <div class="space_card">
            <div class="space_img">
                <img src="../assets/image/space/spaceTheShop.png" alt="">
            </div>
            <div class="space_info">
                <div class="space_text">
                    <p>您可以尋找到美麗的明信片、精彩的博物館商品、精緻的手工藝品以及具有特色的紀念品，希望您帶回一些特別的東西，以永久紀念您在博物館的難忘時光。</p>
                </div>
                <div class="shadow"></div>
            </div>
        </div>
        <div class="space_title">
            <h2>咖啡廳</h2>
            <h2>Cafe</h2>
        </div>
        <div class="space_card_re">
            <div class="space_info">
                <div class="space_text">
                    <p>提供各式咖啡、茶和點心，讓您盡情品味。室內舒適的座椅，希望您在寧靜的氛圍中放鬆身心，另外提供免費的Wi-Fi，讓您可以隨時與親朋好友分享您在博物館的體驗。</p>
                </div>
                <div class="shadow_re"></div>
            </div>
            <div class="space_img">
                <img src="../assets/image/space/spaceTheShop.png" alt="">
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
.space_title {
    width: 215px;
    border-radius: 8px;
    background-color: $mblue;
    padding: 5px 50px;

    h2 {
        color: #fff;

    }
}

.space_card {
    width: 100%;
    display: flex;
    margin: 5%;

    img {
        width: 100%;
        vertical-align: top;
    }

    .space_info {
        margin: 0 30px;
        position: relative;

        .space_img {
            width: 50%;
            margin: 10px;

        }

        div {
            width: 392px;
            height: 228px;
            border-radius: 10px;

        }

        .space_text {
            padding: 30px;
            background: #fff;
            z-index: 10;
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px dashed $mblue;
        }

        .shadow {
            z-index: 1;
            margin-top: 15px;
            margin-left: 15px;
            border: 2px dashed $mpink;
            background: #EC396B;
            border-spacing: 10px ;
        }
    }
}
.space_card_re {
    width: 100%;
    display: flex;
    margin: 5%;

    img {
        width: 100%;
        vertical-align: top;
    }

    .space_info {
        margin: 0 30px;
        position: relative;

        .space_img {
            width: 50%;
            margin: 10px;

        }

        div {
            width: 392px;
            height: 228px;
            border-radius: 10px;

        }

        .space_text {
            padding: 30px;
            background: #fff;
            z-index: 10;
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px dashed $mblue;
        }

        .shadow_re{
            z-index: 1;
            margin-top: 15px;
            margin-left: -15px;
            border: 2px dashed $mblue;
            background: #009CA8;
    
        }
    }
}

.spaceShop_main {
    width: 83.33%;
    margin: 1% auto;
}
</style>
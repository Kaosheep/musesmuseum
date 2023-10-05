<template>
    <div class="stepbar">
        <div>
            <p>確認商品</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 73 19">
            <line x1="0.517578" y1="17.3965" x2="72.7871" y2="17.3965" />
            <line x1="71.7612" y1="16.9869" x2="55.7612" y2="1.98688" />
        </svg>
        <div>
            <p>配送方式<br />&<br />填寫資料<br /></p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 73 19">
            <line x1="0.517578" y1="17.3965" x2="72.7871" y2="17.3965" />
            <line x1="71.7612" y1="16.9869" x2="55.7612" y2="1.98688" />
        </svg>
        <div>
            <p>完成訂購</p>
        </div>
    </div>
    <div class="shopping_success">
        <h2>訂單編號：#{{po_id}}</h2>
        <h3>我們盡快處理您的訂單，若想查詢訂單請至 <router-link to="">會員專區</router-link> 查詢訂單的處理情形。非常感謝您的惠顧!!</h3>
    </div>
</template>

<script>
export default {
    data() {
        return {
            mbr_id: 'M0001',
            po_id: "",
            publicpath: "http://localhost/musesmuseum/public/phps/",
        };
    },
    computed: {},
    watch: {},
    methods: {
        //給會員編號，把該筆訂單編號抓回來
        fetchPO() {
        const URL = `${this.publicpath}shopping_getpoid.php`;
        const formData = new URLSearchParams();
        formData.append('mbr_id', this.mbr_id);
        fetch(URL, {
            method: 'POST',
            headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8'
            },
            body: formData,
        }).then(response => {
            return response.json();
        }).then(result => {
            this.po_id = result[0].po_id;
        }).catch(error => console.log(error));
        },
    },
    mounted() {
        this.fetchPO();
    }

};
</script>
<style scoped lang="scss">
.stepbar{
    width: 85%;
    margin: 2rem auto;
    display: flex;
    align-items: center;
    justify-content: center;
    @include m() {
            width: 100%;
    }
    div{
        border-radius: 50%;
        border: 3px solid $myellow;
        margin: 1%;
        width: 100px;
        height: 100px; 
        display: flex;
        justify-content: center;
        align-items: center;
        @include t() {
            width: 85px;
            height: 85px;
        }   
        p{
            text-align: center;
            color: $mgreen;
            @include m() {
                font-size: 14px;
            }
        }
    }
    div:nth-child(5){
        background: $myellow;
    }
    svg{
        margin: 1%;   
        width: 20%;
        height: 19px;
        fill: none;
        @include t() {
            margin: 0.5%;
            width: 15%;
            height: 19px;
        }
        @include m() {
            margin: 0.5%;
            width: 12%;
            height: 19px;
        }
        line{
            stroke: $myellow;
            stroke-width: 3px;
        }
    }
};
.shopping_success{
    width: 50%;
    margin: 4rem auto;
    text-align: left;
    border: 1px dashed $mpink;
    padding: 0 1rem;
    h2{
        padding: 2rem 0;
    }
    h3{
        padding: 2rem 0;
    }
    a{
        font-size: 1.2rem;
    }
};
</style>
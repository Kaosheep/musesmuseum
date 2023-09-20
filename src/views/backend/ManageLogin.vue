<template>
    <main>
        <div>
            <form action="">
                <img src="../../assets/image/logo/logo.png" alt="">
                <div>
                    <div>
                        <label>管理員帳號:</label>
                        <input type="text">
                    </div>
                    <div>
                        <label>管理員密碼:</label>
                        <input type="text">
                    </div>
                    <div>
                        <button>
                            <RouterLink to="/DashBoard">登入</RouterLink>
                        </button>
                    </div>


                </div>
            </form>
        </div>
    </main>
</template>
   
<script>
export default {
    data() {
        return {

        }
    },
    methods: {

    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
@import "@/assets/sass/style.scss";

main {
    width: 100vw;
    height: 100vh;
    // background-image: linear-gradient(to bottom right, #009CA8, #FBF796);
    // background-image: linear-gradient(to bottom right, #000000, #ffffff);
    justify-content: center;
    display: flex;
    box-shadow: inset -20px -17px 20px 17px rgba(247, 0, 0, 0.2);
    padding: 20px;
    border-radius: 10px;

    div {

        form {
            background-color: rgba(255, 255, 255, 0.6);
            border-radius: 10px;
            align-items: center;
            border-radius: 10px;
            padding: 10px;
            display: block;
            color: #fff;

            img {
                display: block;
                padding: 10px;
                width: 50%;
                margin: 0 auto;
            }

            div {
                margin: 0 auto;
                text-align: center;

                div {
                    align-items: center;
                    margin: 10px;

                    input {
                        background-color: transparent;
                        border: 0;
                        box-shadow: inset 9px 2px 20px 0px rgba(247, 0, 0, 0.2);
                        border-radius: 10px;
                        padding: 5px;
                        margin-top: 10px;
                        text-align: center;
                    }
                }
            }
        }
    }
}
</style>
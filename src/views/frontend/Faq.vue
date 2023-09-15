<template>
    <Header></Header>
    <div class="Fqaoutside">
        <h2 class="Fqa-title">{{ text }}</h2>
        <main class="Fqa-main">
            <aside class="Fqa-aside">
                <ul>
                    <li v-for="(title, index) in fqaNav" :key="index" class="Fqa-li">
                        <a class="Fqa-a" :href="'#qaNav' + index">{{ title }}</a>
                    </li>
                </ul>
            </aside>
            <div class="FQA-QA">
                <div v-for="(section, sectionIndex) in sections" :key="sectionIndex" :class="FQA - QAitem">
                    <h3 class="FQA-questionH2" :id="'qaNav' + (sectionIndex + 1)">{{ fqaNav[sectionIndex + 1] }}</h3>
                    <div class="FQA-QAitem" v-for="(qa, qaIndex) in section" :key="qaIndex">
                        <h4 @click="toggleAnswer(sectionIndex, qaIndex)">{{ qa.question }}</h4>
                        <p v-html="qa.answer" :id="'qaAnswer' + sectionIndex + '-' + qaIndex" style="display: none;"></p>
                    </div>
                </div>
            </div>

        </main>
    </div>
</template>
  
<script>
import Header from '@/components/Header.vue';

export default {
    data() {
        return {
            text: "常見問題",
            fqaNav: [
                "全部",
                "營業時間",
                "票價資訊",
                "博物館相關",
                "導覽服務",
                "無障礙服務",
            ],
            sections: [
                [
                    {
                        question: "Q1.請問每天可以參觀的時間是什麼時候？會有固定公休時間嗎？",
                        answer: "A:<br>周二～周四：０９００開館、２１：００閉館(最後入場時間１６：３０)<br>周一：休館<br>除農曆新年（除夕、大年初一、初二）、其餘國定假日皆正常開放。<br>（如星期一碰到補假日，則正常營業。）",
                    },
                    {
                        question: "Q2.颱風天會休假嗎？",
                        answer: "颱風天視當天氣候，歡迎致電詢問或查詢官網。",
                    },
                ],
                [
                    {
                        question: "Q1.請問每天可以參觀的時間是什麼時候？會有固定公休時間嗎？",
                        answer: "A:<br>周二～周四：０９００開館、２１：００閉館(最後入場時間１６：３０)<br>周一：休館<br>除農曆新年（除夕、大年初一、初二）、其餘國定假日皆正常開放。<br>（如星期一碰到補假日，則正常營業。）"
                    },
                ],
                [
                    {
                        question: "Q1.博物館內可以飲食嗎？可以抽菸嗎？",
                        answer: "A:<br>博物館內禁止飲食，若要飲食則須到露天區，或使用博物館內的附設餐廳。<br>抽菸請到「吸菸區」，一樓、二樓皆有附設"
                    },
                    {
                        question: "Q2.博物館內可以拍照&攝影嗎？",
                        answer: "A:<br>出於保護展品和維護展覽品的完整性，我們禁止在特定區域進行攝影。請在進入這些區域之前仔細閱讀相關指示。"
                    },
                    {
                        question: "Q3.請問博物館接受退票、或更換票券、或更換場次嗎？",
                        answer: "A:<br>可以，只要還未使用，都可以透過線上取消訂單或著人工退款(請至售票亭)"
                    },
                    {
                        question: "Q4.請問博物館有提供輪椅或嬰兒車嗎？",
                        answer: "A:<br>博物館內有提供輪椅及嬰兒車租借，請攜帶有效證件(如:身分證、駕照、健保卡、護照、等……)至1樓服務處。"
                    },
                    {
                        question: "Q5.請問在博物館內有提供無線上網的服務嗎？",
                        answer: "A:<br>有的。本館館內有提供Wi-Fi（iTaoyuan）免費無線上網，請民眾自備筆記型電腦或其他上網裝置。"
                    },
                    {
                        question: "Q6.請問在博物館內遺失物品該如何找尋？",
                        answer: "A:<br>遺失物品若有送到本館都會在1樓服務處，可以到1樓服務處詢問。"
                    },
                    {
                        question: "Q7.你們有提供停車場嗎？大型瀏覽車跟電動汽車可以停嗎？",
                        answer: "A:<br>有的。我們有皆有附設停車場，也有大型瀏覽車與電動汽車的專用車位，詳情請看交通資訊。"
                    },
                    {
                        question: "Q8.請問博物館有沒有置放物品的置物箱或置物櫃？需要收費嗎？",
                        answer: "A:<br>有的，在大廳東側，不需要額外收費。(是鑰匙鎖的櫃子，不負保管責任)"
                    },
                ],
                [
                    {
                        question: "Q1.博物館內有提供導覽服務嗎？",
                        answer: "A:<br>有的，我們有提供語音導覽，可在購票時一併提出需求。"
                    },
                    {
                        question: "Q2.博物館內有禮品店跟餐廳嗎？",
                        answer: "A:<br>有的，我們有提供禮品店及餐廳，禮品店內提供寄送明信片服務，歡迎使用。)"
                    },

                ],
                [
                    {
                        question: "Q1.博物館內有無障礙服務嗎？",
                        answer: "A:<br>我們的地面基本都是平整，若有碰到階梯都有提供坡道，1樓到2樓也有提供電梯服務，若需要輪椅租借請洽1樓服務處。)"
                    },
                ],
            ],
        };
    },
    mounted() {
        document.body.style.height = `auto`;
    },
    components: {
        Header
    },
    methods: {
        toggleAnswer(sectionIndex, qaIndex) {
            const answerId = 'qaAnswer' + sectionIndex + '-' + qaIndex;
            const answerElement = document.getElementById(answerId);
            if (answerElement.style.display === "none") {
                answerElement.style.display = "block";
            } else {
                answerElement.style.display = "none";
            }
        },
    },
};
</script>
  
<style scoped lang="scss">
@import "@/assets/sass/style.scss";
@import "@/assets/sass/page/_Fqa.scss";
</style>
  
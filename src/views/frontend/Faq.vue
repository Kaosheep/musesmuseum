<template>
    <div class="Fqaoutside">
        <div class="Fqa-title">
            <h1>常見問題 FAQ</h1>
        </div>
        <main class="Fqa-main">
            <aside class="Fqa-aside" style="display: none;">
                <ul>
                    <li v-for="(title, index) in fqaNav" :key="index" class="Fqa-li">
                        <a class="Fqa-a" :href="'#qaNav' + index">{{ title }}</a>
                    </li>
                </ul>
            </aside>
            <div class="FQA-QA">
                <div v-for="(section, sectionIndex) in   sections  " :key="sectionIndex" :class="FQA - QAitem">
                    <h3 class="FQA-questionH2" :id="'qaNav' + (sectionIndex + 1)">{{ fqaNav[sectionIndex + 1] }}
                    </h3>

                    <div class="FQA-QAitem" v-for="(qa, qaIndex) in   section  " :key="qaIndex">
                        <div class="FQA-item mgreen" :id="'FQA-item' + sectionIndex + '-' + qaIndex"
                            style="border-color: #009CA8;" @click="toggleAnswer(sectionIndex, qaIndex)">
                            <h4 class="FQA-questionH3 ">
                                {{ qa.question }}
                            </h4>
                            <span class="Fqa-plus ">
                                <span class="Fqa-plusC" :id="'FqaPlusC' + sectionIndex + '-' + qaIndex"
                                    style="display:block;"></span>
                                <span class="Fqa-plusR"></span>
                            </span>

                        </div>
                        <p class="fqa-answer" v-html="qa.answer" :id="'qaAnswer' + sectionIndex + '-' + qaIndex"
                            style="display: none; border-color: #009CA8;"></p>

                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
  
<script>
import Header from '@/components/Header.vue';
import { Footer } from 'view-ui-plus';

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
                        answer: "A:<br>周一：休館<br>周二～周四：０９００開館、２１：００閉館(最後入場時間１６：３０)<br>除農曆新年（除夕、大年初一、初二）、其餘國定假日皆正常開放。<br>（如星期一碰到補假日，則正常營業。）",
                    },
                    {
                        question: "Q2.颱風天會休假嗎？",
                        answer: "A:<br>颱風天視當天氣候，歡迎致電詢問或查詢官網。",
                    },
                ],
                [
                    {
                        question: "Q1.票價多少？",
                        answer: "A:<br>普通票:＄２００：１３歲(含)以上之遊客。<br>兒童票＄１００：３歲(含)至１２歲之兒童。 <br>優待票＄１００：６５歲(含) 以上之長者。<br>愛心票＄１００：持有主管機關核發之身心障礙證明（手冊）者。"
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
        Header,
        Footer
    },
    methods: {
        toggleAnswer(sectionIndex, qaIndex) {
            const answerId = 'qaAnswer' + sectionIndex + '-' + qaIndex;
            const answerElement = document.getElementById(answerId);
            const FqaPlusCId = document.getElementById('FqaPlusC' + sectionIndex + '-' + qaIndex);
            const borderColor = document.getElementById('FQA-item' + sectionIndex + '-' + qaIndex);



            if (answerElement.style.display === "none") {
                answerElement.style.display = "block";
                FqaPlusCId.classList.add('rotate');
                FqaPlusCId.classList.remove('rotate1');
                answerElement.style.borderColor = "#EB5F86";
                borderColor.style.borderColor = "#EB5F86";
            } else {
                answerElement.style.display = "none";
                FqaPlusCId.classList.remove('rotate');
                FqaPlusCId.classList.add('rotate1');
                answerElement.style.borderColor = "#009CA8";
                borderColor.style.borderColor = "#009CA8";
            }
        },
    },
}
</script>
  
<style scoped lang="scss">
.Fqa-plusC.rotate {
    transform: translate(-50%, -50%) rotate(90deg);
    transition: transform 0.3s ease;

}

.Fqa-plusC.rotate1 {
    transform: translate(-50%, -50%) rotate(0deg);
    transition: transform 0.3s ease;

}
</style>
  
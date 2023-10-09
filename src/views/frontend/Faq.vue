<template>
    <div class="Fqaoutside">
        <div class="Fqa-title">
            <h1>常見問題 FAQ</h1>
        </div>
        <main class="Fqa-main">

            <div class="FQA-QA">


                    <div 
                    class="FQA-QAitem" 
                    v-for="(qa, qaIndex) in faqscol" 
                    :key="qaIndex">
                        <div 
                        class="FQA-item mgreen" 
                        :id="'FQA-item' + sectionIndex + '-' + qaIndex"
                        style="border-color: #009CA8;" @click="toggleAnswer(sectionIndex, qaIndex)"
                        >
                            <h4 class="FQA-questionH3 ">
                                {{ qa.faq_question }}
                            </h4>
                            <span class="Fqa-plus ">
                                <span 
                                class="Fqa-plusC" 
                                :id="'FqaPlusC' + sectionIndex + '-' + qaIndex"
                                style="display:block;"
                                ></span>
                                <span class="Fqa-plusR"></span>
                            </span>
                        </div>
                        <p 
                        class="fqa-answer"
                        :id="'qaAnswer' + sectionIndex + '-' + qaIndex"
                        style="display: none; border-color: #009CA8;">
                            {{ qa.faq_ans }}
                        </p>
                    </div>
                </div>
            <!-- </div> -->
        </main>
    </div>
</template>
  
<script>
import Header from '@/components/Header.vue';
import { Footer } from 'view-ui-plus';

export default {
    data() {
        return {
            // text: "常見問題",
            // fqaNav: [
            //     "全部",
            //     "營業時間",
            //     "票價資訊",
            //     "博物館相關",
            //     "導覽服務",
            //     "無障礙服務",
            // ],
            faqscol: [],
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
        fetchfaq() {
            fetch(`${this.$store.state.publicpath}faq_fetch.php`).then(async (response) => {
                this.faqscol = await response.json();
            });
        },
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
    mounted() {
        this.fetchfaq();
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
  
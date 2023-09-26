<template>
  <span class="paintd_span"></span>
  <span class="paintd_span2"></span>
  <main>
    <div class="paintd_container">
      <div class="img">
        <img :src="require(`@/assets/image/paint/paint${nowid}.jpg`)" alt="" />
      </div>
      <div class="line"></div>
      <div class="txtcard">
        <h2>{{ foundObject.imgname }}</h2>
        <h2>{{ foundObject.imgen }}</h2>
        <p>story</p>
        <div class="story">
          {{ foundObject.story }}
        </div>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  data() {
    return {
      paintings: [
        {
          id: 0,
          imgname: "凡爾賽宮德皇登基",
          imgen: "loremlorem",
          story: `1871年，普魯士國王威廉一世在法國凡爾賽宮登基為德意志帝國的皇帝，標誌著德國統一的完成。這一歷史事件結束了德國眾多分散的國家和城邦，形成了一個統一的國家實體。此前，由於歷史和政治原因，德國一直是由各種獨立的君主國和地區組成，統一長期未能實現。
          威廉一世登基為德皇後，德意志帝國成為歐洲一個重要的政治力量。德國的統一也標誌著普魯士的優勢地位，並且帶動了德國的現代化和工業化進程。然而，這一統一同時也引發了後來的地緣政治問題，成為20世紀初兩次世界大戰的重要背景之一。
          總之，1871年的凡爾賽宮德皇登基事件，標誌著德意志帝國的成立和德國統一的實現，對於歐洲和世界歷史都具有深遠的影響。
`,
        },
        {
          id: 1,
          imgname: "伏爾加河上的縴夫",
          imgen: "loremlorem",
          story: `「伏爾加河上的縴夫」是俄羅斯畫家伊萬·阿伯拉莫維奇·阿伽菲於19世紀創作的著名畫作。畫中描繪了一位縴夫勇敢地划船穿越伏爾加河的場景，這位縴夫臉上堅毅的表情和有力的舉動象徵著俄羅斯人民的勇氣和努力。

這幅畫作富有象徵性，代表著勇氣面對困難和追求目標的精神。縴夫這個角色在俄羅斯文化中有著深遠的影響，被視為民間英雄和堅毅不拔的標誌。阿伽菲通過這幅畫作展現了俄羅斯人民的自豪和努力，同時也呼應了當時的社會背景和價值觀。

「伏爾加河上的縴夫」成為了俄羅斯藝術的經典之作，也將俄羅斯人民的精神永遠地鎖定在了畫布上，成為了歷久彌新的國家象徵。這幅畫作不僅是一個藝術品，更是一個代表著俄羅斯精神的符號。

        `,
        },
        {
          id: 2,
          imgname: "俄國婦女",
          imgen: " Russian women",
          story: `俄國婦女在歷史中扮演著多樣且重要的角色。19世紀，一些婦女參與了農村和城市的社會和政治運動，爭取平等權利和改革。她們參與農村勞動，同時也參與社會工作，推動社會改變。20世紀初，婦女參與了1905年革命，爭取選舉權和社會改革，並在這個過程中展現出堅毅和勇氣。

在蘇聯時期，婦女在勞動、教育和政治領域都有所貢獻，特別是在二戰期間。然而，性別不平等仍然存在，婦女在某些領域面臨著限制。蘇聯解體後，俄國婦女繼續參與社會和政治活動，爭取平等和權利，並在各個領域取得了一些成就。

俄國婦女在歷史中扮演著重要的角色，從農村到城市，參與著社會和政治運動，為平等權利和社會改革努力。她們的努力和貢獻在俄國歷史和社會中不可忽視。
`,
        },
        {
          id: 3,
          imgname: "哺乳聖母",
          imgen: "loremlorem",
          story: `哺乳聖母是基督教藝術中一個重要且具有象徵性的主題，尤其在中世紀和文藝復興時期的藝術作品中被廣泛描繪。這個主題呈現了聖母瑪利亞將嬰兒耶穌哺育在懷中的情景，融合了母親的愛和神的恩寵。

這個形象所表達的涵義豐富多彩。首先，它突顯了聖母瑪利亞作為耶穌的母親所具有的母愛。透過這種描繪，藝術家們試圖表達出母親無私的關愛，將這種人間的愛與神聖的元素相結合。其次，這個場景強調了耶穌基督作為救主的角色。哺乳聖母的形象象徵著基督是我們屬靈的糧食，以及他為世人的救贖而降臨。

在藝術史上，哺乳聖母的描繪方式各異，但核心的元素通常保持不變：聖母瑪利亞將嬰兒耶穌擁入懷中，向觀者展現出母親般的親密和關愛。這種情感的呈現通過藝術形式傳遞給觀眾，喚起他們的信仰和虔誠。這些畫作往往還以寫實的技巧和精緻的細節呈現，使觀者感受到這個神聖場景的真實感。

\哺乳聖母是基督教藝術中一個充滿情感和宗教象徵意義的重要主題。這個描繪將母愛和救贖的主題融合在一起，呈現出聖母瑪利亞作為耶穌的母親和基督救世主的形象，成為藝術作品中的靈性饗宴。
`,
        },
        {
          id: 4,
          imgname: "女貴族莫洛卓娃",
          imgen: "loremlorem",
          story: `女貴族莫洛卓娃，是清朝康熙帝的女兒，以其聰明才智和卓越的外交手腕而聞名於世。她在清朝歷史上扮演著重要的外交角色，特別是在與俄國的外交往來中。

莫洛卓娃不僅精通多種語言，還具備卓越的政治洞察力。她被派遣出使俄國，參與簽訂《恰克圖條約》等外交條約，有效地維護了清朝的國家利益。她的外交成就不僅體現在條約的簽訂，還體現在她的交涉和外交策略上，為清朝的外交政策作出了積極的貢獻。

莫洛卓娃的外交才華為清朝在國際事務中贏得了尊重和影響力，她的名字成為清朝外交史上不可忽視的一部分。她的故事也啟發後人，尤其是女性，追求知識和參與國家事務的勇氣和決心。
`,
        },
        {
          id: 5,
          imgname: "尼古拉二世婚禮",
          imgen: "loremlorem",
          story: `尼古拉二世婚禮是1894年的重要事件，當時他與德國的阿歷克謝莉·費奧多羅芙娜結婚。這場盛大的皇室婚禮不僅在俄國國內受到關注，也在國際間引起關注。

然而，尼古拉二世的結婚並未改變俄國的內部問題。他的統治時期充滿了政治不穩定和社會不滿，這些問題在他的婚禮後仍然持續存在。此外，他的妻子出身德國，在俄國民眾中引起了一些不滿情緒，認為她可能對俄國政治產生影響。

尼古拉二世婚禮後，俄國社會和政治局勢逐漸惡化，最終導致了1905年的俄國革命，並為他的統治埋下了動盪的種子。婚禮雖然是皇室的重要事件，但未能解決國內問題，反而成為了尼古拉二世統治的一個轉折點。

總之，尼古拉二世婚禮雖然在俄國歷史和國際關係中有著重要地位，但卻未能改變當時國內的問題，反而加劇了政治不穩定，成為尼古拉二世統治的一個重要標誌。
`,
        },
        {
          id: 6,
          imgname: "彼得一世",
          imgen: "loremlorem",
          story: `彼得一世（1672-1725），俄羅斯的重要君主，對國家進行了深刻的現代化改革。他創建聖彼得堡，成為新的首都，推動西方化，引進技術和文化，改革軍隊和政府機構，大幅改變了俄國的面貌。

彼得一世積極參與國際事務，擴張領土，北方戰爭期間獲得了波羅的海沿岸的重要地區。他的改革推動了俄國的現代化和工業化，並建立了現代的軍事力量。然而，他的改革也引起了一些社會不滿，因為改革帶來了劇變。

彼得一世的統治不僅在俄羅斯歷史上留下了深遠影響，也對世界歷史產生了影響。他使俄國從一個封閉的國家變成了一個現代化的國家，並在國際事務中發揮了重要作用。他被譽為「大」彼得，是一位傑出的政治家和改革者，對俄國和全球歷史都產生了深遠影響。
`,
        },
        {
          id: 7,
          imgname: "拿破崙",
          imgen: "loremlorem",
          story: `拿破崙（Napoleon Bonaparte，1769-1821）是法國歷史上一位傑出的軍事家、政治家和統治者。他在法國大革命時期嶄露頭角，展現出非凡的軍事才華和領導能力。隨著時間的推移，他成為法國的領袖，最終建立了法蘭西第一帝國，並自封為皇帝。

拿破崙的影響遠達歐洲，他進行了一系列的改革和政治變革，包括法律制度、行政組織和經濟政策。他的統治期間，法國經歷了政治動盪和戰爭，但也實現了一定程度的現代化和國家強大。然而，他的統治也受到了批評，包括他的戰爭擴張政策和統治方式。
`,
        },
        {
          id: 8,
          imgname: "拿破崙加冕",
          imgen: "loremlorem",
          story: `1804年，拿破崙舉行了標誌性的加冕儀式，正式將自己加冕為法蘭西皇帝，這是他個人和法國帝國歷史上的重要時刻。這場盛大的儀式在巴黎聖母院舉行，許多人見證了他的加冕。

加冕儀式象徵著拿破崙統治下的法蘭西帝國的建立，同時也凸顯了他的權力和地位。他戴上皇冠，穿上皇帝禮服，進行了宏偉的加冕禮儀。這個儀式不僅是一個政治行動，更是一個象徵，將法國的歷史與拿破崙的個人事業聯繫在一起。

拿破崙的加冕是法國歷史的一個重要事件，它象徵了法蘭西帝國的興起和拿破崙的統治。然而，這段歷史也充滿了爭議和褒貶，對拿破崙和他的統治方式有著不同的評價。無論如何，他的加冕儀式成為了法國歷史上不可忽視的一頁，反映了那個時代的政治和文化風貌。
`,
        },
        {
          id: 9,
          imgname: "施洗者約翰與聖母",
          imgen: "loremlorem",
          story: `施洗者約翰和聖母瑪利亞是基督教聖經中兩位極為重要的人物。施洗者約翰是一位先知和傳教者，他在約旦河為人施洗，宣揚悔改和預言救主的到來。他的傳教活動引領人們歸向上帝，為耶穌的來臨做好準備。

聖母瑪利亞是耶穌的母親，被認為是上帝的恩寵所選，生下了救世主。她在天使加百列的啟示下懷孕，毫無玷污地生下耶穌，成為了救世主的母親。她的生命和使命彰顯了虔誠和順服，同時也見證了神的神蹟。

施洗者約翰和聖母瑪利亞的存在和貢獻緊密相關，他們共同見證了耶穌的降臨和神的計劃。施洗者約翰的傳教為耶穌的事工鋪平了道路，而聖母瑪利亞的順服和母愛則成就了救贖的使命。

施洗者約翰和聖母瑪利亞在基督教教義和信仰中具有重要地位。他們的生命故事和使命彰顯了虔誠、順服和神的計劃，對基督教歷史和信仰產生了深遠影響。
`,
        },
        {
          id: 10,
          imgname: "查理五世",
          imgen: "loremlorem",
          story: `查理五世（1500-1558）是神聖羅馬帝國的皇帝，同時也是西班牙國王，出生於哈布斯堡王朝。他的統治時期是歐洲歷史上重要的時期，涵蓋了宗教改革、帝國政治和國際關係。

查理五世的統治地區龐大，包括神聖羅馬帝國、西班牙帝國、荷蘭等。他致力於保護天主教的統一，參與了反對宗教改革的戰爭，並在斯基普提會議上試圖解決教會分裂問題。他在帝國事務和國際政治中也發揮了重要作用，努力維護帝國的統一和穩定。

然而，查理五世面臨著宗教改革和地區衝突等挑戰，他的統治也受到了一些內外因素的影響。最終，由於種種原因，他於1556年退位，將神聖羅馬帝國的統治權轉交給了他的兒子菲利普二世，而將西班牙的統治權交給了他的弟弟費爾南多。

查理五世是歐洲歷史上一位重要的君主，他的統治涵蓋了多個領域，並在宗教、政治和國際事務中發揮了重要作用。
`,
        },
        {
          id: 11,
          imgname: "特洛伊王子",
          imgen: "loremlorem",
          story: `特洛伊王子赫克托耳是希臘神話中傑出的英雄之一，他擁有非凡的戰鬥才能、智慧和領導能力。作為特洛伊國王普里阿摩斯的兒子，他在特洛伊戰爭中扮演了重要角色。他勇敢地領導特洛伊人對抗希臘聯軍，並在戰場上展現出非凡的勇氣，特別是在與亞基里斯的單挑中。然而，他最終遭到了帕里斯的背叛，被雅典娜引導的帕里斯殺死，這對特洛伊人造成了巨大的損失。

赫克托耳的故事彰顯了他的英雄品質和犧牲精神，他為保衛家園和榮譽而奮戰，最終以生命為代價。他的形象在文學、藝術和文化中廣泛存在，成為古希臘英雄傳說中的重要角色之一，也象徵著勇氣、忠誠和奮鬥的精神。
`,
        },
      ],
      foundObject: {},
      nowid: 0,
    };
  },
  methods: {},
  mounted() {
    const idToFind = parseInt(this.$route.params.id);
    this.foundObject = this.paintings.find((item) => item.id === idToFind);
    this.nowid = parseInt(this.$route.params.id);
  },
};
</script>

<style scoped lang="scss">
main {
  width: 85%;
  max-width: 1280px;
  margin: auto;
  height: 100vh;
  padding-right: 2rem;
  overflow: hidden;
  @include t() {
    height: auto;
    padding: 0;
    overflow: visible;
  }
  @include m(){
    width: 95%;
  }
  .paintd_container {
    display: flex;
    height: 100%;
    padding: 3rem 0;
    justify-content: space-between;
    align-items: center;
    @include t() {
      flex-direction: column;
    }
    .img {
      width: 60%;
      height: 95%;
      @include dotfm();
      @include t() {
        width: 100%;
      }

      img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
        border: 3px solid $mgreen;
      }
    }
    .txtcard {
      width: 30%;
      height: 100%;
      border: 2px solid $mgreen;
      border-radius: 10px;
      @include shadowrb();
      padding: 1.5rem;
      position: relative;
      background-color: #fff;
      @include t() {
        width: 100%;
        margin-top: 2rem;
      }
      &::after {
        content: "";
        position: absolute;
        height: 110%;
        width: 120%;
        top: -1%;
        left: -2%;
        background-color: #fff;
        animation: showtxtcard 0.6s 0.45s linear 1 forwards;
        @include t() {
          animation: none;
          display: none;
        }
      }

      @keyframes showtxtcard {
        0% {
          left: -2%;
        }
        100% {
          left: 110%;
        }
      }
      h1,
      h2 {
        text-align: center;
        margin: 0;
      }
      p {
        background-color: $myellow;
        display: inline-block;
        padding: 0 5px;
        margin-top: 1.5rem;
      }
      .story {
        margin-top: 1rem;
        height: 60%;
        overflow-y: scroll;
        padding-right: 1rem;
        &::-webkit-scrollbar {
          width: 7px;
          height: 7px;
          background-color: #fff;
          border-radius: 4px;
        }

        &::-webkit-scrollbar-track {
          background: #fff;
          border-radius: 4px;
        }

        &::-webkit-scrollbar-thumb {
          background: $mgreen;
          border-radius: 4px;
        }
      }
    }
    .line {
      width: 10%;
      position: relative;
      &::after {
        content: "";
        position: absolute;
        width: 120%;
        height: 4px;
        background: linear-gradient(90deg, transparent 50%, #009ca8 50%);
        background-size: 200% 200%;
        top: 0;
        right: 0;
        animation: showline 0.3s 0.15s linear 1 forwards;
        @include t() {
          animation: none;
          display: none;
        }
      }
      &::before {
        content: "";
        position: absolute;
        width: 20px;
        height: 20px;
        background: linear-gradient(90deg, transparent 50%, #009ca8 50%);
        background-size: 200% 200%;
        top: -8px;
        left: -30%;
        border-radius: 50%;
        animation: showline 0.15s 0s linear 1 forwards;
        @include t() {
          animation: none;
          display: none;
        }
      }
    }
    @keyframes showline {
      0% {
        background-position: 0% 0%;
      }
      100% {
        background-position: -100% 0%;
      }
    }
  }
}
.paintd_span {
  position: absolute;
  right: 0;
  bottom: 0;
  height: 300px;
  width: 100px;
  background: radial-gradient(
    $mgreen 20%,
    transparent 21%,
    transparent 79%,
    $mgreen 80%
  );
  background-size: 1em 1em;
  background-color: #ffffff;
  opacity: 1;
  z-index: -10;
}
.paintd_span2 {
  position: absolute;
  right: 50%;
  top: 3%;
  height: 300px;
  width: 100px;
  background: radial-gradient(
    $mgreen 20%,
    transparent 21%,
    transparent 79%,
    $mgreen 80%
  );
  background-size: 1em 1em;
  background-color: #ffffff;
  opacity: 1;
  z-index: -10;
}
</style>

<template>
  <main class="art_main">
    <span class="circle"></span>
    <div class="title"><VerHeader :title="' 文 物 區 ARTS '"></VerHeader></div>

    <div class="block">
      <div class="btn">
        <button type="button" @click="back">
          <font-awesome-icon :icon="['fas', 'chevron-left']" />
        </button>
        <button type="button" @click="next">
          <font-awesome-icon :icon="['fas', 'chevron-right']" />
        </button>
      </div>
      <div class="artinfo">
        <div class="container">
          <div class="infocard">
            <h2>{{ current.artname }}</h2>
            <h3>{{ current.enname }}</h3>
            <p>{{ current.au }}</p>
            <p style="white-space: pre-line">{{ current.story }}</p>
          </div>
        </div>
      </div>
      <div class="artwarp">
        <ul>
          <span class="light"></span>
          <li style="--i: 1">
            <div class="art"><art0></art0></div>
          </li>
          <li style="--i: 2">
            <div class="art"><art1></art1></div>
          </li>
          <li style="--i: 3">
            <div class="art"><art2></art2></div>
          </li>
          <li style="--i: 4">
            <div class="art"><art3></art3></div>
          </li>
          <li style="--i: 5">
            <div class="art"><art4></art4></div>
          </li>
          <li style="--i: 6">
            <div class="art"><art5></art5></div>
          </li>
        </ul>
      </div>
    </div>
  </main>
</template>

<script>
import art0 from "@/components/art/art0.vue";
import art1 from "@/components/art/art1.vue";
import art2 from "@/components/art/art2.vue";
import art3 from "@/components/art/art3.vue";
import art4 from "@/components/art/art4.vue";
import art5 from "@/components/art/art5.vue";
import VerHeader from "@/components/VerHeader.vue";
export default {
  components: {
    art0,
    art1,
    art2,
    art3,
    art4,
    art5,
    VerHeader,
  },
  data() {
    return {
      value: 0,
      setting: {
        autoplay: false,
        autoplaySpeed: 2000,
        dots: "inside",
        radiusDot: false,
        trigger: "click",
        arrow: "hover",
      },
      infolist: [
        {
          artindex: 0,
          artname: "雪霜白",
          enname: "Snowfrost White",
          story: `有一天，李鶴漫步在村莊的山區，突然在清澈的山泉旁發現了一株特別的白色植物。這種植物的花瓣洁白無瑕，仿佛結了一層薄霜。李鶴被這種純潔和優雅的美所深深吸引，決定將這種美麗帶回村莊。回到陶工坊，他開始思考如何將這種優雅和純潔的美轉化為陶瓷藝術品。經過長時間的實驗和嘗試，他終於研發出一種特殊的白瓷釉料，這種釉料能夠在瓷器上創造出如同那株植物花瓣上的薄霜一樣的純白光澤。`,
          au: "李鶴",
        },
        {
          artindex: 1,
          artname: "埃及陶壺",
          enname: "Egyptian Elegance Vessel",
          story: `約在公元前2500年的古埃及，一位名叫賽赫特的陶匠，以他無與倫比的技藝和無限的創造力，製作了一個優美的陶壺，這個陶壺後來被稱為"埃及寶瓶"。
           這個陶壺的形狀獨特，高約30公分，呈現出完美的對稱，並裝飾有華麗的印花，描繪了當時的埃及神話和神聖的動物，如法老的金字塔和聖牛荷魯斯。陶壺的底部刻有古埃及的魔法符號，據說可以為持有者帶來好運和祝福。
           這個埃及寶瓶成為了當時埃及社會的珍貴珍寶，不僅僅是一個實用的容器，更是一個藝術品和象徵，代表了古埃及文明的繁榮和智慧。`,
          au: "Evangeline Hawthorne",
        },
        {
          artindex: 2,
          artname: "青銅文藝之杯",
          enname: "Bronze Artistry Chalice",
          story: `這個光澤閃亮的容器，最初是由巧妙的冶金師所創造，以展示他們對工藝的深刻理解。
            銅杯，由純淨的銅精煉而成，成為了貴族和統治者的象徵，象徵著權力和尊貴。隨著時間的推移，銅杯變得更加多樣化和精緻。古代藝術家們在杯子上雕刻了美麗的圖案，描繪了神話故事和文化傳說。這些藝術品不僅為銅杯增添了藝術價值，還使它們成為歷史的見證者。
            在中世紀，銅杯成為了教堂典禮的一部分。教士們將聖餐的酒注入華麗的銅杯中，使之成為一種神聖的容器。這些銅杯被傳承下來，保存至今，成為宗教歷史的一部分。
            銅杯的歷史是一部充滿藝術、信仰和文化的壯麗故事。它們不僅是實用工具，還是文明演進的見證，將古老的工藝和現代的設計巧妙結合，成為一個永恆的存在。無論在什麼時代，銅杯都持續地為我們帶來著歷史和美感。`,
          au: "Sebastian Thornefield",
        },
        {
          artindex: 3,
          artname: "碧瓷青花盤",
          enname: "Azure Blossom Porcelain Plate",
          story: `在中國明朝時期，藝術家們創造了一個令人驚嘆的藝術珍品，那就是這個「碧瓷青花盤」。這件作品以其獨特的青花圖案而聞名，這些精細的圖案在白色瓷器上優雅地展現了出來，宛如藍色的星辰在白夜中閃耀。
          它的精緻細膩的青花圖案使其成為了中國陶瓷藝術的瑰寶，也是藝術和愛情的永恆象徵。這件作品至今仍然散發出迷人的光彩，吸引著人們來欣賞和珍藏。`,
          au: "雪梅",
        },
        {
          artindex: 4,
          artname: "薔薇之吟花瓶",
          enname: "Vase of Rose Serenades",
          story: `在18世紀歐洲，一位傳奇的藝術家創造了一個矚目的藝術珍品，那就是這個「薔薇之吟花瓶」。這件作品是由當時最優秀的工匠之一製作的，以其精湛的技藝和獨特的美學而聞名。
            這個花瓶以其精美的玫瑰雕塑而聞名，這些玫瑰花的雕刻栩栩如生，仿佛在花瓶上綻放出瑰麗的芬芳。花瓶的每一個細節都表現出藝術家對自然的深刻理解和熱愛。花瓶上的每一朵玫瑰都是獨一無二的，細節處理得如此精湛，使人難以置信。
            。它被認為是藝術和自然的完美結合，是對美麗和浪漫的最高讚美。這個花瓶的獨特之處在於，它不僅僅是一個藝術品，還是一個故事的載體，傳達著藝術家對愛情和自然的無限熱情。至今，它仍然是世界各地藝術愛好者的珍愛之物。`,
          au: "Isabella Waverley",
        },
        {
          artindex: 5,
          artname: "千禧古幣",
          enname: "Millennium Coins",
          story: `在一個古老的王國，有一種名為「千禧古幣」的神秘貨幣，流傳下來的歷史可追溯到數千年前。這些古幣被認為是神聖的，擁有神奇的力量，因此被廣泛用於崇拜和祭祀活動中。
          「千禧古幣」的名字源自它們的特殊紋飾，上面刻有數字「1000」，象徵著豐富和繁榮。每枚古幣都是由熟練的工匠以純淨的黃金打造而成，並鑄造成圓形，直徑約為兩個手掌大小。古幣的正面刻有一位神祇的形象，而背面則刻有複雜的符號和圖案，據說包含了祈福和祝願的意義。
          這些神秘的古幣在王國的歷史中扮演了重要的角色。它們被用來支付貢品、祈福儀式和國王的御用品。人們相信擁有一枚「千禧古幣」可以帶來好運和神聖的庇佑，因此受到珍重和崇拜。
          儘管已經過去了許多世紀，但這些「千禧古幣」仍然是珍貴的文化遺產，代表著一個遠古文明的繁榮和智慧。今天，它們被收藏家視為極具價值的收藏品，也是博物館中的瑰寶。`,
          au: "anonymous",
        },
      ],
      count: 0,
    };
  },
  computed: {
    countabs() {
      if (this.count<0) {
        return 6-(Math.abs(this.count % 6));
        
      } else {
        return this.count % 6;
      }
    },
    current() {
      return this.infolist.find((info) => info.artindex === this.countabs);
    },
  },
  methods: {
    back() {
      document.querySelector('.container').scrollTop = 0;
      let li = document.querySelectorAll(".artwarp ul li");
      let art = document.querySelectorAll(".artwarp ul li .art");
      this.count--;

      art.forEach((art) => {
        art.style.transform = `translateX(55vw) rotate(calc(360deg / -6 * var(--i) - ${
          this.count * 60
        }deg))`;
      });
      li.forEach((li) => {
        li.style.transform = `rotate(calc(360deg/6 * var(--i) + ${
          this.count * 60
        }deg))`;
      });

    },
    next() {
      document.querySelector('.container').scrollTop = 0;
      let li = document.querySelectorAll(".artwarp ul li");
      let art = document.querySelectorAll(".artwarp ul li .art");
      this.count++;

      art.forEach((art) => {
        art.style.transform = `translateX(55vw) rotate(calc(360deg / -6 * var(--i) - ${
          this.count * 60
        }deg))`;
      });
      li.forEach((li) => {
        li.style.transform = `rotate(calc(360deg/6 * var(--i) + ${
          this.count * 60
        }deg))`;
      });
    },
  },
};
</script>

<style scoped lang="scss"></style>

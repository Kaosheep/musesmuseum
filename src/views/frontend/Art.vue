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
      <div class="container">
        <div class="veiw">
          <div class="warp">
            <div class="infocard" v-for="(a, j) in infolist" :key="j">
              <h2>{{ a.artname }}</h2>
              <h3>{{ a.enname }}</h3>
              <p>{{ a.au }}</p>
              <p>{{ a.story }}</p>
            </div>
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
          artname: "雪霜白",
          enname: "Snowfrost White",
          story:
            "有一天，李鶴漫步在村莊的山區，突然在清澈的山泉旁發現了一株特別的白色植物。這種植物的花瓣洁白無瑕，仿佛結了一層薄霜。李鶴被這種純潔和優雅的美所深深吸引，決定將這種美麗帶回村莊。回到陶工坊，他開始思考如何將這種優雅和純潔的美轉化為陶瓷藝術品。經過長時間的實驗和嘗試，他終於研發出一種特殊的白瓷釉料，這種釉料能夠在瓷器上創造出如同那株植物花瓣上的薄霜一樣的純白光澤。",
          au: "李鶴",
        },
        {
          artname: "埃及陶壺",
          enname: "Egyptian Elegance Vessel",
          story:
            '約在公元前2500年的古埃及，一位名叫賽赫特的陶匠，以他無與倫比的技藝和無限的創造力，製作了一個優美的陶壺，這個陶壺後來被稱為"埃及寶瓶"。<br>這個陶壺的形狀獨特，高約30公分，呈現出完美的對稱，並裝飾有華麗的印花，描繪了當時的埃及神話和神聖的動物，如法老的金字塔和聖牛荷魯斯。陶壺的底部刻有古埃及的魔法符號，據說可以為持有者帶來好運和祝福。這個埃及寶瓶成為了當時埃及社會的珍貴珍寶，不僅僅是一個實用的容器，更是一個藝術品和象徵，代表了古埃及文明的繁榮和智慧。',
          au: "賽赫特",
        },
        {
          artname: "雪霜白",
          enname: "Snowfrost White",
          story:
            "有一天，李鶴漫步在村莊的山區，突然在清澈的山泉旁發現了一株特別的白色植物。這種植物的花瓣洁白無瑕，仿佛結了一層薄霜。李鶴被這種純潔和優雅的美所深深吸引，決定將這種美麗帶回村莊。回到陶工坊，他開始思考如何將這種優雅和純潔的美轉化為陶瓷藝術品。經過長時間的實驗和嘗試，他終於研發出一種特殊的白瓷釉料，這種釉料能夠在瓷器上創造出如同那株植物花瓣上的薄霜一樣的純白光澤。",
          au: "李鶴",
        },
        {
          artname: "雪霜白",
          enname: "Snowfrost White",
          story:
            "有一天，李鶴漫步在村莊的山區，突然在清澈的山泉旁發現了一株特別的白色植物。這種植物的花瓣洁白無瑕，仿佛結了一層薄霜。李鶴被這種純潔和優雅的美所深深吸引，決定將這種美麗帶回村莊。回到陶工坊，他開始思考如何將這種優雅和純潔的美轉化為陶瓷藝術品。經過長時間的實驗和嘗試，他終於研發出一種特殊的白瓷釉料，這種釉料能夠在瓷器上創造出如同那株植物花瓣上的薄霜一樣的純白光澤。",
          au: "李鶴",
        },
        {
          artname: "雪霜白",
          enname: "Snowfrost White",
          story:
            "有一天，李鶴漫步在村莊的山區，突然在清澈的山泉旁發現了一株特別的白色植物。這種植物的花瓣洁白無瑕，仿佛結了一層薄霜。李鶴被這種純潔和優雅的美所深深吸引，決定將這種美麗帶回村莊。回到陶工坊，他開始思考如何將這種優雅和純潔的美轉化為陶瓷藝術品。經過長時間的實驗和嘗試，他終於研發出一種特殊的白瓷釉料，這種釉料能夠在瓷器上創造出如同那株植物花瓣上的薄霜一樣的純白光澤。",
          au: "李鶴",
        },
        {
          artname: "雪霜白",
          enname: "Snowfrost White",
          story:
            "有一天，李鶴漫步在村莊的山區，突然在清澈的山泉旁發現了一株特別的白色植物。這種植物的花瓣洁白無瑕，仿佛結了一層薄霜。李鶴被這種純潔和優雅的美所深深吸引，決定將這種美麗帶回村莊。回到陶工坊，他開始思考如何將這種優雅和純潔的美轉化為陶瓷藝術品。經過長時間的實驗和嘗試，他終於研發出一種特殊的白瓷釉料，這種釉料能夠在瓷器上創造出如同那株植物花瓣上的薄霜一樣的純白光澤。",
          au: "李鶴",
        },
      ],
      count: 0,
    };
  },
  methods: {
    back() {
      let cardh = document.querySelector(".infocard").offsetHeight;
      let li = document.querySelectorAll(".artwarp ul li");
      let art = document.querySelectorAll(".artwarp ul li .art");
      this.count--;
      document.querySelector(".veiw").scrollTop -= cardh;
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
      let cardh = document.querySelector(".infocard").offsetHeight;
      document.querySelector(".veiw").scrollTop += cardh;
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
  mounted() {
    document.body.style.height = `auto`;
    let veiw = document.querySelector(".veiw");
    let warp = document.querySelector(".warp");
    let infocard = [...document.querySelectorAll(".infocard")];
    infocard
      .slice(-6)
      .reverse()
      .forEach((infocard) => {
        warp.insertAdjacentHTML("afterbegin", infocard.outerHTML);
      });
    infocard.slice(0, 6).forEach((infocard) => {
      warp.insertAdjacentHTML("beforeend", infocard.outerHTML);
    });

    function infinitescrolls() {
      if (veiw.scrollTop == 0) {
        veiw.style.scrollBehavior = "auto";
        veiw.scrollTop = veiw.scrollHeight - 2 * veiw.offsetHeight;
        veiw.style.scrollBehavior = "smooth";
      } else if (
        Math.ceil(veiw.scrollTop) + 3 >
        veiw.scrollHeight - veiw.offsetHeight
      ) {
        veiw.style.scrollBehavior = "auto";
        veiw.scrollTop = veiw.offsetHeight;
        veiw.style.scrollBehavior = "smooth";
      }
    }
    infinitescrolls();
    veiw.addEventListener("scroll", infinitescrolls);
  },
};
</script>

<style scoped lang="scss"></style>

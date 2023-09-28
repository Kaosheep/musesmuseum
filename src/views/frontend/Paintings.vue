<template>
  <main class="painting_main">
    <div class="title">
      <VerHeader :title="'畫 作 區 Paintings'"></VerHeader>
    </div>
    <div class="container">
      <div class="paintsearchbar">
        <Searchbar
          :functype="1"
          @update-search-text="searchClick"
          @change="searchart()"
        ></Searchbar>
      </div>
      <button class="paintsearch" type="button" @click="scrollpage">
        <img src="@/assets/image/paint/arrow.svg" alt="" />
      </button>
      <div class="viexport">
        <span class="painting_span"></span><span class="painting_span"></span>
        <div class="painting_wrap">
          <div class="col" v-for="(img, imgindex) in paintings" :key="imgindex">
            <router-link :to="`/Home/PaintDetail/${imgindex}`">
              <div class="img">
                <img
                  :src="
                    require('@/assets/image/paint/paint' + imgindex + '.jpg')
                  "
                  :alt="img.imgname"
                />
              </div>
              <div class="txtcard">
                <div class="color">
                  <div class="txt">
                    <h2>{{ img.imgname }}</h2>
                    <h3>{{ img.imgen }}</h3>
                  </div>
                </div>
              </div>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </main>
  <div class="artpop">
    <div class="block">
      <font-awesome-icon
        :icon="['fas', 'circle-xmark']"
        id="artpopclose"
        @click="artclose"
      />
      <div class="container" v-if="searchpaintings.length > 0">
        <div class="colpop" v-for="a in searchpaintings">
          <router-link :to="`/Home/PaintDetail/${a.id}`">
            <div class="img">
              <img
                :src="require(`@/assets/image/paint/paint${a.id}.jpg`)"
                alt="a.imgname"
              />
            </div>
            <div class="txtcard">
              <div class="txt">
                <h2>{{ a.imgname }}</h2>
                <h3>{{ a.imgen }}</h3>
              </div>
            </div>
          </router-link>
        </div>
      </div>
      <div class="noart" v-else>查無結果</div>
    </div>
  </div>
</template>

<script>
import VerHeader from "@/components/VerHeader.vue";
import Searchbar from "@/components/Searchbar.vue";
export default {
  components: {
    VerHeader,
    Searchbar,
  },
  data() {
    return {
      paintings: [
        { id: 0, imgname: "凡爾賽宮德皇登基", imgen: "loremlorem" },
        { id: 1, imgname: "伏爾加河上的縴夫", imgen: "loremlorem" },
        { id: 2, imgname: "俄國婦女", imgen: " Russian women" },
        { id: 3, imgname: "哺乳聖母", imgen: "loremlorem" },
        { id: 4, imgname: "女貴族莫洛卓娃", imgen: "loremlorem" },
        { id: 5, imgname: "尼古拉二世婚禮", imgen: "loremlorem" },
        { id: 6, imgname: "彼得一世", imgen: "loremlorem" },
        { id: 7, imgname: "拿破崙", imgen: "loremlorem" },
        { id: 8, imgname: "拿破崙加冕", imgen: "loremlorem" },
        { id: 9, imgname: "施洗者約翰與聖母", imgen: "loremlorem" },
        { id: 10, imgname: "查理五世", imgen: "loremlorem" },
        { id: 11, imgname: "特洛伊王子", imgen: "loremlorem" },
      ],
      searchinput: "",
      searchpaintings: [],
      isartopen: false,
    };
  },
  computed: {},
  methods: {
    scrollpage() {
      document.querySelector(".painting_wrap").scrollLeft +=
        document.querySelector(".col").offsetWidth;
    },
    searchClick(text) {
      this.searchinput = text;
    },
    searchart() {
      if (this.searchinput) {
        document.querySelector(".artpop").style.display = `flex`;
        this.searchpaintings = this.paintings.filter((v) =>
          v.imgname?.includes(this.searchinput)
        );
      }
    },
    artclose() {
      document.querySelector(".artpop").style.display = `none`;
    },
    grayclose(event){
      if (
        event.target != document.querySelector('.block') 
        &&
        event.target != document.querySelector('.container') 
      ) {
        document.querySelector(".artpop").style.display = `none`;
      }
    }
  },
  mounted() {
    document.body.style.height = `auto`;
    let imgs = [...document.querySelectorAll(".painting_wrap .col")];
    let wrap = document.querySelector(".painting_wrap");
    let coln = Math.round(wrap.offsetWidth / imgs[0].offsetWidth);

    imgs
      .slice(-coln)
      .reverse()
      .forEach((col) => {
        wrap.insertAdjacentHTML("afterbegin", col.outerHTML);
      });
    imgs.slice(0, coln).forEach((col) => {
      wrap.insertAdjacentHTML("beforeend", col.outerHTML);
    });
    function infinitescrolls() {
      if (
        Math.ceil(wrap.scrollLeft) +
          document.querySelector(".viexport").offsetWidth >
        wrap.scrollWidth
      ) {
        wrap.style.scrollBehavior = "auto";
        wrap.scrollLeft = wrap.offsetWidth;
        wrap.style.scrollBehavior = "smooth";
      }
    }
    infinitescrolls();
    window.addEventListener("click", this.grayclose);
    wrap.addEventListener("scroll", infinitescrolls);
  },
  beforeUnmount() {
    window.removeEventListener("click", this.grayclose);
  }
};
</script>

<style scoped lang="scss">
h2 {
  font-size: 20px;
}

.artpop {
  display: none;
  position: fixed;
  height: 100vh;
  width: 100vw;
  top: 0;
  left: 0;
  justify-content: center;
  align-items: center;
  background-color: rgb(204, 204, 204, 0.5);
  -webkit-backdrop-filter: blur(5px);
  backdrop-filter: blur(5px);
  z-index: 20;
  .block {
    position: relative;
    width: 80vw;
    max-width: 800px;
    height: 80%;
    border-radius: 20px;
    border: 2px solid $mgreen;
    z-index: 20;
    padding: 3rem;
    background-color: #fff;
    @include t(){
      height: 70%;
    }
    .noart {
      text-align: center;
    }
    #artpopclose {
      width: 20px;
      height: 20px;
      position: absolute;
      top: 16px;
      left: 20px;
    }
    .container {
      display: flex;
      flex-direction: column;
      overflow-y: scroll;
      width: 100%;
      height: 100%;
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
      .colpop {
        margin-bottom: 16px;
        a {
          display: flex;
          justify-content: space-between;
          max-height: 250px;
          @include m(){
            flex-direction: column;
            max-height: 300px;
          }
          .img {
            width: 50%;
            height: 100%;
            @include m(){
              width: 100%;
            }
            img {
              width: 100%;
              max-height: 250px;
              height: 100%;
              border-radius: 10px;
              object-fit: cover;
              object-position: top;
            }
          }
          .txtcard {
            width: 48%;
            @include m(){
              width: 100%;
            }
            .txt{
              h2,h3{
                font-size: 16px;
              }
            }
            
          }
        }
      }
    }
  }
}
</style>

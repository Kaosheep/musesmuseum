<template>
  <main class="home_main">
    <div class="home_slider">
      <div class="wrap">
        <section>
          <div class="spotlight">
            <div class="maxlogo">
              <img src="@/assets/image/home/buliding0.jpg" alt="" />
              <div class="light yellow"></div>
              <div class="light green"></div>
              <div class="light pink"></div>
            </div>
          </div>
          <div class="path">
            <div class="ticket">
              <a href="">
                <p>前往購票</p>
                <p>TICKET</p>
                <p>MUSES</p>
              </a>
            </div>
            <div class="scrollhint">
              <ThinArrow :text="'scroll'"></ThinArrow>
            </div>
            <div class="homenav">
              <ul>
                <li v-for="(li, index) in homenav" :key="index">
                  <RouterLink :to="li.link"
                    >{{ li.title }}<br />{{ li.entitle }}</RouterLink
                  >
                </li>
              </ul>
            </div>
          </div>
          <div class="goto"></div>
          <div class="shadow"></div>
          <div class="scrollhint"></div>
        </section>
        <section>
          <div class="sectiontitle" id="newtitle">
            <div class="txtgo txtskew">
              <h1>Current Exhibitions</h1>
              <h1>Current Exhibitions</h1>
            </div>
          </div>
          <div class="smalltitle">
            <h2>當期展覽<br />Current Exhibitions</h2>
          </div>
          <div class="new">
            <div class="container">
              <div class="gallery">
                <img src="" alt="" />
                <img src="" alt="" />
                <img src="" alt="" />
                <img src="" alt="" />
                <img src="" alt="" />
                <img src="" alt="" />
              </div>
            </div>
          </div>
          
        </section>
        <section>
          <div class="sectiontitle">
            <div class="txtgo">
              <h1>NEWS</h1>
              <h1>NEWS</h1>
              <h1>NEWS</h1>
              <h1>NEWS</h1>
              <h1>NEWS</h1>
              <h1>NEWS</h1>
            </div>
          </div>
          <div class="smalltitle">
            <h2>最新消息<br />News</h2>
          </div>
          <div class="eventwrap">
            <div class="item" v-for="(item, index) in newscol" :key="index">
              <RouterLink to="">
                <div class="txt">
                  <span>{{ item.time }}</span>
                  <h3>{{ item.title }}</h3>
                  <p>{{ item.info }}</p>
                </div>
                <div class="seemore">
                  <ThinArrow :text="'More'"></ThinArrow>
                </div>
                <div class="image">
                  <img src="" alt="" />
                </div>
              </RouterLink>
            </div>
            <div class="more">
              <router-link to="/News"
                ><ThinArrow :text="'更多消息'"></ThinArrow
              ></router-link>
            </div>
          </div>
        </section>
        <section>
          <div class="draw">
            <img src="@/assets/image/home/musessvg.svg" alt="" />
          </div>
          <div class="container">
            <div class="row">
              <div class="txtframe"><h1>VISIT</h1></div>
              <div class="card">
                <a href="">
                  <img src="@\assets\image\home\buliding0.jpg" alt="" />
                  <div class="txt">
                    <h2>參觀與服務<br />Visit</h2>
                    <button type="button">
                      <font-awesome-icon
                        :icon="['fas', 'arrow-right']"
                        id="visitarrow"
                      />
                    </button>
                  </div>
                </a>
              </div>
            </div>
            <div class="row">
              <div class="txtframe"><h1>SPACE</h1></div>
              <div class="card">
                <a href="">
                  <img src="@\assets\image\home\buliding0.jpg" alt="" />
                  <div class="txt">
                    <h2>園區導覽<br />Space</h2>
                    <button type="button">
                      <font-awesome-icon
                        :icon="['fas', 'arrow-right']"
                        id="spacearrow"
                      />
                    </button>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </section>
        <section>
          <div class="sectiontitle">
            <div class="txtgo">
              <h1>Collection</h1>
              <h1>Collection</h1>
              <h1>Collection</h1>
              <h1>Collection</h1>
            </div>
          </div>
          <div class="smalltitle">
            <h2>藝術典藏<br />Collection</h2>
          </div>
        </section>
        <section>
          <div class="sectiontitle">
            <div class="txtgo">
              <h1>Shop</h1>
              <h1>Shop</h1>
              <h1>Shop</h1>
              <h1>Shop</h1>
            </div>
          </div>
          <div class="smalltitle">
            <h2>商品<br />Shop</h2>
          </div>
          <div class="shop">
            <img class="homelight" src="@/assets/image/home/light.png" alt="" />
            <div class="block">
              <div class="shopframe">
                <div class="productrow">
                  <h3>熱銷商品</h3>
                  <div
                    class="product"
                    v-for="(pro, num) in productlist"
                    :key="num"
                  >
                    <router-link to="/">
                      <img
                        :src="
                          require('@/assets/image/productimage/productimage' +
                            num +
                            '.png')
                        "
                        :alt="pro.title"
                      />
                      <p>{{ pro.title }}</p>
                    </router-link>
                  </div>
                </div>
              </div>
            </div>
            <img class="homecart" src="@/assets/image/home/cart.png" alt="" />
            <div class="floor">
              <ThinArrow :text="'更多商品'"></ThinArrow>
            </div>
          </div>
        </section>
        <section>
          <div class="footersilde">
            <div class="slide">
              <p class="max" id="max1">MUSESMUSEUM</p>
              <div class="homenav">
                <ul>
                  <li v-for="(li, index) in homenav" :key="index">
                    <RouterLink :to="li.link"
                      >{{ li.title }}<br />{{ li.entitle }}</RouterLink
                    >
                  </li>
                </ul>
                <div class="footerinfo"></div>
                <div class="social"></div>
              </div>
            </div>
            <div class="box">
              <div class="slide">
                <p class="max" id="max2">MUSESMUSEUM</p>
                
                <div class="totop" @click="totop">
                  <font-awesome-icon :icon="['fas', 'arrow-left']" id="totop" />
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </main>
  <footer>
    <div class="anchor">
      <ul>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <span></span>
      </ul>
    </div>
  </footer>
</template>

<script>
import Header from "/src/components/Header.vue";
import ThinArrow from "/src/components/ThinArrow.vue";
import Searchbarclick from "/src/components/Searchbarclick.vue";
import PinkButton from "/src/components/PinkButton.vue";
import cube from "/src/components/cube.vue";
export default {
  components: {
    ThinArrow,
    Header,
    Searchbarclick,
    PinkButton,
    cube
  },
  data() {
    return {
      homenav: [
        { title: "最新消息", entitle: "News", link: "/" },
        { title: "展覽資訊", entitle: "Current Exhibitions", link: "/" },
        { title: "園區導覽", entitle: "Space", link: "/" },
        { title: "參觀與服務", entitle: "Visit", link: "/" },
        { title: "商品", entitle: "Shop", link: "/" },
        { title: "關於我們", entitle: "About Us", link: "/" },
      ],
      newscol: [
        {
          time: "2023-08-25",
          title: "抽象藝術簡談",
          info: "本館將舉辦一系列藝術家講座，本次邀請知明藝術家小林堅丙、伍時媛分享他們的創作理念和經驗。為藝術愛好者提供與藝術家近距離互動的機會。本館將舉辦一系列藝術家講座，本次邀請知明藝術家小林堅丙、伍時媛分享他們的創作理念和經驗。為藝術愛好者提供與藝術家近距離互動的機會。",
          imgsrc: "",
        },
        {
          time: "2023-07-15",
          title: "文青集社—意象創作展",
          info: "近期熱門的文青集社來了!除了於本館展出最新作品外，經典系列也會收錄在這次創作展中。喜愛文青集社作品的人可別錯過了!",
          imgsrc: "",
        },
        {
          time: "2023-06-22",
          title: "清晨台北",
          info: "攝影新星—巫隆迺，用最擅長的黑白鏡頭帶領大家一同深入台灣角落。感受發生於台北之中的各種酸甜苦辣",
          imgsrc: "",
        },
      ],
      productlist: [
        {
          title: "MUSE筆記本",
          price: 350,
        },
        {
          title: "手繪紅鶴小廢包",
          price: 3000,
        },
        {
          title: "維納斯口紅",
          price: 2500,
        },
        {
          title: "諾貝爾仿徽",
          price: 3500,
        },
      ],
    };
  },
  methods: {
    totop() {
      window.scrollTo(0, 0);
    },
  },
  mounted() {
    let sections = [...document.querySelectorAll("section")];
    let slider = document.querySelector(".home_slider");
    let sliderWidth, galleryr;
    let sectionWidth;
    let current = 0;
    let target = 0;
    let ease = 0.05;
    let gallery = document.querySelector(".gallery");
    let txtframe = document.querySelectorAll(".txtframe");
    let max1 = document.getElementById("max1");
    let max2 = document.getElementById("max2");

    const images = [...document.querySelectorAll(".gallery img")];
    const angle = 360 / images.length;
    window.addEventListener("resize", () => {
      resize();
    });

    function lerp(start, end, t) {
      return start * (1 - t) + end * t;
    }
    function setTransform(el, transform) {
      el.style.transform = transform;
    }
    function resize() {
      sliderWidth = slider.getBoundingClientRect().width;
      sectionWidth = sliderWidth / sections.length;
      document.body.style.height = `${
        sliderWidth - (window.innerWidth - window.innerHeight)
      }px`;
      gallerycircle();
      followcursor();
    }
    function animate() {
      current = parseFloat(lerp(current, target, ease)).toFixed(2);
      target = window.scrollY;
      setTransform(slider, `translateX(-${current}px)`);
      animateimg();
      requestAnimationFrame(animate);
    }
    let newimgs = [...document.querySelectorAll(".eventwrap .item .image img")];
    let newimgWidth = document.querySelector(
      ".eventwrap .item .image img"
    ).offsetWidth;
    function animateimg() {
      let ratio = current / newimgWidth;
      let intersectionratio;
      newimgs.forEach((image, i) => {
        intersectionratio = ratio * 0.7 - i * 1.5;
        setTransform(image, `translateX(-${intersectionratio * 8}px)`);
      });
      txtframe.forEach((txtframe) => {
        setTransform(txtframe, `translateX(${intersectionratio * 20}px)`);
      });

      setTransform(
        max1,
        `translateX(${-window.innerWidth + current / 5}px) translateY(${
          window.innerWidth * 0.0785
        }px)`
      );
      setTransform(
        max2,
        `translateX(${-window.innerWidth + current / 5}px) translateY(${
          (-window.innerWidth + current / 5) * 0.2588190451
        }px) skewY(15deg)`
      );
    }

    animate();

    function gallerycircle() {
      galleryr = document.querySelector(".new .gallery").clientWidth;
      images.forEach((image, i) => {
        image.style.transform = `rotate3d(0,1,0,${
          (i + 1) * angle
        }deg) translateZ(${galleryr}px)`;
        image.onclick = () => {
          gallery.style.transform = `perspective(1800px) rotateX(-5deg) rotateY(-${
            (i + 1) * angle
          }deg)`;
        };
      });
    }

    function followcursor() {
      let btns = document.querySelectorAll(".container .row .card button");
      let txts = document.querySelectorAll(".container .row .card .txt");
      let btnWidth = document.querySelector(
        ".container .row .card button"
      ).offsetWidth;
      let txtWidth = document.querySelector(
        ".container .row .card .txt"
      ).offsetWidth;
      let txtHeight = document.querySelector(
        ".container .row .card .txt"
      ).offsetHeight;
      txts.forEach((txt, index) => {
        txt.addEventListener("mousemove", (e) => {
          let x = e.offsetX;
          let y = e.offsetY;
          btns[index].style.right = `${txtWidth - btnWidth * 0.5 - x}px`;
          btns[index].style.bottom = `${txtHeight - btnWidth * 0.5 - y}px`;
        });
        txt.addEventListener("mouseout", (e) => {
          btns[index].style.right = `0px`;
          btns[index].style.bottom = `0px`;
        });
      });
    }
    resize();

    let anchorli = [...document.querySelectorAll(".anchor ul li")];
    anchorli.forEach((li, i) => {
      li.addEventListener("click", (e) => {
        window.scrollTo(
          0,
          (Math.ceil(parseInt(document.body.style.height)) / 6.5) * i
        );
      });
    });
    window.addEventListener("scroll", () => {
      sliderWidth = slider.getBoundingClientRect().width;
      sectionWidth = sliderWidth / sections.length;
      let anchorline = document.querySelector(".anchor ul span");
      let srcolloff =
        document.documentElement.scrollTop /
        (parseInt(document.body.style.height) - sectionWidth);
      anchorline.style.backgroundImage = `linear-gradient(90deg,#EB5F86 ${
        srcolloff * 100
      }%,#009CA8 ${srcolloff * 100}%)`;
      // anchorli.forEach((li, i) => {
      //   for(j=0;j<i;j++){
          
      //   }
      // })

    });
  },
};
</script>

<style scoped lang="scss">
@import "@/assets/sass/style.scss";
body {
  overscroll-behavior: none;
}

footer {
  bottom: 0;
  right: 0;
  position: fixed;
  width: 100%;
  height: 80px;

  background-image: linear-gradient(180deg, $myellow 60%, #fff 100%);
}
</style>

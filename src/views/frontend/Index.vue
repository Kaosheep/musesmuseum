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
              <router-link to="/Home/Tick">
                <p>前往購票</p>
                <p>TICKET</p>
                <p>MUSES</p>
              </router-link>
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
              <div class="gallery" ref="galleryRef">
                <div
                  class="img"
                  v-for="(img, imgindex) in galleryimgs"
                  :key="imgindex"
                >
                  <img
                    :src="require('@/assets/image/exb/e' + imgindex + '.jpg')"
                    :alt="img.imgtitle"
                  />
                  <div class="imginfo">
                    <h3>{{ img.imgtitle }}</h3>
                    <p>{{ img.time }}</p>
                    <p>{{ img.info }}</p>
                    <p>
                      <router-link to="/"
                        ><ThinArrow :text="'展覽資訊'"></ThinArrow
                      ></router-link>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="moreexb">
              <router-link to="/Home/SpecialExhibition"
                ><ThinArrow :text="'更多展覽'"></ThinArrow
              ></router-link>
            </div>
          </div>
          <Carousel
            v-model="value"
            :autoplay="setting.autoplay"
            :autoplay-speed="setting.autoplaySpeed"
            :dots="setting.dots"
            :radius-dot="setting.radiusDot"
            :trigger="setting.trigger"
            :arrow="setting.arrow"
            class="index_carousel"
          >
            <CarouselItem v-for="(img, imgindex) in galleryimgs">
              <div class="artcarousel">
                <img
                  :src="require('@/assets/image/exb/e' + imgindex + '.jpg')"
                  alt=""
                />
                <div class="txt">
                  <h3>{{ img.imgtitle }}</h3>
                  <p>{{ img.time }}</p>
                  <p>{{ img.info }}</p>
                </div>
              </div>
            </CarouselItem>
          </Carousel>
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
                  <img
                    :src="require('@/assets/image/news/n' + index + '.jpg')"
                    alt=""
                  />
                </div>
              </RouterLink>
            </div>
            <div class="more">
              <router-link to="/Home/News"
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
                <router-link to="/Home/VisitInformation">
                  <img src="@/assets/image/home/buliding0.jpg" alt="" />
                  <div class="txt">
                    <h2>參觀與服務<br />Visit</h2>
                    <button type="button">
                      <font-awesome-icon
                        :icon="['fas', 'arrow-right']"
                        id="visitarrow"
                      />
                    </button>
                  </div>
                </router-link>
              </div>
            </div>
            <div class="row">
              <div class="txtframe"><h1>SPACE</h1></div>
              <div class="card">
                <router-link to="/Home/Museumspace">
                  <img src="@/assets/image/home/buliding0.jpg" alt="" />
                  <div class="txt">
                    <h2>園區導覽<br />Space</h2>
                    <button type="button">
                      <font-awesome-icon
                        :icon="['fas', 'arrow-right']"
                        id="spacearrow"
                      />
                    </button>
                  </div>
                </router-link>
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
          <div :class="['artblock', { show: isshow }]">
            <router-link to="/Home/Art">
              <div class="balla">
                <div class="artballa">
                  <h3>文物區</h3>
                  <img src="@/assets/image/home/a0.png" alt="" />
                </div>
              </div>
            </router-link>
            <router-link to="/Home/Paintings">
              <div class="ballb">
                <div class="artballb">
                  <h3>畫作區</h3>
                  <img src="@/assets/image/home/a1.png" />
                </div>
              </div>
            </router-link>
            <div class="light yellow"></div>
            <div class="light green"></div>
            <div class="light pink"></div>
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
            <div class="homelight">
              <img src="@/assets/image/home/light.png" alt="" />
            </div>

            <div class="block">
              <div class="shopframe">
                <div class="productrow">
                  <h3>熱銷商品</h3>
                  <div
                    class="product"
                    v-for="(pro, num) in productlist"
                    :key="num"
                  >
                    <router-link :to="`/Home/ProductPage/${num}`">
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
              <router-link to="/Home/Shop">
                <ThinArrow :text="'更多商品'"></ThinArrow>
              </router-link>
            </div>
          </div>
        </section>
        <section>
          <div class="footersilde">
            <div class="slide">
              <p class="max" id="max1">MUSESMUSEUM</p>
              <h2 class="mobile">MUSESMUSEUM</h2>
              <div class="homenav">
                <table>
                  <tr>
                    <td>參觀時間</td>
                    <td>| 09:00-16:00</td>
                  </tr>
                  
                  <tr>
                    <td>電話</td>
                    <td>| 02-1234567</td>
                  </tr>
                  <tr>
                    <td>休館時間</td>
                    <td>| 每週二、三</td>
                  </tr>
                  <tr>
                    <td>地址</td>
                    <td>| 希臘市和平區謬思路100號</td>
                  </tr>
                </table>
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
            <div class="tibame">
              <svg viewBox="0 0 100 100" width="100" height="100" id="svg1">
                <defs>
                  <path
                    id="circle"
                    d="
                      M 50, 50
                      m -37, 0
                      a 37,37 0 1,1 74,0
                      a 37,37 0 1,1 -74,0"
                  />
                </defs>
                <text font-size="7">
                  <textPath xlink:href="#circle">
                    |台僅供學習、展示之用。若有抵觸有關著作權,或有第三人主張侵害智慧
                  </textPath>
                </text>
              </svg>
              <svg viewBox="0 0 100 100" width="100" height="100" id="svg2">
                <defs>
                  <path
                    id="circle"
                    d="
                      M 50, 50
                      m -37, 0
                      a 37,37 0 1,1 74,0
                      a 37,37 0 1,1 -74,0"
                  />
                </defs>
                <text font-size="10">
                  <textPath xlink:href="#circle">
                    |您可以私訊[緯育TibaMe],後續會由專人協助處理。
                  </textPath>
                </text>
              </svg>
              <svg viewBox="0 0 100 100" width="100" height="100" id="svg3">
                <defs>
                  <path
                    id="circle"
                    d="
                      M 50, 50
                      m -37, 0
                      a 37,37 0 1,1 74,0
                      a 37,37 0 1,1 -74,0"
                  />
                </defs>
                <text font-size="7">
                  <textPath xlink:href="#circle">
                    |本網站為緯育TibaMe_前端設計工程師班第86期學員專題成果作品本平
                  </textPath>
                </text>
              </svg>
              <svg viewBox="0 0 100 100" width="100" height="100" id="svg4">
                <defs>
                  <path
                    id="circle"
                    d="
                      M 50, 50
                      m -37, 0
                      a 37,37 0 1,1 74,0
                      a 37,37 0 1,1 -74,0"
                  />
                </defs>
                <text font-size="7">
                  <textPath xlink:href="#circle">
                    |財產權等情事,均由學員負法律上責任,緯育公司概不負責。若有侵權疑慮,
                  </textPath>
                </text>
              </svg>
            </div>
          </div>
        </section>
      </div>
    </div>
  </main>
  <footer class="index_footer">
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

<script src="@/js/Index.js"></script>

<style scoped lang="scss">
body {
  overscroll-behavior: none;
}

.index_footer {
  @include t() {
    display: none;
  }
  bottom: 0;
  right: 0;
  position: fixed;
  width: 100%;
  height: 80px;

  background-image: linear-gradient(180deg, $myellow 60%, #fff 100%);
}
</style>

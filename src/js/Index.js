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
      value: 0,
      setting: {
        autoplay: true,
        autoplaySpeed: 4000,
        dots: 'inside',
        radiusDot: true,
        trigger: 'click',
        arrow: 'always'
      },
      homenav: [
        { title: "最新消息", entitle: "News", link: "/Home/News" },
        { title: "展覽資訊", entitle: "Current Exhibitions", link: "/Home/CurrentExhibition_main" },
        { title: "園區導覽", entitle: "Space", link: "/Home/Museumspace" },
        { title: "參觀與服務", entitle: "Visit", link: "/Home/VisitInformation" },
        { title: "商品", entitle: "Shop", link: "/Home/Shop" },
        { title: "關於我們", entitle: "About Us", link: "/Home/History" },
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
      galleryimgs: [
        { imgtitle: '現代之魅', time: '2023/5/1-2023/6/15', info: '探索當代藝術的多樣性和深度，這個展覽將呈現來自世界各地的藝術家的傑出作品，包括繪畫、雕塑和多媒體藝術。' },
        { imgtitle: '光之舞', time: '2023/5/1-2023/6/15', info: '這個展覽將探討光和色彩如何影響我們的情感和感知。通過投影、互動藝術和光學效應，觀眾將沉浸在充滿魔力的光之世界。' },
        { imgtitle: '古典之美', time: '2023/5/1-2023/6/15', info: '一場關於古代藝術的探索之旅。這個展覽將展示古希臘和羅馬時期的藝術珍品，包括雕塑、陶瓷和古典繪畫。' },
        { imgtitle: '數位幻境', time: '2023/5/1-2023/6/15', info: '通過虛擬現實和互動藝術，這個展覽將帶領觀眾進入一個全新的數位世界。體驗未來藝術的奇妙之處。' },
        { imgtitle: '大自然的韻律', time: '2023/5/1-2023/6/15', info: '這個展覽將藉由藝術家對大自然的啟發，呈現出關於自然美的藝術作品。包括風景畫、植物描繪和生態藝術。' },
        { imgtitle: '時光之旅', time: '2023/5/1-2023/6/15', info: '這個展覽將追溯藝術的演變，從古代到當代。通過展出各個時代的代表性藝術品，讓觀眾感受藝術的時光之旅。' },
      ],
      isshow: false,
      j:0
    };
  },
  methods: {
    totop() {
      window.scrollTo(0, 0);
    },
    anchor() {
      let sections = [...document.querySelectorAll("section")];
      let slider = document.querySelector(".home_slider");
      let anchorli = [...document.querySelectorAll(".anchor ul li")]
      let sliderWidth = slider.getBoundingClientRect().width;
      let sectionWidth = sliderWidth / sections.length;
      let anchorline = document.querySelector(".anchor ul span");
      let srcolloff =
        document.documentElement.scrollTop /
        (parseInt(document.body.style.height) - sectionWidth);
      anchorline.style.backgroundImage = `linear-gradient(90deg,#EB5F86 ${(srcolloff * 100) - 6
        }%,#009CA8 ${(srcolloff * 100) - 6}%)`;
      anchorli.forEach((li, i) => {
        if (i < Math.ceil(srcolloff * 0.6 * 10)) {
          for (let i = 0; i < Math.ceil(srcolloff * 0.6 * 10); i++) {
            anchorli[i].style.backgroundColor = `#EB5F86`;
          }
        }
        else {
          anchorli[i].style.backgroundColor = `#009CA8`;
        }
      })

      anchorli[0].style.backgroundColor = `#EB5F86`;
    },
    gallerycircle() {
      const images = [...document.querySelectorAll(".gallery .img")];
      let galleryr = document.querySelector(".new .gallery").clientWidth;
      let gallery = document.querySelector(".gallery");
      const angle = 360 / images.length;
      images.forEach((image, i) => {
        image.style.transform = `rotate3d(0,1,0,${(i + 1) * angle
          }deg) translateZ(${galleryr}px)`;
        image.onclick = () => {
          gallery.style.transform = `perspective(2000px) rotateX(-5deg) rotateY(-${(i + 1) * angle
            }deg)`;
          return this.j = i;
          
        };

      });
      document.querySelector('.gbtnl').addEventListener("click", ()=>{
        this.j += 1;
        console.log(this.j)
        gallery.style.transform = `perspective(2000px) rotateX(-5deg) rotateY(${(this.j) * angle
          }deg)`;
        return this.j;
      });
      document.querySelector('.gbtnr').addEventListener("click", (e) => {
        this.j -= 1;
        console.log(this.j)
        gallery.style.transform = `perspective(2000px) rotateX(-5deg) rotateY(${(this.j) * angle
          }deg)`;
        return this.j;

      })
    },
    followcursor() {
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
          btns[index].style.right = `16px`;
          if (window.innerWidth > 414) {
            btns[index].style.bottom = `0px`;
          } else {
            btns[index].style.bottom = `32px`;
          }

        });
      });
    },
    resize() {

      if (window.innerWidth > 820) {
        let slider = document.querySelector(".home_slider");
        let sliderWidth = slider.getBoundingClientRect().width;
        document.body.style.height = `${sliderWidth - (window.innerWidth - window.innerHeight)
          }px`;
        this.gallerycircle();

      } else {
        let slider = document.querySelector(".home_slider");
        document.body.style.height = 'auto';
        slider.style.transform = `translateX(0px)`
      }

    },
    show() {
      if (document.querySelector('.artblock').getBoundingClientRect().left < 1500) {
        this.isshow = true
      }
    },
    ballmove(e) {
      let x = (window.innerWidth - e.pageX) / 80;
      let y = (window.innerHeight - e.pageY) / 80;
      document.querySelector('.balla').style.transform = `translate(${x}px , ${y}px)`;
      document.querySelector('.ballb').style.transform = `translate(${-x}px , ${-y}px)`;
    },
    fetchnews() {
      fetch(`${this.$store.state.publicpath}news_fetch.php`).then(async (response) => {
        this.newscol = await response.json();
      });
    },

  },
  mounted() {

    let slider = document.querySelector(".home_slider");
    let current = 0;
    let target = 0;
    let ease = 0.05;
    let txtframe = document.querySelectorAll(".txtframe");
    let max1 = document.getElementById("max1");
    let max2 = document.getElementById("max2");
    let homecart = document.querySelector('.homecart');

    function lerp(start, end, t) {
      return start * (1 - t) + end * t;
    }
    function setTransform(el, transform) {
      el.style.transform = transform;
    }

    function animate() {
      current = parseFloat(lerp(current, target, ease)).toFixed(2);
      target = window.scrollY;
      if (window.innerWidth > 820) {
        setTransform(slider, `translateX(-${current}px)`);
      } else {
        setTransform(slider, `translateY('')`);
      }
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
        intersectionratio = ratio - i * 1.5;
        if (window.innerWidth > 820) {
          setTransform(image, `translateX(-${intersectionratio * 8}px)`);
        } else {
          setTransform(image, `translateX(0px)`)
        }
      });
      txtframe.forEach((txtframe) => {
        setTransform(txtframe, `translateX(${intersectionratio * 20}px)`);
      });

      setTransform(
        max1,
        `translateX(${-window.innerWidth + current / 5}px) translateY(${window.innerWidth * 0.0785
        }px)`
      );
      setTransform(
        max2,
        `translateX(${-window.innerWidth + current / 5}px) translateY(${(-window.innerWidth + current / 5) * 0.2588190451
        }px) skewY(15deg)`
      );

      setTransform(homecart, `translateX(${intersectionratio * 20}px)`)

    }
    // document.querySelector('.gbtnl').addEventListener("click", ()=>{
    //   this.j -= 1;
    //   console.log(this.j)
    //   gallery.style.transform = `perspective(2000px) rotateX(-5deg) rotateY(${(this.j) * angle
    //     }deg)`;
    //   return this.j;
    // });
    // document.querySelector('.gbtnr').addEventListener("click", (e) => {
    //   this.j -= 1;
    //   console.log(this.j)
    //   gallery.style.transform = `perspective(2000px) rotateX(-5deg) rotateY(${(this.j) * angle
    //     }deg)`;
    //   return this.j;

    // })

    let anchorli = [...document.querySelectorAll(".anchor ul li")];
    anchorli.forEach((li, i) => {
      li.addEventListener("click", (e) => {
        window.scrollTo(
          0,
          (Math.ceil(parseInt(document.body.style.height)) / 6.5) * i
        );
      });
    });
    window.addEventListener("resize", this.resize);
    window.addEventListener("scroll", this.anchor);
    window.addEventListener("scroll", this.show);
    window.addEventListener("mousemove", this.ballmove);
    animate();
    this.followcursor();
    this.resize();
    this.gallerycircle();
    document.querySelector('.comfooter').style.display = 'none';
  },
  beforeUnmount() {
    window.removeEventListener("resize", this.resize);
    window.removeEventListener("scroll", this.anchor);
    window.removeEventListener("scroll", this.show);
    window.removeEventListener("mousemove", this.ballmove);
    document.body.style.height = `auto`;
    document.querySelector('.comfooter').style.display = '';
  }

};
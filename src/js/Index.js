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
        { title: "館內地圖", entitle: "Map", link: "/Home/Museumspace" },
        { title: "參觀服務", entitle: "Visit", link: "/Home/VisitInformation" },
        { title: "精選商品", entitle: "Shop", link: "/Home/Shop" },
        { title: "關於我們", entitle: "About Us", link: "/Home/History" },
      ],
      newscol: [],
      productlist: [],
      galleryimgs: [],
      isshow: false,
      j: 0,
      gallr: 0
    };
  },
  methods: {
    closehint(){
      this.$store.state.first = true;
    },
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
      });
      document.querySelector('.gbtnl').addEventListener("click", (e) => {
        e.stopPropagation();
        this.j += 0.5;
        gallery.style.transform = `perspective(2000px) rotateX(-5deg) rotateY(${(this.j) * angle
          }deg)`;
     
        return this.j;
      });
      document.querySelector('.gbtnr').addEventListener("click", (e) => {
        this.j -= 0.5;
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
      fetch(`${this.$store.state.publicpath}index_fetch.php`).then(async (response) => {
        let indexarr = await response.json();
        this.newscol = indexarr[0];
        this.productlist = indexarr[1];
      });
    },

  },
  mounted() {
    fetch(`${this.$store.state.publicpath}index_fetch.php`)
      .then(async (response) => {
        let indexarr = await response.json();
        this.newscol = indexarr[0];
        this.productlist = indexarr[1];
        this.galleryimgs = indexarr[2];

      })
      .then(() => {
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
        var newimgs = [...document.querySelectorAll(".eventwrap .item .image img")];
        var newimgWidth = document.querySelector(
          ".eventwrap .item .image img"
        ).offsetWidth;

        function animateimg() {

          let intersectionratio;
          let ratio = current / newimgWidth;
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
        animate();
        this.resize();
        this.gallerycircle();
      })
      .catch((error) => {
        console.error("發生錯誤", error);
      });



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
    this.followcursor();


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
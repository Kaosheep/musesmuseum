export default {
    // components: {
    //   ThinArrow,
    // },
    // data() {
    //   return {
    //     homenav:[
    //       {title:'最新消息',entitle:'News',link:'/'},
    //       {title:'展覽資訊',entitle:'Current Exhibitions',link:'/'},
    //       {title:'園區導覽',entitle:'Space',link:'/'},
    //       {title:'參觀與服務',entitle:'Visit',link:'/'},
    //       {title:'商品',entitle:'Shop',link:'/'},
    //       {title:'關於我們',entitle:'About Us',link:'/'},
    //     ]
    //   };
    // },
    // methods: {},
    mounted() {
      let sections = [...document.querySelectorAll("section")];
      let slider = document.querySelector(".home_slider");
      let sliderWidth;
      let galleryr;
      let sectionWidth;
      let current = 0;
      let target = 0;
      let ease = 0.05;
      let gallery = document.querySelector(".gallery");
      let txtframe = document.querySelectorAll(".txtframe");
  
      const images = [...document.querySelectorAll(".gallery img")];
      const angle = 360 / images.length;
      window.addEventListener("resize", () => {
        init();
      });
  
      function lerp(start, end, t) {
        return start * (1 - t) + end * t;
      }
      function setTransform(el, transform) {
        el.style.transform = transform;
      }
      function init() {
        sliderWidth = slider.getBoundingClientRect().width;
        sectionWidth = sliderWidth / sections.length;
        document.body.style.height = `${
          sliderWidth - (window.innerWidth - window.innerHeight)
        }px`;
        gallerycircle();
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
        txtframe.forEach((txtframe, index) => {
          setTransform(
            txtframe,
            `translateX(${intersectionratio * 20}px)`
          );
        });
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
  
      init();
  
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
    },
  };
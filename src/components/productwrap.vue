<template>
  <div class="productwrap">
    <div class="product">
      <div class="object" v-for="(object, index) in productlist" :key="index">
        <a href=""
          ><img
            :src="
              require('../assets/image/productimage/productimage' +
                index +
                '.png')
            "
            draggable="false"
          />
          <p>{{ object.title }}</p></a
        >
      </div>
    </div>
    <div class="btn">
      <button id="left"><i class="fa-solid fa-arrow-left"></i></button>
      <button id="right"><i class="fa-solid fa-arrow-right"></i></button>
    </div>
  </div>
</template>

<script> 
export default {
  data() {
    return {
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

  },
  mounted() {

  },
};
</script>

<style scoped>
.productwrap {
  width: 100%;
  padding: 30px;
}
.product {
  max-width: 1100px;
  margin: auto;
  height: 220px;
  display: flex;
  justify-content: flex-start;
  align-items: center;
  overflow-x: auto;
  scroll-snap-type: x mandatory;
  scroll-behavior: smooth;
  scrollbar-width: 0;
}
.product::-webkit-scrollbar {
  display: none;
}
.product.dragging {
  scroll-snap-type: none;
  scroll-behavior: auto;
}
.no-trans {
  scroll-behavior: auto;
}
.product.dragging .object {
  cursor: grab;
  user-select: none;
}
.productwrap .btn {
  display: block;
  margin: auto;
  text-align: center;
}
.productwrap .btn button {
  margin: 0px 50px;
}
.object {
  scroll-snap-align: start;
  width: 220px;
  height: 220px;
  padding: 30px;
  background-image: radial-gradient(circle, white 60%, rgba(0, 0, 0, 0) 60%);
  text-align: center;
  flex-shrink: 0;
}
.object img {
  width: 90%;
  height: 90%;
  object-fit: contain;
}
.object h4 {
  padding-top: 40px;
  word-spacing: 2px;
}
</style>

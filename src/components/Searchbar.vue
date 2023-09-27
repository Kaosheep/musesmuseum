<template>
  <div class="searchbar_search">
    <form action="">
      <input
        type="text"
        placeholder="Search"
        id="search"
        v-model="searchinput"
      />
      <button type="button" @click="searchbar()">
        <font-awesome-icon
          :icon="['fas', 'magnifying-glass']"
          id="searchbar_searchglass"
        />
      </button>
    </form>
  </div>
</template>

<script>
export default {
  props: ["functype"],
  data() {
    return {
      produstdislist: [
        {
          id: 0,
          title: "MUSES筆記本",
          price: 350,
          image: require("@/assets/image/productimage/productimage0.png"),
          kind: ["所有商品", "辦公文具"],
        },
        {
          id: 1,
          title: "手繪紅鶴小廢包",
          price: 3000,
          image: require("@/assets/image/productimage/productimage1.png"),
          kind: ["所有商品", "翻玩小物", "熱銷Top5"],
        },
        {
          id: 2,
          title: "維納斯口紅",
          price: 2500,
          image: require("@/assets/image/productimage/productimage2.png"),
          kind: ["所有商品", "時尚彩妝"],
        },
        {
          id: 3,
          title: "諾貝爾仿徽",
          price: 3500,
          image: require("@/assets/image/productimage/productimage3.png"),
          kind: ["所有商品", "翻玩小物"],
        },
        {
          id: 4,
          title: "MUSES素T",
          price: 400,
          image: require("@/assets/image/productimage/productimage4.png"),
          kind: ["所有商品", "聯名系列"],
        },
        {
          id: 5,
          title: "路易絲面膜",
          price: 300,
          image: require("@/assets/image/productimage/productimage5.png"),
          kind: ["所有商品", "翻玩小物"],
        },
        {
          id: 6,
          title: "草地上的聖母筆記本",
          price: 1500,
          image: require("@/assets/image/productimage/productimage6.png"),
          kind: ["所有商品", "辦公文具"],
        },
        {
          id: 7,
          title: "皮革筆記本",
          price: 499,
          image: require("@/assets/image/productimage/productimage7.png"),
          kind: ["所有商品", "辦公文具"],
        },
        {
          id: 8,
          title: "MUSES博物館迷你模型",
          price: 1499,
          image: require("@/assets/image/productimage/productimage8.png"),
          kind: ["所有商品"],
        },
        {
          id: 9,
          title: "MUSES咖啡杯盤組",
          price: 699,
          image: require("@/assets/image/productimage/productimage9.png"),
          kind: ["所有商品", "聯名系列", "生活用品"],
        },
        {
          id: 10,
          title: "MUSES帆布袋",
          price: 450,
          image: require("@/assets/image/productimage/productimage10.png"),
          kind: ["所有商品", "聯名系列", "生活用品", "熱銷Top5"],
        },
        {
          id: 11,
          title: "派對動物-A款",
          price: 299,
          image: require("@/assets/image/productimage/productimage11.png"),
          kind: ["所有商品", "辦公文具"],
        },
        {
          id: 12,
          title: "派對動物-B款",
          price: 299,
          image: require("@/assets/image/productimage/productimage12.png"),
          kind: ["所有商品", "辦公文具", "熱銷Top5"],
        },
      ],
      searchinput: "",
    };
  },
  methods: {
    searchbar() {
      if (this.functype === 1) {
        return this.produstdislist.filter((searchinput) =>
        this.produstdislist.includes(searchinput)
        );
      }
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss"></style>

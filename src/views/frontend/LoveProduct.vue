<template>
  <div class="bgcGY cardCenter">
    <main class="searchProdMain">
      <div class="search">
        <Searchbar :functype="1" @update-search-text="searchClick" />
      </div>
      <div class="backGroundCard">

        <div class="loveblock">
          <div class="backGroundCardBtns">
            <router-link :to="a.link" v-for="a in memBtnLink">
              <button :class="[a.name === '收藏清單' ? 'pinkBtnLight' : 'pinkBtn']">
                {{ a.name }}
              </button>
            </router-link>
          </div>
          <div class="con">
            <div class="shop_container">
              <div v-if="getPageItems == 0">查無商品</div>
              <div class="item" v-for="item in getPageItems" :key="item.prod_id" v-else>
                <router-link :to="`/Home/ProductPage/${item.prod_id}`">
                  <div class="image">
                    <img :src="`${this.$store.state.imgpublicpath}image/productimage/` +
                      item.prod_img
                      " :alt="item.prod_name" />
                  </div>
                </router-link>
                <div class="info">
                  <span>
                    <Heart :loveid="item.prod_id" @click="updateh"> </Heart>
                    <router-link :to="`/Home/ProductPage/${item.prod_id}`">
                      <p>{{ item.prod_name }}</p>
                    </router-link>
                    <font-awesome-icon :icon="['fas', 'cart-shopping']" id="car" @click="addcart(item.prod_id)" />
                  </span>
                  <router-link :to="`/Home/ProductPage/${item.prod_id}`">
                    <span> ${{ item.prod_sellingprice }} </span>
                  </router-link>
                </div>
              </div>
            </div>
            <div class="shop_paginationbar">
              <Page :total="searchFilter.length" :page-size="pageItems" v-model="currentPage" class="shop_page" />
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import Searchbar from "/src/components/Searchbar.vue";
import Searchbarclick from "/src/components/Searchbarclick.vue";
import Heart from "/src/components/Heart.vue";
export default {
  components: {
    Searchbar,
    Searchbarclick,
    Heart,
  },
  data() {
    return {
      produstdislist: [],
      lovescol: [],
      memAllInfo: {},
      loven: null,
      memBtnLink: [
        { link: "/Home/MemberInfo", name: "會員資料" },
        { link: "/Home/SearchProduct", name: "訂單查詢" },
        { link: "/Home/SearchTicket", name: "票券查詢" },
        { link: "", name: "收藏清單" },
      ],
      pageItems: 6,
      currentPage: 1,
      itemsPerPage: 5,
      searchinput: "",
      storage: localStorage,
    };
  },
  computed: {
    searchFilter() {
      if (this.searchinput) {
        return this.lovescol.filter((v) =>
          v.prod_name?.includes(this.searchinput)
        );
      } else {
        return this.lovescol;
      }
    },
    getPageItems() {
      const startIndex = (this.currentPage - 1) * this.pageItems;
      const endIndex = startIndex + this.pageItems;
      return this.searchFilter.slice(startIndex, endIndex);
    },
  },
  watch: {
    searchinput() {
      this.currentPage = 1;
    },
  },
  methods: {
    fetchprod() {
      fetch(`${this.$store.state.publicpath}shop.php`)
        .then(async (response) => {
          this.produstdislist = await response.json();
        })
        .catch((error) => {
          console.error("發生錯誤:", error);
        });
    },
    success(nodesc) {
      this.$Notice.success({
        title: "加入購物車",
        desc: nodesc
          ? ""
          : "Here is the notification description. Here is the notification description. ",
      });
    },
    searchClick(text) {
      this.searchinput = text;
    },
    loveid(id) {
      this.loven = id;
    },
    getlove() {
      const formData = new URLSearchParams();
      formData.append("mbr_id", this.$store.state.mbr_id);

      fetch(`${this.$store.state.publicpath}love_fetch.php`, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=utf-8",
        },
        body: formData,
      })
        .then((response) => {
          if (response.ok) {
            return response.json(); // 如果請求成功，解析JSON數據
          } else {
            throw new Error("取得消息失敗"); // 如果請求不成功，拋出錯誤
          }
        })
        .then((json) => {
          this.lovescol = json;
        })
        .catch((error) => {
          console.log(error.message);
        });
    },
    updateh() {
      this.getlove();
    },
    addcart(prod_id) {
      this.$store.state.cartnum += 1;
      this.success(true);
      if (this.storage["addItemlist"] == null) {
        this.storage["addItemlist"] = "";
      }
      let additem = this.produstdislist.find(
        (item) => item.prod_id === prod_id
      );

      this.storage["addItemlist"] += `${prod_id},`;
      if (this.storage[prod_id]) {
        let itemstr = [...this.storage[prod_id].split(",")];
        // console.log(itemstr)
        let nowamount = parseInt(itemstr.slice(4, 5));
        nowamount++;
        itemstr.splice(4, 1, nowamount);
        this.storage[prod_id] = "";
        this.storage[prod_id] += itemstr;
      } else {
        this.storage[prod_id] = "";
        this.storage[prod_id] += `${prod_id},`;
        this.storage[prod_id] += `${additem.prod_name},`;
        this.storage[prod_id] += `${additem.prod_sellingprice},`;
        this.storage[prod_id] += `${additem.prod_img},`;
        this.storage[prod_id] += "1,";
      }
    },
  },
  mounted() {
    const cookies = document.cookie.split(";");
    let members = null;

    for (let i = 0; i < cookies.length; i++) {
      const cookie = cookies[i].trim();
      if (cookie.startsWith("members=")) {
        members = decodeURIComponent(cookie.substring("members=".length));

        break;
      }
    }

    if (members) {
      try {
        const memberInfo = JSON.parse(members);
        if (memberInfo.mbr_name && memberInfo.mbr_email) {
          this.memAllInfo = memberInfo;
          this.$store.state.mbr_id = this.memAllInfo.mbr_id;
        } else {
          console.error("Cookie中缺少屬性");
        }
      } catch (error) {
        console.error("解析Cookie數據錯誤", error);
      }
    }
    this.getlove();
    this.fetchprod();
  },
};
</script>
<style scoped lang="scss">
.comfooter .footer {
  @include t() {
    padding: 3rem 3rem 1.5rem;
  }
}
// @include t(){
//   .comfooter {
//   .cube {
//     z-index: 10;
//   }
// }
// }
.shop_paginationbar {
  .shop_page {
    width: auto;

    @include t() {
      width: 80%;
    }
  }
}

// .searchProdMain {
//     width: 83.33%;
//     height: 91vh;
//   }
.cardCenter {

  // width: 100vw;
  // display: flex;
  // justify-content: center;
  // align-items: center;
  @include t() {
    height: auto;
    // padding:5rem 0 200px;
  }

  .searchProdMain {
    width: 83.33%;
    margin: 50px 0 100px 0;
    // height: 91vh;
    @include t() {
      width: auto;
    }

    .search {
      width: 1000px;

      @include t() {
        width: auto;
        margin: auto;
      }
    }

    .backGroundCard {
      // height: 100%;
      flex-direction: column;
      padding: 1.5rem;

      @include t() {
        // width: auto;
        height: auto;
      }

      // .love_search {
      //   width: 250px;
      //   margin-bottom: 0.5rem;
      //   text-align: start;
      //   margin-left: auto;
      // }
      .loveblock {
        display: flex;
        justify-content: space-around;

        @include t() {
          flex-direction: column;
          align-items: center;
        }

        .con {
          width: 80%;

          .shop_paginationbar {
            margin: 0;
            padding-top: 0.5rem;
          }

          .shop_container {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(3, 30%);

            // grid-template-rows: repeat(2, 1fr);
            @include t() {
              grid-template-columns: unset;
              margin: auto;
            }

            justify-items: center;
            align-items: flex-end;
            gap: 25px;

            .item {
              width: 100%;
              text-align: center;

              img {
                width: 100%;
                height: 20vh;
                max-width: 240px;
                border-radius: 8px;
                object-fit: cover;
              }
            }

            .info {
              margin: 10px 0px;
              text-align: center;

              span {
                display: flex;
                justify-content: space-between;
                align-items: center;
                color: $mblue;

                .heart {
                  padding: 3px 1px 0 0;
                  width: 24px;
                }

                #car {
                  height: 20px;
                }

                a {
                  width: calc(100% - 60px);

                  p {
                    width: 100%;
                    overflow: hidden;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                  }
                }
              }

              a {
                span {
                  text-align: center;
                  color: $mpink;
                  display: block;
                }
              }
            }
          }
        }
      }
    }
  }
}</style>

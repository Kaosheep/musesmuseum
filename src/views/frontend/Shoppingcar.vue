<template>
  <main>
    <div class="shoppingcar_stepbar">
      <div>
        <p>確認商品</p>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 73 19">
        <line x1="0.517578" y1="17.3965" x2="72.7871" y2="17.3965" />
        <line x1="71.7612" y1="16.9869" x2="55.7612" y2="1.98688" />
      </svg>
      <div>
        <p>配送方式<br />&<br />填寫資料<br /></p>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 73 19">
        <line x1="0.517578" y1="17.3965" x2="72.7871" y2="17.3965" />
        <line x1="71.7612" y1="16.9869" x2="55.7612" y2="1.98688" />
      </svg>
      <div>
        <p>完成訂購</p>
      </div>
    </div>
    <div class="shoppingcar_mbl" v-if="counttotalitem === 0">
      <p>目前無商品喔</p>
    </div>
    <!-- mbl:mightbuylist；mbi:mightbuyitem -->
    <div class="shoppingcar_mbl" v-else>
      <div class="shoppingcar_mbi" v-for="(item, j) in itemarr" :key="j">
        <div class="shoppingcar_productimage">
          <img :src="require('@/assets/image/productimage/' + item[3])" alt="" />
        </div>
        <div class="shoppingcar_productinfo">
          <p>{{ item[1] }}</p>
          <div class="shoppingcar_function">
            <div class="shoppingcar_productcount">
              <button @click="decrease(item, item[4], item[0], j)">
                <font-awesome-icon :icon="['fas', 'minus']" id="minus" />
              </button>
              <input type="text" :value="item[4]" class="itemamount"
                @change="updateditemamount(item, item[4], item[0])" />
              <button @click="increase(item, item[4], item[0])">
                <font-awesome-icon :icon="['fas', 'plus']" id="plus" />
              </button>
              <span>{{ subtotal(item[2], item[4]) }}</span>
            </div>
          </div>
        </div>
        <button class="shoppingcar_itemdelete" @click="clean(j, item[0])">
          X
        </button>
      </div>
    </div>
    <div class="shoppingcar_total">
      <p>
        共計<span>{{ counttotaltype }}</span>樣，<span>{{ counttotalitem }}</span>件商品
      </p>
      <p>
        商品總金額<span>{{ totalAmount }}</span>
      </p>
    </div>
    <div class="shoppingcar_nextstep" v-if="counttotalitem > 0">
      <router-link to="/home/Shopping">
        <button class="pinkBtn" @click="savetotal()" id="next">下一步</button>
      </router-link>
    </div>
    <div class="dot"></div>
  </main>
</template>

<script>
// const getImg = (path) =>
//   require(`@/assets/image/productimage/productimage${path}.png`);
export default {
  data() {
    return {
      storageitem: localStorage["addItemlist"],
      totalitem: 0,
      totaltype: 0,
      total: 0,
      itemarr: [],
    };
  },
  computed: {
    items() {
      if (localStorage.length > 0) {
        let itemString = this.storageitem.split(",");
        let items = [...new Set(itemString.filter((el) => el))];
        return items;
      }
    },
    totalAmount() {
      return this.itemarr.reduce((t, item) => {
        return t + this.subtotal(item[2], item[4]);
      }, 0);
    },
    counttotalitem() {
      return this.itemarr.reduce((totalitem, item) => {
        return totalitem += parseInt(item[4]);
      }, 0);
    },
    counttotaltype() {
      return this.itemarr.reduce((totaltype, item) => {
        return totaltype + 1;
      }, 0);
    },
  },
  methods: {
    updateditemamount(item, now, prod_id) {
      item.splice(4, 1, now);
      let itemstr = item.toString();
      localStorage[prod_id] = "";
      localStorage[prod_id] += itemstr;
    },
    subtotal(amount, price) {
      return amount * price;
    },
    getitemarr() {
      this.items.forEach((it) => {
        let itemstr = [...localStorage[it].split(",")];
        return this.itemarr.push(itemstr);
      });
    },
    decrease(item, n, prod_id, j) {
      n--;
      this.updateditemamount(item, n, prod_id);
      if (n < 1) {
        this.clean(j, prod_id);
      }
    },
    increase(item, n, prod_id) {
      n++;
      this.updateditemamount(item, n, prod_id);
    },
    clean(j, prod_id) {
      this.itemarr.splice(j, 1);
      localStorage["addItemlist"] = localStorage["addItemlist"].replaceAll(
        `${prod_id},`,
        ``
      );
      localStorage.removeItem(prod_id);
    },
    savetotal() {
      localStorage["totalAmount"] = "";
      localStorage["totalAmount"] += `${this.totalAmount}`;
    },
  },
  mounted() {
    if (localStorage.length > 0) {
      this.getitemarr();
    }
  },
};
</script>
<style scoped lang="scss">
main {
  @include t() {
    height: 72vh;
  }
}
</style>

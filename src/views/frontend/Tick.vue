<template>
  <div class="title">購票</div>
  <div class="entitle">Book Tickets</div>
  <div style="display: flex;">
    <div class="forrwd">
      <div class="block">
        <div>
          <div class="FareAndIllustrate">票價</div>
        </div>
        <div class="SweatBee"><li>成人票${{ price }}</li></div>
        <div class="white">13歲(含)以上之遊客</div>
        <div class="SweatBee"><li>兒童票${{ price2 }}</li></div>
        <div class="white">3歲(含)至12歲之兒童</div>
        <div class="SweatBee"><li>老人票${{ price3 }}</li></div>
        <div class="white">65歲(含)以上之長者</div>
        <div class="SweatBee"><li>愛心票${{ price4 }}</li></div>
        <div class="white">持有主管機關核發之身心障礙證明(手冊)者。</div>
        <div class="FareAndIllustrate">說明</div>
        <div class="white">-本館為一票可觀賞當期所有展覽(包含常設展)。</div>
        <div class="white">-票券無使用期限。</div>
        <div class="white">-售出票券無法線上退票，請至現場退票。</div>
        <div class="white">-兒童票、優待票請現場出示身分證。</div>
        <div class="white">-愛心票請現場出示身心障礙證明（手冊）。</div>
        <img class=shormatrix src="@/assets/image/tick/shortmatrix.png"/>
      </div>
      <div class="buytick">
        <div class="tick">成人票
          <button class="addandsub" @click="reduce1">-</button>
          <span>{{ qua }}</span>
          <button class="addandsub" @click="add1">+</button>
          <span class="red" v-show="qua">${{ subt1(qua, price) }}</span>
          <button class="clear" @click="clear">清除</button>
        </div>
        <div class="tick">兒童票
          <button class="addandsub" @click="reduce2">-</button>
          <span>{{ qua2 }}</span>
          <button class="addandsub" @click="add2">+</button>
          <span class="red" v-show="qua2">${{ subt1(qua2, price2) }}</span>
          <button class="clear" @click="clear2">清除</button>
        </div>
        <div class="tick">老人票
          <button class="addandsub" @click="reduce3">-</button>
          <span>{{ qua3 }}</span>
          <button class="addandsub" @click="add3">+</button>
          <span class="red" v-show="qua3">${{ subt1(qua3, price3) }}</span>
          <button class="clear" @click="clear3">清除</button>
        </div>
        <div class="tick">愛心票
          <button class="addandsub" @click="reduce4">-</button>
          <span>{{ qua4 }}</span>
          <button class="addandsub" @click="add4">+</button>
          <span class="red" v-show="qua4">${{ subt1(qua4, price4) }}</span>
          <button class="clear" @click="clear4">清除</button>
        </div>
        <div class="line"></div>
        <div class="ball"></div>
        <div class="sumline"></div>
        <div class="sum">總金額
          <span style="color:#EB5F86">${{ total }}</span>
        </div>
        <button class="submit" @click="submit">送出</button>
      </div>
    </div>
    <img class=squarematrix src="@/assets/image/tick/squarematrix.png">
    <img class=bigmatrix src="@/assets/image/tick/bigmatrix.png">
  </div>
  <div class="frame"></div>
  <img class=longmatrix src="@/assets/image/tick/longmatrix.png"/>
  <div>cube/</div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      qua: 0,
      qua2: 0,
      qua3: 0,
      qua4: 0,
      price: 0,
      price2: 0,
      price3: 0,
      price4: 0,
      error: null,
    };
  },
  created() {
    this.fetchTickets();
  },
  computed: {
    total() {
      return this.subt1(this.qua, this.price) + this.subt1(this.qua2, this.price2) + this.subt1(this.qua3, this.price3) + this.subt1(this.qua4, this.price4);
    },
  },
  methods: {
    fetchTickets() {
      axios.get('http://localhost/musesmuseum/public/phps/tickets.php') 
        .then(response => {
          if (response.status === 200) {
            const data = response.data;
            // Assuming the data structure of tickets is consistent
            this.price = data[0].tkt_price;
            this.price2 = data[1].tkt_price;
            this.price3 = data[2].tkt_price;
            this.price4 = data[3].tkt_price;
          } else {
            throw new Error('Network response was not ok');
          }
        })
        .catch(error => {
          console.error("An error occurred while fetching the data: ", error);
          this.error = '無法獲取票價資訊。請稍後再試。';
        });
    },
    subt1(x, y) {
      return x * y;
    },
    reduce1() {
      if (this.qua > 0) {
        this.qua--;
      }
    },
    add1() {
      this.qua++;
    },
    clear() {
      this.qua = 0;
    },
    reduce2() {
      if (this.qua2 > 0) {
        this.qua2--;
      }
    },
    add2() {
      this.qua2++;
    },
    clear2() {
      this.qua2 = 0;
    },
    reduce3() {
      if (this.qua3 > 0) {
        this.qua3--;
      }
    },
    add3() {
      this.qua3++;
    },
    clear3() {
      this.qua3 = 0;
    },
    reduce4() {
      if (this.qua4 > 0) {
        this.qua4--;
      }
    },
    add4() {
      this.qua4++;
    },
    clear4() {
      this.qua4 = 0;
    },
    submit() {
      // 在此添加提交逻辑
    },
  },
};
</script>
  <style lang="scss" scoped>
  
   @media screen and (max-width:767px) {
    
    .title{
  color: #1E5289;
  margin-left: 10%;
  margin-top: 3%;
  }
  .entitle{
    color: #1E5289;
  margin-left: 10%;
  }
  .shormatrix{
    display: none;
  }
  .longmatrix{
    display: none;
  }
  .squarematrix{
    display: none;
  }
  .bigmatrix{
    display: none;
  }
  .block{
    background-color:#009CA8;
    width: 100%;
    height: 50%;
    border-radius: 10px;
    position: relative;
    z-index: 1;
    margin-left: 10%;
    padding-top: 10px;
    padding-left: 10px;
    padding-bottom: 10px;
    grid-row: 2; 
  }
  .buytick{
    border:3px solid #009CA8;
    width: 100%;
    height: 50%;
    background-color: white;
    border-radius:10px;
    margin-top: 10%;
    margin-left: 10%;
    margin-block-end: 20%;
    position: relative;
    // bottom: 10px;
    z-index: 1;
    grid-row: 2;
  }
  .addandsub{
    width: 30px;
    height: 30px;
    margin-left: 20px;
    margin-right:20px;
    color: #1E5289;
    background-color: white;
    border:1px solid #1E5289;
    border-radius: 5px;
  }
  .SweatBee{
    color:#1E5289;
    background-color: white;
    border-radius: 5px;
    width: 30%;
    margin-left: 10px;
    text-align: center;
  }
  .white{
    color:white;
    margin-left: 20px;
  }
  .red{
    color: #EB5F86;
  }
  .clear{
    border:none;
    background-color:white;
    color:#1E5289;
  }
  .submit{
    width: 200px;
    height: 50px;
    margin: 20px;
    margin-left: 23%;
    border:1px solid #EB5F86;
    background-color: #FBF796;
    color: #1E5289;
  }
  .FareAndIllustrate{
    color:#1E5289;
    background-color: #FBF796;
    width: 15%;
    margin-top: 10px;
    margin-bottom: 10px;
    margin-left: 10px;
    text-align: center;
    
  }
  .tick{
    margin-top: 20px;
    margin-bottom: 30px;
    margin-left: 15%;
    color: #009CA8;
  }
  .sum{
    color:#009CA8;
    text-align: center;
  }
  .forrwd {
    display: flex;
      // flex-direction: column;
      flex-direction: column-reverse;
    }
   }
  
  
  @media screen and (min-width:768px){
  .forrwd{
    display: flex;
    width: 90%;
  }
  .title{
  color: #1E5289;
  margin-left: 10%;
  margin-top: 3%;
  }
  .entitle{
    color: #1E5289;
  margin-left: 10%;
  }
  .block{
    background-color:#009CA8;
    width: 35%;
    height: 70%;
    border-radius: 10px;
    position: relative;
    z-index: 1;
    margin-left: 10%;
    padding-top: 10px;
    padding-left: 10px;
    padding-bottom: 10px;
  }
  
  .FareAndIllustrate{
    color:#1E5289;
    background-color: #FBF796;
    width: 15%;
    margin-top: 10px;
    margin-bottom: 10px;
    margin-left: 10px;
    text-align: center;
    
  }
  .white{
    color:white;
    margin-left: 20px;
  }
  .SweatBee{
    color:#1E5289;
    background-color: white;
    border-radius: 5px;
    width: 30%;
    margin-left: 10px;
    text-align: center;
  }
  .red{
    color: #EB5F86;
  }
  .SweatBeeball{
    width:10px;
    height:10px; 
    border-radius:999em;
    background-color: black;
  }
  .frame{
    border: 3px solid #009CA8;
    width: 31%;
    height: 65%;
    background-color: white;
    position: absolute;
    top:110px;
    left: 130px;
    border-radius:10px;
  }
  .shormatrix{
    position: absolute;
    right: 95%;
  }
  .longmatrix{
   position: absolute;
    right:0;
    bottom: 0;
  }
  .squarematrix{
    width: 100px;
    height: 100px;
    position: absolute;
    left: 46%;
    bottom: 76%;
    z-index: 0;
  }
  .buytick{
    border:3px solid #009CA8;
    width: 35%;
    height: 63%;
    background-color: white;
    border-radius:10px;
    margin-left: 11%;
    margin-right: 0px;
    margin-block-end: 20%;
    position: relative;
    bottom: 20px;
    z-index: 1;
  }
  .tick{
    margin-top: 20px;
    margin-bottom: 30px;
    margin-left: 20%;
    color: #009CA8;
  }
  .addandsub{
    width: 30px;
    height: 30px;
    margin-left: 20px;
    margin-right:20px;
    color: #1E5289;
    background-color: white;
    border:1px solid #1E5289;
    border-radius: 5px;
  }
  .line{
    border:1px solid #009CA8;
    position: absolute;
    width: 70%;
    bottom: 77%;
    right: 100%;
    z-index: 1;
  }
  .ball{
    width:20px;
    height:20px; 
    border-radius:999em;
    background-color: white;
    z-index:2;
    position: absolute;
    right: 132%;
    bottom: 75%;
  }
  .sumline{
    border-bottom:2px solid #009CA8;
    width: 80%;
    margin-left: 10%;
  }
  .sum{
    color:#009CA8;
    text-align: center;
  }
  .sumred{
    color: #EB5F86;
    margin-left: 20px;
  }
  .submit{
    width: 200px;
    height: 50px;
    margin: 20px;
    margin-left: 25%;
    border:1px solid #EB5F86;
    background-color: #FBF796;
    color: #1E5289;
  }
  .bigmatrix{
    position: absolute;
    z-index: 0;
    left: 53%;
    width: 30%;
    height: 58%;
  }
  .cube{
    width: 40px;
    height: 40px;
    position: absolute;
    bottom: 10%;
    left: 58%;
  }
  .cube2{
    width: 40px;
    height: 40px;
    position: absolute;
    bottom: 10%;
    left: 55%;
  }
  .clear{
    border:none;
    background-color:white;
    color:#1E5289;
  }
  }
  </style> 
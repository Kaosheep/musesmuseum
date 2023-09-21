<template>
  <div class="title">
    <div style="color: white;">歷史沿革</div>
    <div style="color: white;">History</div>
  </div>
  <div class="block"></div>
  <div style="display: flex;">
    <div class="dottedline"><img src="@/assets/image/history/dottedline.png">
      <button class="left" @click="showPreviousContent">←</button>
      <button class="firstyear" @click="showContent(0)" :style="{ backgroundColor: yearColors[0] }">
        <div class="oneyear">{{ year }}</div>
        <p class="text1" v-if="contentIndex === 0">{{ text1 }}</p>
      </button>
      <button class="secondyear" @click="showContent(1)" :style="{ backgroundColor: yearColors[1] }">
        <div class="twoyear">{{ twoyear }}</div>
        <p class="text2" v-if="contentIndex === 1">{{ text2 }}</p>
      </button>
      <button class="thirdyearyear" @click="showContent(2)" :style="{ backgroundColor: yearColors[2] }">
        <div class="threeyear">{{ threeyear }}</div>
        <p class="text3" v-if="contentIndex === 2">{{ text3 }}</p>
      </button>
      <button class="right" @click="showNextContent">→</button>
      <div class="squarelattice"><img src="@/assets/image/history/squarelattice.png"></div>
    </div>
  </div>

</template>

<script>
export default {
  data() {
    return {
      year: 2018,
      twoyear: 2020,
      threeyear:2023,
      text1: '2018年新冠病毒大流行迫使Muses Museum暫時關閉，但也推動了更多虛擬參觀選項的發展，讓民眾在家就可以線上欣賞藝術和文物帶來的陶冶與饗宴。',
     text2: '2020年Muses Museum博物館展示了令人驚嘆的藝術和文化遺產，吸引了數以百萬計的遊客。這一年，博物館提供了獨特的展覽。',
     text3: '2023年的Muses Museum博物館展示了與當年重大事件相關的珍貴文物和紀念品，讓人們回顧歷史並深入了解這些事件的影響。',
      contentIndex: 0, 
      yearColors: ['#EB5F86', '', ''],
      twoyearColors: ['#EB5F86', '', ''],
      yearColors: ['#EB5F86', '', ''], 
    };
  },
  methods: {
    showContent(index) {
      this.contentIndex = index;
      this.yearColors = this.yearColors.map((color, i) => (i === index ? '#EB5F86' : ''));
    },
    showPreviousContent() {
      this.contentIndex = (this.contentIndex - 1 + 3) % 3;
      this.yearColors = this.yearColors.map((color, i) => (i === this.contentIndex ? '#EB5F86' : ''));
    },
    showNextContent() {
      this.contentIndex = (this.contentIndex + 1) % 3;
      this.yearColors = this.yearColors.map((color, i) => (i === this.contentIndex ? '#EB5F86' : ''));
    },
  },
};
</script>
   
    
<style lang="scss" scoped>

@media screen and (max-width:767px) {
  .squarelattice{
    display: none;
  }
  .title{
      padding: 5px;
      background-color:#009CA8;
      width: 20%;
      text-align: center;
      border-radius: 5px;
      position:relative ;
      margin-left: 10%;
      margin-top: 2%;
      margin-bottom: 5%;
      z-index: 1;
    }
    .block{
      position: absolute;
      background-color:#FBF796;
      border-radius: 5px;
      width:20% ;
      height: 9%;
      left: 11%;
      bottom: 78%;
    }
    .dottedline img{
    width: 90%;
    position: relative;
    margin-top: 5%;
    margin-left: 5%;
    }
    .left{
      width: 30px;
      height: 30px;
      color:#009CA8;
      background-color: white;
      border:2px solid #009CA8;
      border-radius: 50px;
      position: absolute;
      left: 0;
      top: 35%;
    }
    .right{
      width: 30px;
      height: 30px;
      color:#009CA8;
      background-color: white;
      border:2px solid #009CA8;
      border-radius: 50px;
      position: absolute;
      right: 1%;
      top: 34%;
    }
    .firstyear{
      border:none ;
      border-radius: 50px;
      background-color: #009CA8;
      position: absolute;
      width: 25px;
      height: 25px;
      left: 10%;
      top:30%
    }
    .oneyear{
      position: absolute;
      bottom: 100%;
      right: 3px;
      color:#009CA8 ;
      font-size: 30px;
    }
    .secondyear{
      border:none ;
      border-radius: 50px;
      background-color: #009CA8;
      position: absolute;
      width: 25px;
      height: 25px;
      left: 47%;
      top:37%
    }
    .twoyear{
      position: absolute;
      bottom: 100%;
      right: 3px;
      color:#009CA8 ;
      font-size: 30px;
    }
    .thirdyearyear{
      border:none ;
      border-radius: 50px;
      background-color: #009CA8;
      position: absolute;
      width: 25px;
      height: 25px;
      left: 89%;
      top:30%
    }
    .threeyear{
      position: absolute;
      bottom: 100%;
      right: 12px;
      color:#009CA8 ;
      font-size: 30px;
    }
    .text1{
      margin-top:100% ;
      font-size: 30px;
      width: 400px;
      height: 300px;
      position: relative;
      right: 10px;
      top:90px;
      color:#009CA8 ;
      background-color: #FBF796;
      padding: 10px;
      padding-bottom: 10px;
      border-radius: 5px;
    }
    .text2{
      margin-top:100% ;
      font-size: 30px;
      width: 400px;
      height: 300px;
      position: relative;
      right: 180px;
      top:50px;
      color:#009CA8 ;
      background-color: #FBF796;
      padding: 10px;
    }
    .text3{
      margin-top:100% ;
      font-size: 30px;
      width: 400px;
      height: 300px;
      position: relative;
      right: 400px;
      top:90px;
      color:#009CA8 ;
      background-color: #FBF796;
      padding: 10px;
    }
}

@media screen and (min-width:768px){
  .title{
      padding: 5px;
      background-color:#009CA8;
      width: 10%;
      text-align: center;
      border-radius: 5px;
      position:relative ;
      margin-left: 10%;
      margin-top: 2%;
      z-index: 1;
    }
    .block{
      position: absolute;
      background-color:#FBF796;
      border-radius: 5px;
      width:10% ;
      height: 9%;
      left: 11%;
      bottom: 86%;
    }
    .squarelattice{
      position: absolute;
      left: 100%;
      top:-120px
    }
    .left{
      width: 30px;
      height: 30px;
      color:#009CA8;
      background-color: white;
      border:2px solid #009CA8;
      border-radius: 50px;
      position: absolute;
      left: 0;
      top: 44%;
    }
    .right{
      width: 30px;
      height: 30px;
      color:#009CA8;
      background-color: white;
      border:2px solid #009CA8;
      border-radius: 50px;
      position: absolute;
      right: -1%;
      top: 44%;
    }
    .firstyear{
      border:none ;
      border-radius: 50px;
      background-color: #009CA8;
      position: absolute;
      width: 25px;
      height: 25px;
      left: 18%;
      top:0%
    }
    .oneyear{
      position: absolute;
      bottom: 100%;
      right: 3px;
      color:#009CA8 ;
      font-size: 30px;
    }
    .secondyear{
      border:none ;
      border-radius: 50px;
      background-color: #009CA8;
      position: absolute;
      width: 25px;
      height: 25px;
      left: 47%;
      top:82%
    }
    .twoyear{
      position: absolute;
      bottom: 100%;
      right: 3px;
      color:#009CA8 ;
      font-size: 30px;
    }
    .thirdyearyear{
      border:none ;
      border-radius: 50px;
      background-color: #009CA8;
      position: absolute;
      width: 25px;
      height: 25px;
      left: 95%;
      top:30%
    }
    .threeyear{
      position: absolute;
      bottom: 100%;
      right: -12px;
      color:#009CA8 ;
      font-size: 30px;
    }
    .dottedline{
    margin-left: 10%;
    margin-top:10%;
    position: relative;
    }
    .text1{
      width: 400px;
      height: 100px;
      position: relative;
      right: -30px;
      top:-120px;
      color:#009CA8 ;
      background-color: #FBF796;
      padding: 10px;
      border-radius: 5px;
    }
    .text2{
      width: 400px;
      height: 100px;
      position: relative;
      right: 150px;
      top:40px;
      color:#009CA8 ;
      background-color: #FBF796;
      padding: 10px;
    }
    .text3{
      width: 400px;
      height: 100px;
      position: relative;
      right: 180px;
      top:80px;
      color:#009CA8 ;
      background-color: #FBF796;
      padding: 10px;
    }
    
}
    
    </style>

<template>
    <div class=title >
      <div style="color: white;">歷史沿革</div>
      <div style="color: white;">History</div>
    </div>
    <div class="block"></div>
    <div style="display: flex;">
      <div class="dottedline"><img src="@/assets/image/history/dottedline.png">
    <button class="left"  @click="left">←</button>
    <button class="firstyear"  @click="point1"><div class="oneyear">{{year}}</div><p class="text1">{{ text1 }}</p></button>
    <button class="secondyear" @click="point2"><div class="twoyear">{{twoyear}}</div><p  class="text2">{{ text2 }}</p></button>
    <button class="thirdyearyear" @click="point3"><div class="threeyear">{{threeyear}}</div><p class="text3">{{ text3 }}</p></button>
    
    <button class="right" @click="right">→</button>
  </div>
    </div>
    </template>
    
    <script >
    
     export default {
        data() {
        return {
          year:2018,
          twoyear:2020,
          threeyear:2023,
          left:0,
          right:1,
          point1:2,
          text1:'2020年新冠病毒大流行迫使Muses Museum暫時關閉，但也推動了更多虛擬參觀選項的發展，讓民眾在家就可以線上欣賞藝術和文物帶來的陶冶與饗宴。',
          text2:'2020年新冠病毒大流行迫使Muses Museum暫時關閉，但也推動了更多虛擬參觀選項的發展，讓民眾在家就可以線上欣賞藝術和文物帶來的陶冶與饗宴。',
          text3:'2020年新冠病毒大流行迫使Muses Museum暫時關閉，但也推動了更多虛擬參觀選項的發展，讓民眾在家就可以線上欣賞藝術和文物帶來的陶冶與饗宴。'
        }
      },
      computed: {
        
      },
      methods: {
        // year() {
        //   this.buttonColor = this.buttonColor === 'red' ? 'green' : 'red'
      },
    }
    </script>
    
    <style lang="scss">
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
      right: 3px;
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
      height: 80px;
      position: relative;
      right: -30px;
      top:-120px;
      color:#009CA8 ;
      background-color: #FBF796;
      padding: 10px;
      padding-bottom: 10px;
      border-radius: 5px;
    }
    .text2{
      width: 400px;
      height: 80px;
      position: relative;
      right: 130px;
      top:40px;
      color:#009CA8 ;
      background-color: #FBF796;
      padding: 10px;
    }
    .text3{
      width: 400px;
      height: 80px;
      position: relative;
      right: 160px;
      top:80px;
      color:#009CA8 ;
      background-color: #FBF796;
      padding: 10px;
    }
    </style>

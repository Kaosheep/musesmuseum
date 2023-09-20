<template>
    <div class=title >
      <div style="color: white;">歷史沿革</div>
      <div style="color: white;">History</div>
    </div>
    <div class="block"></div>
    <div style="display: flex;">
      <div class="dottedline"><img src="@/assets/image/history/dottedline.png">
    <button class="left"  @click="left">←</button>
    <button class="firstyear"  @click="point1" ><div class="oneyear">{{year}}</div><p class="text1">{{text1}}</p></button>
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
          point1:3,
          // point2:4,
          text1:'2018年新冠病毒大流行迫使Muses Museum暫時關閉，但也推動了更多虛擬參觀選項的發展，讓民眾在家就可以線上欣賞藝術和文物帶來的陶冶與饗宴。',
          text2:'2020年新冠病毒大流行迫使Muses Museum暫時關閉，但也推動了更多虛擬參觀選項的發展，讓民眾在家就可以線上欣賞藝術和文物帶來的陶冶與饗宴。',
          text3:'2023年新冠病毒大流行迫使Muses Museum暫時關閉，但也推動了更多虛擬參觀選項的發展，讓民眾在家就可以線上欣賞藝術和文物帶來的陶冶與饗宴。'
        }
      },
      computed: {
        
      },
      methods: {
     
      }

      }
    </script>
    
    <style lang="scss" scoped>

@media screen and (max-width:767px) {
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
      width: 400px;
      height: 80px;
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
      width: 400px;
      height: 80px;
      position: relative;
      right: 180px;
      top:50px;
      color:#009CA8 ;
      background-color: #FBF796;
      padding: 10px;
    }
    .text3{
      width: 400px;
      height: 80px;
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
      right: 150px;
      top:40px;
      color:#009CA8 ;
      background-color: #FBF796;
      padding: 10px;
    }
    .text3{
      width: 400px;
      height: 80px;
      position: relative;
      right: 180px;
      top:80px;
      color:#009CA8 ;
      background-color: #FBF796;
      padding: 10px;
    }
}
    
    </style>

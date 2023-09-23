<template>
  <div class="title">
      <div style="color: white;">歷史沿革</div>
      <div style="color: white;">History</div>
    </div>
    <div class="block"></div>
  <div class="carousel-container">
    <div class="carousel-slide" :style="{ transform: `translateX(-${currentIndex * 100}%)` }">
      <div class="carousel-track" :style="{ transform: `translateX(-${currentIndex * 100}%)` }"></div>
      <img src="@/assets/image/history/slide1.png" alt="Slide 1">
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
        <div class="squarelattice"><img src="@/assets/image/history/squarelattice.png"></div>
    </div>
    <div class="carousel-slide" :style="{ transform: `translateX(-${currentIndex * 100}%)` }">
      <img src="@/assets/image/history/slide2.png">
      <button class="firstyear" @click="showContent(3)" :style="{ backgroundColor: yearColors[3] }">
          <div class="oneyear">{{ fourthyear }}</div>
          <p class="text1" v-if="contentIndex === 3">{{ text4 }}</p>
        </button>
        <button class="secondyear" @click="showContent(4)" :style="{ backgroundColor: yearColors[4] }">
          <div class="twoyear">{{ fifthyear }}</div>
          <p class="text2" v-if="contentIndex === 4">{{ text5 }}</p>
        </button>
        <button class="thirdyearyear" @click="showContent(5)" :style="{ backgroundColor: yearColors[5] }">
          <div class="threeyear">{{ sixthyear }}</div>
          <p class="text3" v-if="contentIndex === 5">{{ text6 }}</p>
        </button>
        
        <div class="squarelattice"><img src="@/assets/image/history/squarelattice.png"></div>
    </div>
    <button class="prev-button" @click="prevSlide">←</button>
    <button class="next-button" @click="nextSlide">→</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      year: 2000,
      twoyear: 2010,
      threeyear: 2017,
      fourthyear: 2018,
      fifthyear: 2020,
      sixthyear: 2023,
      text1: '2000年新冠病毒大流行迫使Muses Museum暫時關閉，但也推動了更多虛擬參觀選項的發展，讓民眾在家就可以線上欣賞藝術和文物帶來的陶冶與饗宴。',
      text2: '2010年Muses Museum博物館展示了令人驚嘆的藝術和文化遺產，吸引了數以百萬計的遊客。這一年，博物館提供了獨特的展覽。',
      text3: '2017年的Muses Museum博物館展示了與當年重大事件相關的珍貴文物和紀念品，讓人們回顧歷史並深入了解這些事件的影響。',
      text4: '2018年新冠病毒大流行迫使Muses Museum暫時關閉，但也推動了更多虛擬參觀選項的發展，讓民眾在家就可以線上欣賞藝術和文物帶來的陶冶與饗宴。',
      text5: '2020年Muses Museum博物館展示了令人驚嘆的藝術和文化遺產，吸引了數以百萬計的遊客。這一年，博物館提供了獨特的展覽。',
      text6: '2023年的Muses Museum博物館展示了與當年重大事件相關的珍貴文物和紀念品，讓人們回顧歷史並深入了解這些事件的影響。',
      contentIndex: 0,
      yearColors: ['#EB5F86', '', ''],
      twoyearColors: ['#EB5F86', '', ''],
      yearColors: ['#EB5F86', '', ''],
      yearColors: ['#EB5F86', '', ''],
      yearColors: ['#EB5F86', '', ''],
      yearColors: ['#EB5F86', '', ''],
      currentIndex: 0,
      isTransitioning: false,
    };
  },
  methods: {
    showContent(index) {
      this.contentIndex = index;
      this.yearColors = this.yearColors.map(() => '');
      this.yearColors[index] = '#EB5F86';
    },
    prevSlide() {
      if (!this.isTransitioning) {
        this.isTransitioning = true;
        this.currentIndex = Math.max(this.currentIndex - 1, 0);
        setTimeout(() => {
          this.isTransitioning = false;
        }, 300); // 过渡时间与 CSS 中的过渡时间一致
      }
    },
    nextSlide() {
      if (!this.isTransitioning) {
        this.isTransitioning = true;
        if (this.currentIndex === 1) { // 如果当前是最后一张幻灯片
          this.currentIndex = 0; // 切换到第一张幻灯片
        } else {
          this.currentIndex = Math.min(this.currentIndex + 1, 1);
        }
        setTimeout(() => {
          this.isTransitioning = false;
        }, 300);
      }
    },
  },
};

</script>

<style lang="scss" scoped>
@media screen and (max-width:767px) {
  img{
    width: 70%;
  }
  .squarelattice{
      display: none;
    }
  .carousel-container {
  display: flex;
  flex-wrap: nowrap;
  overflow: hidden;
  width: 100%;
  height: 500px;
  position: relative;
  transition: transform 0.3s ease-in-out;
  margin-top:-20%;
  margin-left: 3%;
}

.carousel-slide {
  flex: 0 0 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: white;
  color: black;
  font-size: 24px;
  display: flex;
  transition: transform 0.3s ease-in-out; /* 添加过渡属性 */
  will-change: transform;
}

.prev-button,
.next-button {
  position: absolute;
  top: 50%;
  background-color: #009CA8;
  color: white;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
}

.prev-button {
  position: absolute;
  top: 46%;
  background-color: white;
  color:#009CA8 ;
  border: 1px solid #009CA8;
  padding: 5px 10px;
  cursor: pointer;
  border-radius: 50%; 
  font-size: 20px;
  margin-left: 8%;
}

.next-button {
  position: absolute;
  top: 46%;
  background-color: white;
  color:#009CA8 ;
  border: 1px solid #009CA8;
  padding: 5px 10px;
  cursor: pointer;
  border-radius: 50%; 
  font-size: 20px;
  margin-left: 88%;
}
.Carousel{
    display: flex;
  }
  .title{
      padding: 5px;
      background-color:#009CA8;
      width: 30%;
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
      width:30% ;
      height: 30%;
      left: 20%;
      bottom: 70%;
    }
    .squarelattice{
      position: absolute;
      left: 100%;
      top:-120px
    }
    .firstyear{
      border:none ;
      border-radius: 50px;
      background-color: #009CA8;
      position: absolute;
      width: 25px;
      height: 25px;
      left: 18%;
      top:38%;
    }
    .oneyear{
      position: absolute;
      bottom: 80%;
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
      top:60%
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
      left: 80%;
      top:39%
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
.carousel-container {
  display: flex;
  flex-wrap: nowrap;
  overflow: hidden;
  width: 100%;
  height: 500px;
  position: relative;
  transition: transform 0.3s ease-in-out;
  margin-top:-5%;
  margin-left: 3%;
}

.carousel-slide {
  flex: 0 0 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: white;
  color: black;
  font-size: 24px;
  display: flex;
  transition: transform 0.3s ease-in-out; /* 添加过渡属性 */
  will-change: transform;
}

.prev-button,
.next-button {
  position: absolute;
  top: 50%;
  background-color: #009CA8;
  color: white;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
}

.prev-button {
  position: absolute;
  top: 46%;
  background-color: white;
  color:#009CA8 ;
  border: 1px solid #009CA8;
  padding: 5px 10px;
  cursor: pointer;
  border-radius: 50%; 
  font-size: 20px;
  margin-left: 8%;
}

.next-button {
  position: absolute;
  top: 46%;
  background-color: white;
  color:#009CA8 ;
  border: 1px solid #009CA8;
  padding: 5px 10px;
  cursor: pointer;
  border-radius: 50%; 
  font-size: 20px;
  margin-left: 88%;
}
.Carousel{
    display: flex;
  }
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
    .firstyear{
      border:none ;
      border-radius: 50px;
      background-color: #009CA8;
      position: absolute;
      width: 25px;
      height: 25px;
      left: 18%;
      top:38%;
    }
    .oneyear{
      position: absolute;
      bottom: 80%;
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
      top:60%
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
      left: 80%;
      top:39%
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
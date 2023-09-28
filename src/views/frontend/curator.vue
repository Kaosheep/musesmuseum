<template>
  <div class="title">
   <p>歷任館長 Director-general</p>
   <div class="block"></div>
  </div>
  <div class="third">
   <div class="three"><img src="@/assets/image/Curator/1.png"></div>
   <p class="thirdname">He</p>
   <div class="thirdcurator"><img src="@/assets/image/Curator/he.png"> </div>
  <div class="thirdmatrix"><img src="@/assets/image/Curator/bluematrix.png"></div>
   <div class="thirddottedline"><img src="@/assets/image/Curator/firstdottedline.png"></div>
  </div>
  <div class="second">
  <div class="secondcurator"><img src="@/assets/image/Curator/huang.png"></div>
    <p class="secondname">Huang</p>
    <div class="two"><img src="@/assets/image/Curator/2.png"></div>
    <div class="secondmatrix"><img src="@/assets/image/Curator/redmatrix.png"></div>
    <div class="seconddottedline"><img src="@/assets/image/Curator/seconddottedline.png"></div>
  </div>
  <div class="third">
   <div class="three"><img src="@/assets/image/Curator/3.png"></div>
   <p class="thirdname">Chou</p>
   <div class="thirdcurator"><img src="@/assets/image/Curator/chou.jpg"> </div>
  <div class="thirdmatrix"><img src="@/assets/image/Curator/thirdmatrix.png"></div>
   <div class="thirddottedline"><img src="@/assets/image/Curator/firstdottedline.png"></div>
  </div>
  <div class="second">
  <div class="secondcurator"><img src="@/assets/image/Curator/yang.png"></div>
    <p class="secondname" style="color: black;">Yang</p>
    <div class="two"><img src="@/assets/image/Curator/4.png"></div>
    <div class="secondmatrix"><img src="@/assets/image/Curator/fourthmatrix.png"></div>
    <div class="fourthdottedline"><img src="@/assets/image/Curator/fourthdottedline.png"></div>
  </div>
  <div class="third">
   <div class="three"><img src="@/assets/image/Curator/5.png"></div>
   <p class="thirdname">Ciou</p>
   <div class="thirdcurator"><img src="@/assets/image/Curator/Ciou.png"> </div>
  <div class="thirdmatrix"><img src="@/assets/image/Curator/redmatrix.png"></div>
   <div class="thirddottedline"><img src="@/assets/image/Curator/fifthdottedline.png"></div>
  </div>
  <div class="second">
  <div class="secondcurator"><img src="@/assets/image/Curator/yu.png"></div>
    <p class="secondname" style="color: black;">Yu</p>
    <div class="two"><img src="@/assets/image/Curator/6.png"></div>
    <div class="secondmatrix"><img src="@/assets/image/Curator/sixthmatrix.png"></div>
    <div class="seventhdottedline"><img src="@/assets/image/Curator/seventhdottedline.png"></div>
  </div>
  <div class="third">
   <div class="three"><img src="@/assets/image/Curator/7.png"></div>
   <p class="thirdname">Kao</p>
   <div class="thirdcurator"><img src="@/assets/image/Curator/kao.png"> </div>
  <div class="thirdmatrix"><img src="@/assets/image/Curator/seventhmatrix.png"></div>
  </div>
 </template>
 
 <script>
 
 </script>
 
 <style lang="scss" scoped>

 @media screen and (max-width:767px) {
.title p{
  font-size: 20px;
  padding: 5px;
  background-color:#FBF796;
  width:300px;
  height: 10%;
  text-align: center;
  border-radius: 5px;
  position:relative ;
  margin-left: 10%;
  margin-top: 3%;
  margin-bottom: 10px;
  z-index: 1;
 }
 .block{
   display: none;
 }

 .second{
   display: flex;
   position: relative;
 }
 .secondcurator img{
   margin-left: 20%;
   width: 70%;
   height: 80%;
   position: relative;
   z-index: 1;
   border-radius: 10px;
 }
 .two img{
  width: 70%;
   height: 70%;
   margin-left:10%;
   position: relative;
 }
 .secondname{
   position: absolute;
   color: black;
   margin-top: 10%;
   margin-left: 60%;
   font-size: 32px;
   color: #1E5289;
 }
 .secondmatrix img{
   position: absolute;
   z-index: 0;
   top: 5%;
   right: 48%;
   width: 35%;
   height: 80%;
 }
 .seconddottedline img{
   display: none;
 }
 .third{
   display: flex;
   margin-top: 10%;
   
   position: relative;
 }
 .three img{
  width: 70%;
   height: 70%;
   margin-left:25%;
   position: relative;
 }
 .thirdname{
  position: absolute;
   color: black;
   left: 10%;
   top: 30%;
   font-size: 32px;
 }
 .thirdcurator img{
  width: 70%;
   height: 85%;
   position: relative;
   margin-left: 25%;
   z-index: 1;
   border-radius:5px ;
 }
 .thirdmatrix img{
  position: absolute;
   z-index: 0;
   top: 10%;
   right: 1px;
   width: 35%;
   height: 80%;
 }
 .thirddottedline img{
  display: none;
 }
 .fourthdottedline img{
  display: none;
 }
 .seventhdottedline{
  display: none;
 }
}
 
 @media screen and (min-width:768px){
 .title p{
   font-size: 20px;
   padding: 5px;
   background-color:#FBF796;
   width:20%;
   height: 10%;
   text-align: center;
   border-radius: 5px;
   position:relative ;
   margin-left: 10%;
   margin-top: 1%;
   margin-bottom: 10px;
   z-index: 1;
 }
 .block{
   position: absolute;
   background-color:#009CA8;
   border-radius: 5px;
   width: 20%;
   height: 7%;
   left: 11%;
   bottom: 91%;
 }

 .second{
   display: flex;
   position: relative;
   margin-left: 10%;
   margin-top: 10%;
 }
 .secondcurator img{
   width: 100%;
   height: 100%;
   position: relative;
   z-index: 1;
   margin-left: 50%;
   border-radius: 5px;
 }
 .two{
   margin-left: 30%;
 }
 .secondname{
   position: absolute;
   color: black;
   margin-top: 10%;
   margin-left: 50%;
   font-size: 100px;
   color: #1E5289;
 }
 .secondmatrix img{
   position: absolute;
   z-index: 0;
   top: 5%;
   right: 63%;
   width: 24%;
   height: 100%;
 }
 .seconddottedline img{
   position: absolute;
   height: 120%;
   top: 80%;
   right: 60%;
 }
 .third{
   display: flex;
   margin-top: 10%;
   margin-left: 10%;
   position: relative;
 }
 .three{
   margin-left: 10%;
   width: 10%;
   height: 10%;
   margin-right: 20%;
 }
 .thirdname{
   position: absolute;
   color: black;
   left: 20%;
   top: 30%;
   font-size: 100px;
 }
 .thirdcurator img{
   width: 90%;
   height: 90%;
   position: relative;
   z-index: 1;
   margin-left: 22%;
   border-radius: 5px;
 }
 .thirdmatrix img{
   position: absolute;
   z-index: 0;
   top: 10%;
   right: 32%;
   width: 20%;
   height: 85%;
 }
 .thirddottedline img{
   position: absolute;
   height: 100%;
   top: 90%;
   right: 50%;
 }
 .fourthdottedline img{
   position: absolute;
   height: 120%;
   top: 80%;
   right: 58%;
 }
 .seventhdottedline{
   position: absolute;
   height: 120%;
   top: 90%;
   right: 50%;
 }
 }
 </style>

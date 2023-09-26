<template>
  <div class="title">
   <p class="curaror">歷任館長 Director-general</p>
   <div class="block"></div>
  </div>
  <div class="third">
   <div class="three"><img src="@/assets/image/Curator/1.png"></div>
   <p class="thirdname">Sophia Anne</p>
   <div class="thirdcurator"><img src="@/assets/image/Curator/first.png"> </div>
  <div class="thirdmatrix"><img src="@/assets/image/Curator/bluematrix.png"></div>
   <div class="thirddottedline"><img src="@/assets/image/Curator/fifthdottedline.png"></div>
  </div>
  <div class="second">
  <div class="secondcurator"><img src="@/assets/image/Curator/second.png"></div>
    <p class="secondname">Emily Chang</p>
    <div class="two"><img src="@/assets/image/Curator/2.png"></div>
    <div class="secondmatrix"><img src="@/assets/image/Curator/redmatrix.png"></div>
    <div class="seconddottedline"><img src="@/assets/image/Curator/seconddottedline.png"></div>
  </div>
  <div class="third">
   <div class="three"><img src="@/assets/image/Curator/3.png"></div>
   <p class="thirdname">Emily Lam</p>
   <div class="thirdcurator"><img src="@/assets/image/Curator/first.png"> </div>
  <div class="thirdmatrix"><img src="@/assets/image/Curator/thirdmatrix.png"></div>
   <div class="thirddottedline"><img src="@/assets/image/Curator/firstdottedline.png"></div>
  </div>
  <div class="second">
  <div class="secondcurator"><img src="@/assets/image/Curator/second.png"></div>
    <p class="secondname" style="color: black;">Jason Ming</p>
    <div class="two"><img src="@/assets/image/Curator/4.png"></div>
    <div class="secondmatrix"><img src="@/assets/image/Curator/fourthmatrix.png"></div>
    <div class="fourthdottedline"><img src="@/assets/image/Curator/fourthdottedline.png"></div>
  </div>
  <div class="third">
   <div class="three"><img src="@/assets/image/Curator/5.png"></div>
   <p class="thirdname">Grace Wong</p>
   <div class="thirdcurator"><img src="@/assets/image/Curator/first.png"> </div>
  <div class="thirdmatrix"><img src="@/assets/image/Curator/redmatrix.png"></div>
   <div class="thirddottedline"><img src="@/assets/image/Curator/fifthdottedline.png"></div>
  </div>
  <div class="second">
  <div class="secondcurator"><img src="@/assets/image/Curator/second.png"></div>
    <p class="secondname" style="color: black;">Benjamin Kim</p>
    <div class="two"><img src="@/assets/image/Curator/6.png"></div>
    <div class="secondmatrix"><img src="@/assets/image/Curator/sixthmatrix.png"></div>
    <div class="seventhdottedline"><img src="@/assets/image/Curator/seventhdottedline.png"></div>
  </div>
  <div class="third">
   <div class="three"><img src="@/assets/image/Curator/7.png"></div>
   <p class="thirdname">Eric Wu</p>
   <div class="thirdcurator"><img src="@/assets/image/Curator/first.png"> </div>
  <div class="thirdmatrix"><img src="@/assets/image/Curator/seventhmatrix.png"></div>
  </div>
 </template>
 
 <script>
 
 </script>
 
 <style lang="scss" scoped>

 @media screen and (max-width:767px) {
.title {
  padding: 5px;
  width:300px;
  height: 10%;
  border-radius: 5px;
  margin-left: 5%;
  margin-top: 3%;
  margin-bottom: 10px;
  position:relative;
  z-index: 2; 
 }
 .curaror {
  width:300px;
   position:absolute;
   text-align: center;
   font-size: 20px; 
   z-index: 2; 
   background-color: #FBF796;
   border-radius: 5px;
 }
 .block{
   position: absolute;
   background-color:#009CA8;
   border-radius: 5px;
   width: 300px;
   height: 35px;
   left: 7%;
   z-index: 0; 
 }
 .second{
   display: flex;
   position: relative;
 }
 .secondcurator img{
   width: 70%;
   height: 80%;
   position: relative;
   z-index: 1;
   
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
   margin-left: 55%;
   font-size: 30px;
   width: 10%;
   color: #1E5289;
 }
 .secondmatrix img{
   position: absolute;
   z-index: 0;
   top: 5%;
   right: 48%;
   width: 50%;
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
   margin-left:40%;
   position: relative;
 }
 .thirdname{
  position: absolute;
   color: black;
   top: 40%;
   font-size: 27px;
 }
 .thirdcurator img{
   width: 70%;
   height: 85%;
   position: relative;
   margin-left: 23%;
   z-index: 1;
 }
 .thirdmatrix img{
  position: absolute;
   z-index: 0;
   top: 10%;
   right: 1px;
   width: 48%;
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
 .first{
   display: flex;
   margin-top: 10%;
 }
 .one{
   margin-left: 20%;
   width: 10%;
   height: 10%;
   margin-right: 20%;
   position: relative;
 }
 .firstname{
   position: absolute;
   color: black;
   left: 25%;
   top: 40%;
   font-size: 50px;
 }
 .firstcurator img{
   width: 78%;
   height: 78%;
   top:10px;
   position: relative;
   z-index: 1;
 }
 .firstbluematrix img{
   position: absolute;
   z-index: 0;
   top: 30%;
   right: 16%;
   width: 33%;
   height: 42%;
 }
 .firstdottedline img{
   position: absolute;
   height: 60%;
   top: 71%;
   right: 40%;
 }
 .second{
   display: flex;
   position: relative;
 }
 .secondcurator img{
   width: 78%;
   height: 78%;
   position: relative;
   z-index: 1;
   margin-left: 25%;
 }
 .two{
   margin-left: 20%;
 }
 .secondname{
   position: absolute;
   color: black;
   margin-top: 10%;
   margin-left: 50%;
   font-size: 50px;
   color: #1E5289;
 }
 .secondmatrix img{
   position: absolute;
   z-index: 0;
   top: 5%;
   right: 55%;
   width: 33%;
   height: 80%;
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
   left: 25%;
   top: 30%;
   font-size: 50px;
 }
 .thirdcurator img{
   width: 78%;
   height: 78%;
   position: relative;
   z-index: 1;
   margin-left: 22%;
 }
 .thirdmatrix img{
   position: absolute;
   z-index: 0;
   top: 10%;
   right: 16%;
   width: 33%;
   height: 75%;
 }
 .thirddottedline img{
   position: absolute;
   height: 90%;
   top: 90%;
   right: 40%;
 }
 .fourthdottedline img{
   position: absolute;
   height: 120%;
   top: 80%;
   right: 50%;
 }
 .seventhdottedline{
   position: absolute;
   height: 120%;
   top: 90%;
   right: 50%;
 }
 }
 </style>

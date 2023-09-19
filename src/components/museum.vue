<template>
  <div class="museum">
    <button id="reset" @click="clean()">
      <p>Back</p>
      <span></span>
    </button>
    <canvas id="three"></canvas>
    <button
      v-for="local in locallist"
      class="localbtn"
      :id="local.id"
      :key="local.id"
      @click="returnid(local.id)"
    >
      <p>{{ local.title }}</p>
    </button>
    <div class="localinfo" v-if="currentInfo">
      <div class="info_img" >
        <img :src="require('../assets/image/museumspace/' + currentInfo.imgsrc)" :alt="currentInfo.infoid"/>
      </div>
      <div class="info_txt">
        <h3>{{ currentInfo.h }}</h3>
        <p>
            {{ currentInfo.p }}
        </p>
      </div>
    </div>
  </div>
</template>

<script src="@/js/museum.js"></script>

<style scoped lang="scss">
.museum {
  background: rgb(251, 247, 150);
  background: linear-gradient(
    180deg,
    rgba(251, 247, 150, 1) 10%,
    rgba(195, 227, 232, 1) 70%
  );
  position: relative;
  button {
    cursor: pointer;
    position: absolute;
    z-index: 100;
    height: 50px;
    width: 50px;
    border-radius: 50%;
    border: none;
    background-color: #fff;
    p {
      white-space: nowrap;
    }
  }

  #reset {
    display: none;
    top: 5%;
    right: 35%;
    width: 100px;
    padding: 10px 10px 0px;
    background-color: #fff;
    border-radius: 20px;
    border: none;
    cursor: pointer;
    p {
      text-align: end;
      width: 70px;
      font-weight: 700;
    }
    span {
      display: inline-block;
      width: 70px;
      height: 3px;
      border-radius: 2px;
      vertical-align: top;
      background-color: $mpink;
      position: relative;
      &::after {
        content: "";
        width: 15px;
        height: 3px;
        border-radius: 2px;
        background-color: $mpink;
        position: absolute;
        left: -15px;
        bottom: 2px;
        transform-origin: right bottom;
        transform: rotate(135deg);
      }
    }
  }
  #store {
    top: 32%;
    left: 70%;
  }
  #localA {
    top: 20%;
    left: 42%;
    @include t(){
        top: 28%;
    }
  }
  #localB {
    top: 30%;
    left: 40%;
    @include t(){
        top: 40%;
    }
  }
  #localC {
    top: 50%;
    left: 30%;
    @include t(){
        top: 58%;
    }
  }
  #rest {
    top: 43%;
    left: 67.5%;
  }
  #info {
    top: 56%;
    left: 65%;
  }
  .localinfo {
    width: 30%;
    height: 100%;
    background-color: #fff;
    position: absolute;
    top: 0;
    right: 0;
    padding: 4rem 1.5rem;
    transition: .5s;
    animation: slideinfo .3s 0s 1;
    border: 5px dashed $mgreen;
    .info_img {
      width: 100%;
      margin: auto;
      img {
        width: 100%;
        object-fit: cover;
      }
    }
    h3 {
      line-height: 2;
      text-align: center;

    }
    p{
        position: relative;
        z-index: 2;
    }
  }
  @keyframes slideinfo {
    0%{
        right: -100%;
    }
    100%{
        right: 0;
    }
  }
}
</style>

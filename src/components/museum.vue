<template>
  <div class="museum">
    <button id="reset" @click="clean()">
      <p>Back</p>
      <span></span>
    </button>
    <canvas id="three"></canvas>
    <div class="momap">
      <img src="@/assets/image/museumspace/map.png" alt="" />
    </div>
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
      <div class="info_img">
        <img
          :src="require('@/assets/image/museumspace/' + currentInfo.imgsrc)"
          :alt="currentInfo.infoid"
        />
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
  margin: auto;

  #three {
    max-width: 1500px;
    @include m() {
      display: none;
    }
  }
  .momap {
    display: none;
    padding: 4rem 1rem;
    @include m() {
      display: block;
    }
    img {
      width: 100%;
    }
  }
  button {
    cursor: pointer;
    position: absolute;
    z-index: 100;
    height: 50px;
    width: 50px;
    border-radius: 50%;
    border: none;
    background-color: #fff;
    @include m() {
      pointer-events: none;
    }
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
    @include t() {
      right: 16px;
    }
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
    left: 73%;
    @include d() {
      top: 32%;
      left: 70%;
    }
    @include t() {
      left: 81%;
    }
    @include m() {
      left: 73%;
      top: 56%;
    }
  }
  #localA {
    top: 20%;
    left: 55%;
    @include d {
      top: 20%;
      left: 42%;
    }
    @include t() {
      top: 24%;
    }
    @include m() {
      left: 62%;
      top: 17%;
    }
  }
  #localB {
    top: 30%;
    left: 53%;
    @include d {
      top: 30%;
      left: 40%;
    }
    @include t() {
      top: 33%;
    }
    @include m() {
      left: 50%;
      top: 28%;
    }
  }
  #localC {
    top: 50%;
    left: 45%;
    @include d {
      top: 50%;
      left: 30%;
    }
    @include t() {
      top: 58%;
    }
    @include m() {
      top: 28%;
      left: 25%;
    }
  }
  #rest {
    top: 43%;
    left: 70.5%;
    @include d {
      top: 43%;
      left: 67.5%;
    }
    @include t() {
      left: 77%;
    }
    @include m() {
      left: 50%;
      top: 56%;
    }
  }
  #info {
    top: 56%;
    left: 68%;
    @include d {
      top: 56%;
      left: 65%;
    }
    @include t() {
      left: 72%;
    }
    @include m() {
      left: 33%;
    }
  }
  .localinfo {
    width: 30%;
    height: 100%;
    background-color: #fff;
    position: absolute;
    top: 0;
    right: 0;
    padding: 4rem 1.5rem;
    transition: 0.5s;
    animation: slideinfo 0.3s 0s 1;
    border: 5px dashed $mgreen;
    @include t() {
      display: none;
    }
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
    p {
      @include t() {
      }
      position: relative;
      z-index: 2;
      white-space: pre-line;
      text-align: justify;
    }
  }
  @keyframes slideinfo {
    0% {
      right: -100%;
    }
    100% {
      right: 0;
    }
  }
}
</style>

<template>
    <div :class="['heart',{active:isClick}]" @click="like">
        <svg viewBox="-10 -10 162 143" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M136.206 73.9802C143.523 66.1228 148 55.5842 148 44C148 19.6995 128.301 0 104 0C92.4061 0 81.8596 4.48413 74.0001 11.8127C66.1406 4.48413 55.5939 0 44 0C19.6995 0 0 19.6995 0 44C0 56.2075 4.97119 67.2544 13 75.2256L59.9487 122.174C67.7592 129.985 80.4225 129.985 88.233 122.174L136.316 74.0911L136.206 73.9802Z"/>
        </svg>
    </div>
</template>
<script>
export default {
  data() {
    return {
        isClick:false
    };
  },
  methods: {
    like(){
        this.isClick = !this.isClick
    }
  }
}
</script>
<style scoped>
.heart{
    cursor: pointer;
    position: absolute;
    right: 5px;
    top: 5px;
    width: 40px;
    z-index: 3;
}
.heart path{
    fill : #FFF;
    stroke-width: 10;
    stroke: #AD0000;
    stroke-dasharray: 440;
    stroke-dashoffset: 0;
}

.heart.active path{
    fill : #AD0000;
    animation: none;
}
@keyframes heart {
    0%{
        stroke-dashoffset: 0; 
    }
    40%{
        stroke-dashoffset: 440;
    }
    80%{
        stroke-dashoffset: 880;
        fill: #fff;
    }
    100%{
        stroke-dashoffset: 880;
        fill: #FFAEAE;
    }
}
@media screen and (hover:hover) {
    .heart:not(.active):hover path{
        animation:heart .7s .05s linear forwards;
    }
}
</style>
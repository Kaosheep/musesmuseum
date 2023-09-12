<template>
    <p>{{ text }}</p>
    <span></span>
</template>

<script>
export default {
    props: ['text'],
    data(){
       return {
       
       }
    },
    methods:{
    
    }
}
</script>

<style scoped lang="scss">
p{
    text-align: start;
    width: 100px;
    margin-left: auto;
}
span{
    display: inline-block;
    width: 100px;
    height: 3px;
    border-radius: 2px;
    vertical-align: top;
    background-color: $mpink;
    position: relative;
    &::after{
        content: "";
        width: 15px;
        height: 3px;
        border-radius: 2px;
        background-color: $mpink;
        position: absolute;
        right: 1px;
        bottom: 0px;
        transform-origin: right bottom;
        transform: rotate(45deg);
    }
}
</style>
<template>
    <button>{{ text }}</button>
</template>
   
<script>
export default {
    props: {
        "text": {
            type: String || Number,
            default: "按鈕樣式"
        }
    },
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
button{
    border-radius: 4px;
    border: 2px solid $mpink;
    background-color: #fff;
    width: 120px;
    color: $mblue;
    line-height: 2rem;
    transition: .3s;
    cursor:pointer;
    &:hover{
        background-color:$mpink;
        color: #fff;
    }
}

</style>
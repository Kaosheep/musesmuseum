<template>
    <button>{{ text }}</button>
</template>
   
<script>
export default {
    props: ['text'],
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
button{
    border-radius: 4px;
    border: 2px solid $mpink;
    width: 100px;
    color: $blue;
}

</style>
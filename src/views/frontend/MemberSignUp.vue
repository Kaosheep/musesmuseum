
<template>
  <div class="bgcGY cardCenter">
    <main>
        <div class="backGroundCard">
          <div class="backGroundCardBtns">
            <router-link :to="a.link" v-for="a in memBtnLink">
              <button :class="[a.name === '會員註冊' ? 'pinkBtnLight' : 'pinkBtn']">
                {{a.name}}
              </button>
            </router-link>
          </div>
          
          <form>
            <div class="memloginActi" v-for="i in memAllInfo">
              <label  :key="i.id">{{ i.memTitColumn }}</label>
              <input
              :key="i.id"
              :type="i.type"
              :id="i.id"
              :name="i.name"
              :class="i.class"
              :placeholder="i.placeholder"
              required
              />
            </div>
            <div class="memloginSubmit">
              <input
                type="button"
                id="btnLogin"
                class="submitBtn"
                value="送出"
                @click="checkLoginData"
              />  
            </div>
          </form>
        </div>
    </main>
  </div>
</template>

<script>
import Footer from "@/components/Footer.vue";
export default {
  components: {
    Footer,
  },
  data() {
    return {
      imageSrc: '',
      memAllInfo:[
        { memTitColumn:"姓名",type:"text",id:"memId",name:"memId",class:"fillInClumn",placeholder:"姓名" },
        { memTitColumn:"生日",type:"date",id:"birthday",name:"birthday",class:"fillInClumn",placeholder:"" },
        { memTitColumn:"信箱",type:"email",id:"email",name:"email",class:"fillInClumn",placeholder:"信箱" },
        { memTitColumn:"聯絡電話",type:"text",id:"memPsw",name:"memPsw",class:"fillInClumn",placeholder:"電話" },
        { memTitColumn:"聯絡地址",type:"text",id:"memPsw",name:"memPsw",class:"fillInClumn",placeholder:"地址" },
      ],

      memBtnLink:[
        { link:"", name:"會員註冊" },
        { link:"/Home/Login", name:"會員登入" },
      ],
    };
  },
  methods: {
  },
  mounted() {
    document.body.style.height = `auto`;
  }
};
</script>
<style scoped lang="scss">

@include t() {
  .backGroundCard{
    form{
      margin:30px auto;
        
    }
  }
}
</style>
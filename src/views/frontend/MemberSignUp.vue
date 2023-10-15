
<template>
  <div class="bgcGY cardCenter">
    <main>
      <div class="flex-container">
      <div class="file-upload-container">
        <input type="file" ref="fileInput" @change="fileChange" class="picInput">
        <!-- <h2>Content here</h2> -->
        <div id="dropzone">
          <img :src="imageSrc" id="image" style="max-width: 100px; max-height: 100px;">
        </div>
      </div>
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
            <!-- <div class="resetPswEmail">
              <a href="#">信箱驗證</a>
            </div> -->
            <div class="memloginSubmit">
              <input
                type="button"
                id="btnLogin"
                class="submitBtn"
                value="送出"
                @click="checkLoginData"
              />  
              <!-- <input type="button" id="btnCancel" value="取消"> -->
            </div>
          </form>
        </div>
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
    fileChange(event) {
      const file = event.target.files[0];
      if (file) {
        const readFile = new FileReader();
        readFile.readAsDataURL(file);
        readFile.addEventListener('load', () => {
          this.imageSrc = readFile.result;
        });
      }
    },
    // checkLoginData() {
    //   if (this.memId === "test" && this.memPsw === "test") {
    //     window.alert("登入成功");
    //   } else {
    //     window.alert("帳密錯誤");
    //   }
    // },
  },
  mounted() {
    this.$refs.fileInput.addEventListener('change', this.fileChange);
    document.body.style.height = `auto`;
  }
};
</script>
<style scoped lang="scss">
.flex-container {
  display: flex;
  justify-content: space-between; 
}

.file-upload-container {
  flex-grow: 1; 
  margin-right: 20px; 
}
.picInput{
  width: 80px;
}
img{
    max-width: 100px;
    max-height: 100px;
}
#dropzone{
    border: 5px dashed #ccc;
    width: 110px;
    height: 110px;
}
@include t() {
  .backGroundCard{
    form{
      margin:30px auto;
        
    }
  }
}
</style>
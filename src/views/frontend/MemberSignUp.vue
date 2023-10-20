<template>
  <div class="bgcGY cardCenter">
    <main>
      <div class="backGroundCard">
        <div class="backGroundCardBtns">
          <router-link :to="a.link" v-for="a in memBtnLink">
            <button
              :class="[a.name === '會員註冊' ? 'pinkBtnLight' : 'pinkBtn']"
            >
              {{ a.name }}
            </button>
          </router-link>
        </div>

        <form @submit.prevent>
          <div class="memloginActi" v-for="i in memAllInfo">
            <label :key="i.id">{{ i.memTitColumn }}</label>
            <input
              :key="i.id"
              :type="i.type"
              :id="i.id"
              :name="i.name"
              :class="i.class"
              :placeholder="i.placeholder"
              v-model="inputData[i.name]"
              required
            />
            <span v-if="i.id == 'email'">
              <span v-if="inputData.email">
                <span v-if="ismail">
                  <span v-if="isuse == 'true'">
                    <font-awesome-icon :icon="['far', 'circle-check']" />
                  </span>
                  <span v-if="isuse == 'false'">
                    <font-awesome-icon :icon="['far', 'circle-xmark']" />
                  </span>
                  <span v-show="isuse == 'true'">此email可使用</span>
                  <span v-show="isuse == 'false'">此email已被註冊</span>
                </span>
                <span v-else
                  ><font-awesome-icon :icon="['fas', 'triangle-exclamation']" />非正確格式</span
                >
              </span>
            </span>
          </div>

          <div class="memloginSubmit">
            <input
              type="button"
              id="btnLogin"
              class="submitBtn"
              value="送出"
              @click="sign"
            />
          </div>
        </form>
      </div>
    </main>
  </div>
</template>

<script>
import Footer from "@/components/Footer.vue";
import { faL } from "@fortawesome/free-solid-svg-icons";
export default {
  components: {
    Footer,
  },
  data() {
    return {
      imageSrc: "",
      inputData: [
        { birthday: "" },
        { name: "" },
        { memPsw: "" },
        { memPswc: "" },
        { phone: "" },
        { addr: "" },
        { email: "" },
      ],
      memAllInfo: [
        {
          memTitColumn: "姓名*",
          type: "text",
          id: "name",
          name: "name",
          class: "fillInClumn",
          placeholder: "姓名",
        },
        {
          memTitColumn: "生日*",
          type: "date",
          id: "birthday",
          name: "birthday",
          class: "fillInClumn",
          placeholder: "",
        },
        {
          memTitColumn: "信箱*",
          type: "email",
          id: "email",
          name: "email",
          class: "fillInClumn",
          placeholder: "信箱",
        },
        {
          memTitColumn: "密碼*",
          type: "password",
          id: "memPsw",
          name: "memPsw",
          class: "fillInClumn",
          placeholder: "密碼",
        },
        {
          memTitColumn: "確認密碼*",
          type: "password",
          id: "memPswc",
          class: "fillInClumn",
          placeholder: "再次輸入密碼",
        },
        {
          memTitColumn: "聯絡電話*",
          type: "text",
          id: "phone",
          name: "phone",
          class: "fillInClumn",
          placeholder: "電話",
        },
        {
          memTitColumn: "聯絡地址",
          type: "text",
          id: "addr",
          name: "addr",
          class: "fillInClumn",
          placeholder: "地址",
        },
      ],

      memBtnLink: [
        { link: "", name: "會員註冊" },
        { link: "/Home/Login", name: "會員登入" },
      ],
      isuse: false,
      ismail: false,
    };
  },
  methods: {
    success(nodesc, json) {
      this.$Notice.success({
        title: json,
        desc: nodesc ? "" : "請重新登入，將會在0.5秒後跳轉",
      });
    },
    warning(nodesc, w) {
      this.$Notice.warning({
        title: w,
        desc: nodesc ? "" : "",
      });
    },
    sign() {
      const memId = "";
      const birthday = document.getElementById("birthday").value;
      const name = document.getElementById("name").value;
      const email = document.getElementById("email").value;
      const memPsw = document.getElementById("memPsw").value;
      const memPswc = document.getElementById("memPswc").value;
      const phone = document.getElementById("phone").value;
      const addr = document.getElementById("addr").value;
      const emailPattern = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
      const pswPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/;
      const phonePattern = /^09\d{8}$/;

      if (name == "") {
        this.warning(true, "未輸入姓名");
      } else if (birthday == "") {
        this.warning(true, "未輸入生日");
      } else if (email == "") {
        this.warning(true, "未輸入信箱");
      } else if (!emailPattern.test(email)) {
        this.warning(true, "信箱格式錯誤");
      } else if (this.isuse == "false") {
        this.warning(true, "信箱已使用");
      } else if (memPsw == "") {
        this.warning(true, "未輸入密碼");
      } else if (!pswPattern.test(memPsw)) {
        this.warning(true, `至少 6 個字元<br>要有大小寫字母<br>至少一個數字`);
      } else if (memPsw != memPswc) {
        this.warning(true, "密碼輸入不同");
      } else if (phone == "") {
        this.warning(true, "未輸入手機");
      } else if (!phonePattern.test(phone)) {
        this.warning(true, "手機格式錯誤");
      } else {
        const formData = new FormData();
        formData.append("memId", memId);
        formData.append("name", name);
        formData.append("birthday", birthday);
        formData.append("email", email);
        formData.append("memPsw", memPsw);
        formData.append("phone", phone);
        formData.append("addr", addr);

        fetch(`${this.$store.state.publicpath}signup.php`, {
          method: "POST",
          body: formData,
        })
          .then((response) => {
            if (response.ok) {
              return response.json();
            } else {
              throw new Error("新增失敗");
            }
          })
          .then((json) => {
            this.success(false, json);
            document.querySelectorAll("input").forEach((inp) => {
              inp.value = "";
              setTimeout(() => {
                document.location.href = `${this.$store.state.imgpublicpath}Home/Login`;
              }, 600);
            });
          })
          .catch((error) => {
            console.log(error.message);
          });
      }
    },
    checkemail() {
      const formData = new URLSearchParams();
      formData.append("email", document.getElementById("email").value);

      fetch(`${this.$store.state.publicpath}emailrespons.php`, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=utf-8",
        },
        body: formData,
      })
        .then((response) => {
          if (response.ok) {
            return response.json();
          } else {
            throw new Error("取得消息失敗"); // 如果請求不成功，拋出錯誤
          }
        })
        .then((json) => {
          this.isuse = json;
        })
        .catch((error) => {
          console.log(error.message);
        });
    },
    checkismail() {
      const email = document.getElementById("email").value;
      const emailPattern = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

      this.ismail = emailPattern.test(email);
    },
  },
  mounted() {
    let emailinput = document.getElementById("email");
    emailinput.addEventListener("change", this.checkemail);
    emailinput.addEventListener("change", this.checkismail);
  },
};
</script>
<style scoped lang="scss">
@include t() {
  .backGroundCard {
    form {
      margin: 30px auto;
    }
  }
}
</style>

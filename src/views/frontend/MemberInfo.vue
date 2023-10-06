<template>
  <div class="bgcGY cardCenter">
    <main>
      <span>{{ mbr_name }}</span>
      <div class="backGroundCard">
        <div class="backGroundCardBtns">
          <router-link :to="a.link" v-for="a in memBtnLink">
            <button :class="[a.name === '會員資料' ? 'pinkBtnLight' : 'pinkBtn']">
              {{ a.name }}
            </button>
          </router-link>
        </div>
        <form>
          <div class="memloginActi" v-for="i in memAllInfo">

            <label :for="`${i.mbr_id}-name`">{{ f['mbr_name'].memTitColumn }}</label>
            <input class="fillInClumn" :key="i.mbr_id" type="text" :id="`${i.mbr_id}-name`" placeholder="NAME"
              :value="i.mbr_name" required />

            <label :for="`${i.mbr_id}-birth`">{{ f['mbr_birth'].memTitColumn }}</label>
            <input class="fillInClumn" type="date" :id="`${i.mbr_birth}-birth`" :value="i.mbr_birth" required />

            <label :for="`${i.mbr_id}-email`">{{ f['mbr_email'].memTitColumn }}</label>
            <input class="fillInClumn" type="text" :id="`${i.mbr_email}-email`" placeholder="email" :value="i.mbr_email"
              required />

            <label :for="`${i.mbr_id}-phone`">{{ f['mbr_phone'].memTitColumn }}</label>
            <input class="fillInClumn" type="text" :id="`${i.mbr_phone}-phone`" placeholder="phone" :value="i.mbr_phone"
              required />

            <label :for="`${i.mbr_id}-address`">{{ f['mbr_addr'].memTitColumn }}</label>
            <input class="fillInClumn" type="text" :id="`${i.mbr_id}-address`" placeholder="addres" :value="i.mbr_addr"
              required />
          </div>
          <!-- <div class="resetPswEmail">
             <a href="#">信箱驗證</a>
           </div> -->
          <div class="memloginSubmit">
            <input type="button" id="btnLogin" class="submitBtn" value="送出" @click="sendUserData" />
            <!-- <input type="button" id="btnCancel" value="取消"> -->
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
      mbr_name: '',
      memAllInfo: [ ],
      /** form data */
      f: {
        /** form data: name */
        mbr_name: {
          memTitColumn: "姓名", type: "text", id: "mbr_id", name: "mbr_id", class: "fillInClumn", placeholder: "姓名"
        },
        mbr_birth: {
          memTitColumn: "生日", type: "date", id: "mbr_birth", name: "mbr_birth", class: "fillInClumn", placeholder: ""
        },
        mbr_email: {
          memTitColumn: "信箱", type: "email", id: "mbr_email", name: "mbr_email", class: "fillInClumn", placeholder: "信箱"
        },
        mbr_phone: {
          memTitColumn: "聯絡電話", type: "text", id: "mbr_phone", name: "mbr_phone", class: "fillInClumn", placeholder: "電話"
        },
        mbr_addr: {
          memTitColumn: "聯絡地址", type: "text", id: "mbr_addr", name: "mbr_addr", class: "fillInClumn", placeholder: "地址"
        },
      },

      memBtnLink: [
        { link: "", name: "會員資料" },
        { link: "/Home/SearchProduct", name: "訂單查詢" },
        { link: "/Home/SearchTicket", name: "票券查詢" },
        { link: "", name: "收藏清單" },
      ],
    };
  },
  methods: {

    getuser() {
      // console.log("getuser");
      fetch("http://localhost/musesmuseum/public/phps/MemberInfo.php")
        .then(response => {
          return response.json();

        })
        .then(result => {
          console.log(result);
          this.mbr_name = result.mbr_name;
          if (Array.isArray(result)) {
            this.memAllInfo = result
          } else {
            alert("無法取得資料");
          }
        })
        .then(() => {
          if (this.mbr_name) {
            let members = JSON.stringify(this);
            document.cookie = "members= " + members + "; expires=Thu, 01 Jan 2025 00:00:00 UTC; path=/";
            // document.location.href = "/Home/MemberInfo";
          } else {
            alert("無法獲取 mbr_name");
          }
        })
    },

  },
  mounted() {
    document.body.style.height = `auto`;
    this.getuser();

    //確認抓取餅乾
    const cookies = document.cookie.split(';');
    let members = null;

    for (let i = 0; i < cookies.length; i++) {
      const cookie = cookies[i].trim();
      console.log(cookie);
      if (cookie.startsWith('members=')) {
        members = decodeURIComponent(cookie.substring('members='.length));

        break;
      }
    }

    if (members) {
      try {
        const memberInfo = JSON.parse(members);
        if (memberInfo.mbr_name && memberInfo.mbr_email) {
          this.mbr_name = memberInfo.mbr_name;
          this.memAllInfo.push(memberInfo);
        } else {
          console.error('Cookie中缺少屬性');
        }
      } catch (error) {
        console.error('解析Cookie數據錯誤', error);
      }
    }

  }
};
</script>
<style scoped lang="scss">
@include t() {
  .backGroundCard {
    height: 100%;
    min-height: 0;

    form {
      margin: 30px auto;

      button {
        margin: 5px;
      }
    }
  }
}</style>
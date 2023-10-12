<template>
  <div>
    <div>
      <div class="admin_editbar">
        <div>
          <PinkButton class="btn_admin" @click="showEditForm('add')" text="新增" />
          <PinkButton class="btn_admin" text="一般" @click="toggleStatus('1')" :disabled="!canToggle('1')" />
          <PinkButton class="btn_admin" text="凍結" @click="toggleStatus('0')" :disabled="!canToggle('0')" />
        </div>
        <Searchbar class="onlyB" />
      </div>
      <div class="dmain">
        <table>
          <tr>
            <th></th>
            <th>會員編號</th>
            <th>姓名</th>
            <th>狀態</th>
            <th></th>
          </tr>
          <tr v-for="(i, index) in members" :key="index">
            <td>
              <input 
              type="checkbox" 
              class="statusinput"
              @change="inchecked(i.mbr_id, $event)"
              > 
              <!-- v-model="i.selected" -->
            </td>
            <td>{{ i.mbr_id }}</td>
            <td>{{ i.mbr_name }}</td>
            <td>
              <p v-if="parseInt(i.statusn) === 1">一般</p>
              <p v-else>凍結</p>
            </td>
            <td>
              <button 
              class="edit" 
              @click="showEditForm('edit', i.mbr_id)"
              >
                編輯
              </button>
            </td>
          </tr>
        </table>
      </div>
      <form 
      action="" 
      class="pop" 
      v-if="showForm" 
      @submit.prevent="submitForm"
      >
        <h2>編輯</h2>
        <div>
          <div>會員編號</div>
          <!-- <div>MM2023061901</div> -->
          <div v-text="members.mbr_id"></div>
        </div>
        <div class="info_col">
          <div>
            <div>會員姓名</div>
            <div>{{ mbr_name }}</div>
          </div>
          <div>
            <div>生日</div>
            <div>{{ mbr_birth }}1</div>
          </div>
        </div>
        <div class="info_col">
          <div>
            <div>E-mail</div>
            <div>{{ mbr_email }}</div>
          </div>
          <div>
            <div>連絡電話</div>
            <div>{{ mbr_phone }}</div>
          </div>
        </div>
        <div>
          <div>通訊地址</div>
          <Addressfrom />
        </div>
        <div>
          <div>會員狀態</div>
          <div>
            <select v-model="members.statusn">
              <option value="1">一般</option>
              <option value="0">部分</option>
            </select>
          </div>
        </div>
        <div class="form_btn">
          <PinkButton class="btn_admin" text="取消" @click="hideEditForm" />
          <PinkButton class="btn_admin" text="儲存" @click="addmember_btn(members.id)"/>
        </div>
      </form>
    </div>

  </div>
</template>

<script>
import PinkButton from "/src/components/PinkButton.vue";
import Searchbar from "/src/components/Searchbar.vue";
import Searchbarclick from "/src/components/Searchbarclick.vue";
import Addressfrom from "/src/views/backend/Address.vue";

export default {
  components: {
  Searchbar,
  Searchbarclick,
  PinkButton,
  Addressfrom
  },
  data() {
    return {
      // news: [],
      mbr_id: "",
      mbr_name: "",
      newsched: [],
      members:[
        {
          id: "",
          email: "",
          name: "",
          birth: "",
          phone:"",
          city: "",
          district: "",
          addr: "",
          statusn: "",
        }
      ],
      
      // test: [
      //   {
      //     id: "MN20230901",
      //     title: "「科技奇觀展」探索未來科...",
      //     statusn: "0",
      //   },
      //   {
      //     id: "MN20231101",
      //     title: "「古文明珍寶展」現已開展...",
      //     statusn: "1",

      //   }
      // ],
      // memt: [
      //   {
      //     id: "MM2023061901",
      //     name: "阿阿阿",
      //     statusn: "1",
      //   }, {
      //     id: "MM2023061902",
      //     name: "欸欸欸",
      //     statusn: "0",
      //   }

      // ],
      showForm: false
    }
  },
  methods: {
    addmember_btn(id) {
      if (id !== undefined) {
        console.log(id)
        const url = `${this.$store.state.publicpath}MemberInfo.php`;
        const formData = new FormData();
        formData.append("id", this.members.id);
        formData.append("name", this.members.name);
        formData.append("email", this.members.email);
        formData.append("birth", this.members.birth);
        formData.append("phone", this.members.phone);
        formData.append("city", this.members.city);
        formData.append("district", this.members.district);
        formData.append("addr", this.members.addr);
        formData.append("statusn", this.members.statusn);
        
        fetch(url, {
          method: "POST",
          body: formData,
        })
          .then((response) => {
            if (response.ok) {
              console.log(response.ok)
              return response.json();
            } else {
              throw new Error("新增失敗");
            }
          })
          .then((json) => {
            alert(json);
            window.location.reload();
          })
          .catch((error) => {
            console.log(error.message);
          });
      } else {
        const url = `${this.$store.state.publicpath}MemberInfo.php`;
        const formData = new FormData();
        formData.append("id", this.members.id);
        formData.append("name", this.members.name);
        formData.append("email", this.members.email);
        formData.append("birth", this.members.birth);
        formData.append("phone", this.members.phone);
        formData.append("city", this.members.city);
        formData.append("district", this.members.district);
        formData.append("addr", this.members.addr);
        formData.append("statusn", this.members.statusn);
        fetch(url, {
          method: "POST",
          body: formData,
        })
        
          .then((response) => {

            if (response) {
              return response.json();
            } else {
              throw new Error("新增失敗");
            }
          })
          .then((json) => {
            alert(json);
            window.location.reload();
          })
          .catch((error) => {
            console.log(error.message);
          });
      }
    },

    deleten(){
      fetch(`${this.$store.state.publicpath}MemberInfo.php`, {
        method: "post",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=utf-8",
        },
        body: JSON.stringify({ data: Object.values(this.newsched) }),
      })
        .then((response) => {
          if (response.ok) {
            return response.json();
          } else {
            throw new Error("新增失敗");
          }
        })
        .then((json) => {
          alert(json);
          window.location.reload();
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    inchecked(id, e) {
      if (e.target.checked) {
        this.newsched.push({ id: id });
        console.log(this.newsched);
        console.log(Object.values(this.newsched));
      } else {
        this.newsched.splice(this.newsched.indexOf(id), 1);
        console.log(this.newsched);
      }
    },
    toggleStatus(newStatus) {
      this.members.forEach(item => {
        if (item.selected) {
          item.statusn = newStatus;
        }
      });
    },
    canToggle(newStatus) {
      return this.members.some(item => item.selected && item.statusn !== newStatus);
    },
    showEditForm(type, id) {
      if (type == "add") {
        console.log(id)
        // this.showForm = false;
        this.members = [
          {
            id: "",
            email: "",
            name: "",
            birth: "",
            phone:"",
            city: "",
            district: "",
            addr: "",
          },
          
        ];
       } else //{
      //   this.showForm = true;
      // }
      if (type == "edit") {
        const url = `http://localhost/musesmuseum/public/phps/memberInfo.php`;
        let headers = {
          "Content-Type": "application/json",
          Accept: "application/json",
        };
        let body = {
          id: id,
        };
        fetch(url, {
          method: "POST",
          headers: headers,
          body: JSON.stringify({ data: body }),
        })
          .then((response) => {
            if (response.ok) {
              return response.json();
            } else {
              throw new Error("取得失敗");
            }
          })
          .then((json) => {
            this.members.id = json.mbr_id;
            this.members.email = json.mbr_email;
            this.members.name = json.mbr_name;
            this.members.birth = json.mbr_birth;
            this.members.phone = json.mbr_phone;
            this.members.city = json.mbr_city;
            this.members.district = json.mbr_district;
            this.members.addr = json.mbr_addr;
            this.status = json.member_status;
          });
      }

      this.showForm = true;
    },
    hideEditForm() {
      this.showForm = false;
    },
    submitForm() {
      this.hideEditForm();
    }

  },
  mounted() {
     //先檢查資料格式是否符合DB規則
    const url = `http://localhost/musesmuseum/public/phps/MemberInfo.php`;
    let headers = {
      "Content-Type": "application/json",
      Accept: "application/json",
    };
    fetch(url, {
      method: "POST",
      headers: headers,
    })
      .then((response) => {
        if (response.ok) {
          return response.json(); // 如果請求成功，解析JSON數據
        } else {
          throw new Error("取得消息失敗"); // 如果請求不成功，拋出錯誤
        }
      })
      .then((json) => {
        this.manager = json;
        // 在成功時顯示提示
        // alert(json.message); // 假設JSON數據中有一個message屬性
      })
      .catch((error) => {
        // 在失敗時顯示提示
        // alert(error.message);
      });

  }
}
</script>

<style scoped lang="scss">
@import "@/assets/sass/style.scss";

div {
  color: #000;

  form {
    height: 80vh;
  }
}

.bTab {
  background-color: #ffffff80;
  border-radius: 10px 10px 0 0;
  border-width: 1px 1px 0 1px;
  border-style: none;
  padding: 8px;
  color: #000;
  transition: .3s;
  cursor: pointer;
}

.admin_editbar {
  display: flex;
  background-color: #f2f2f2;
  padding: 5px;
  border-radius: 10px 10px 0 0;
}

.onlyB {
  position: relative;
  box-shadow: none;
  margin-right: 0;
  width: 190px;
}

.btn_admin {
  margin-right: 10px;
  margin-top: 10px;
  margin-bottom: 10px;
  width: 70px;
  height: 40px;
  background-color: $mblue;
  color: #fff;
  border: none;
  cursor: pointer;
}

.dmain {
  position: relative;
  background-color: #ffffff80;
  height: 80%;
  border-radius: 0 10px 10px 10px;

  table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;

    th,
    td {
      padding: 10px;
      text-align: center;
      border-bottom: 1px solid #ccc;
    }

    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }

    td {
      &:first-child {
        input[type="checkbox"] {
          margin-right: 5px;
        }
      }

      &:last-child {
        button {
          color: #000;
          border: none;
          cursor: pointer;
        }
      }

      p {
        margin: 0;
        padding: 5px;

      }
    }
  }

}

.pop {
  position: absolute;
  top: -1%;
  left: 0;
  width: 100%;
  height: 100%;
  padding: 20px;
  background-color: rgba(255, 248, 248);
  justify-content: center;
  align-items: center;
  z-index: 999;
  border-radius: 10px;
  overflow: auto;


  .info_col {
    display: flex;
    margin-right: 10px;
    margin-bottom: 10px;
    justify-content: space-around;

    div {
      width: 50%;
      margin-top: 10px;
      margin-right: 10px;
      :nth-child(2) {
      text-decoration: underline;
      padding-bottom: 5px;
    }
    }

  }



  .form_btn {
    position: fixed;
    bottom: 0;
    right: 20px;
  }
}
</style>
    


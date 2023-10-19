<template>
  <div>
    <div>
      <div class="admin_editbar">
        <div>
          <!-- <PinkButton class="btn_admin" @click="showEditForm('add')" text="新增" /> -->
          <PinkButton
            class="btn_admin"
            text="凍結"
            @click="updatestatus('1')"
          />
          <PinkButton
            class="btn_admin"
            text="一般"
            @click="updatestatus('0')"
          />
        </div>
        <Searchbar
          class="onlyB"
          :functype="1"
          @update-search-text="searchClick"
        />
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
          <tr v-if="pagenews == 0">
            <td></td>
            <td style="width: 30%; white-space: nowrap">查無資料</td>
          </tr>
          <tr v-for="(i, index) in pagenews" :key="index" v-else>
            <td>
              <input
                type="checkbox"
                class="statusinput"
                @change="inchecked(i.mbr_id, $event)"
              />
            </td>
            <td>{{ i.mbr_id }}</td>
            <td>{{ i.mbr_name }}</td>
            <td>
              <p v-if="parseInt(i.mbr_status) === 1">凍結</p>
              <p v-else>一般</p>
            </td>
            <td>
              <button class="edit" @click="showEditForm('edit', i.mbr_id)">
                編輯
              </button>
            </td>
          </tr>
        </table>
      </div>
      <div class="pagination">
        <button @click="previousPage" :disabled="currentPage === 1">
          上一頁
        </button>
        <button @click="nextPage" :disabled="currentPage === totalPages">
          下一頁
        </button>
      </div>
      <form
        action=""
        class="pop"
        v-show="showForm"
        @submit.prevent="submitForm"
      >
        <h2>編輯</h2>
        <div>
          <div>會員編號</div>
          <div v-text="members.id"></div>
        </div>
        <div class="info_col">
          <div>
            <div>會員姓名</div>
            <div v-text="members.name"></div>
          </div>
          <div>
            <div>生日</div>
            <div v-text="members.birth"></div>
          </div>
        </div>
        <div class="info_col">
          <div>
            <div>E-mail</div>
            <div v-text="members.email"></div>
          </div>
          <div>
            <div>連絡電話</div>
            <div v-text="members.phone"></div>
          </div>
        </div>
        <div>
          <div>通訊地址</div>
          <div
            v-text="members.city + ' ' + members.district + ' ' + members.addr"
          ></div>
        </div>
        <div>
          <div>會員狀態</div>
          <!-- <div v-text="members.statusn"></div> -->
          <div>
            <select v-model="members.statusn">
              <option value="1">凍結</option>
              <option value="0">一般</option>
            </select>
          </div>
        </div>
        <div class="form_btn">
          <PinkButton class="btn_admin" text="取消" @click="hideEditForm" />
          <PinkButton
            class="btn_admin"
            text="儲存"
            @click="addmember_btn(members.id)"
          />
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
    Addressfrom,
  },
  data() {
    return {
      members: [
        {
          id: "",
          email: "",
          name: "",
          birth: "",
          phone: "",
          city: "",
          district: "",
          addr: "",
          statusn: "",
        },
      ],
      newsched: [],
      pageSize: 10,
      currentPage: 1,
      showForm: false,
      searchinput: "",
      // statusn: 0,
    };
  },
  methods: {
    success(nodesc, json) {
      this.$Notice.success({
        title: json,
        desc: nodesc
          ? ""
          : "Here is the notification description. Here is the notification description. ",
      });
    },
    searchClick(text) {
      this.searchinput = text;
    },
    addmember_btn(id) {
      if (id !== undefined) {
        const url = `${this.$store.state.publicpath}Memberm_updateload.php`;
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
              return response.json();
            } else {
              throw new Error("新增失敗");
            }
          })
          .then((json) => {
            this.success(true, json);
            this.fetchme();
          })
          .catch((error) => {
            console.log(error.message);
          });
      } else {
        const url = `${this.$store.state.publicpath}Memberm_updateload.php`;
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
            this.success(true, json);
            this.fetchme();
          })
          .catch((error) => {
            console.log(error.message);
          });
      }
    },
    inchecked(id, e) {
      if (e.target.checked) {
        this.newsched.push({ id: id });
      } else {
        this.newsched.splice(this.newsched.indexOf(id), 1);
      }
    },
    updatestatus(b) {
      this.newsched.splice(0, 0, { type: b });
      fetch(`${this.$store.state.publicpath}Memberm_status.php`, {
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
          this.success(true, json);
          this.fetchme();
          this.newsched = [];
          document.querySelectorAll(".statusinput").forEach((inputb) => {
            inputb.checked = false;
          });
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    previousPage() {
      // 切換到上一頁
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    },
    nextPage() {
      // 切換到下一頁
      if (this.currentPage < this.totalPages) {
        this.currentPage++;
      }
    },
    showEditForm(type, id) {
      if (type == "add") {
        this.members = [
          {
            id: "",
            email: "",
            name: "",
            birth: "",
            phone: "",
            city: "",
            district: "",
            addr: "",
          },
        ];
      } else {
        this.showForm = true;
      }
      if (type == "edit") {
        const url = `${this.$store.state.publicpath}Memberm_list.php`;
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
            this.members.statusn = json.mbr_status;
          });
      }

      this.showForm = true;
    },
    hideEditForm() {
      this.showForm = false;
    },
    submitForm() {
      this.hideEditForm();
    },
    fetchme() {
      const url = `${this.$store.state.publicpath}Memberm.php`;
      let headers = {
        "Content-Type": "application/json",
        Accept: "application/json",
      };
      fetch(url, {
        method: "POST",
        headers: headers,
      })
        .then((response) => {
          return response.json();
        })
        .then((data) => {
          this.members = data;
          let blockw = document.querySelector(".dmain").offsetHeight;
          let roww = document.querySelector("tr").offsetHeight;
          this.pageSize = Math.floor(blockw / roww - 3);
        })
        .catch((error) => {
          // 在失敗時顯示提示
          // alert(error.message);
        });
    },
  },
  watch: {
    searchinput() {
      this.currentPage = 1;
    },
  },
  computed: {
    searchFilter() {
      if (this.searchinput) {
        return this.members.filter(
          (v) =>
            v.mbr_id?.includes(this.searchinput) ||
            v.mbr_name?.includes(this.searchinput)
        );
      } else {
        return this.members;
      }
    },
    pagenews() {
      // 根據當前頁碼和每頁顯示的數據量計算需要顯示的數據
      const start = (this.currentPage - 1) * this.pageSize;
      const end = start + this.pageSize;
      return this.searchFilter.slice(start, end);
    },
    totalPages() {
      // 計算總頁數
      return Math.ceil(this.searchFilter.length / this.pageSize);
    },
  },
  mounted() {
    //先檢查資料格式是否符合DB規則
    this.fetchme();
  },
};
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
  transition: 0.3s;
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
  height: 70vh;
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
.pagination {
  margin-top: 5px;
  text-align: center;
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

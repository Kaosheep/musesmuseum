<template>
    <div>
        <div>
            <div class="admin_editbar">
                <div>
                    <PinkButton class="btn_admin" text="新增" @click="showAddForm" />
                    <PinkButton class="btn_admin" text="上架" @click="toggleStatus('1')" :disabled="!canToggle('1')" />
                    <PinkButton class="btn_admin" text="下架" @click="toggleStatus('0')" :disabled="!canToggle('0')" />
                </div>
                <Searchbar class="onlyB" />
            </div>
            <div class="dmain">
                <table>
                    <tr>
                        <th></th>
                        <th>展覽編號</th>
                        <th>展覽名稱</th>
                        <th>狀態</th>
                        <th></th>
                    </tr>
                    <tr v-for="(exhibition, index) in exhibitions" :key="index">
                        <td><input type="checkbox"></td>
                        <td>{{ exhibition.id }}</td>
                        <td>{{ exhibition.title }}</td>
                        <td>
                            <p v-if="parseInt(exhibition.status) === 1">已上架</p>
                            <p v-else>未上架</p>
                        </td>
                        <td>
                            <button class="edit" @click="showEditForm(exhibition)">編輯</button>
                        </td>
                    </tr>
                </table>
            </div>
            <form action="" class="pop" v-if="showForm" @submit.prevent="submitForm">
                <h2>{{ editMode ? '編輯' : '新增' }}</h2>
                <div>
                    <div>展覽編號</div>
                    <div>{{ editMode ? exhibition.id : '自動生成' }}</div>
                </div>
                <div>
                    <div>標題</div>
                    <div><input type="text" v-model="formData.title" /></div>
                </div>
                <div>
                    <div>內容</div>
                    <textarea v-model="formData.content" cols="30" rows="10"></textarea>
                </div>

                <div class="info_col">
                    <div>
                        <div>展覽期間</div>
                        <div>
                            <iinput type="date" v-model="formData.startDate" /> 至
                            <input type="date" v-model="formData.endDate" />
                        </div>
                    </div>
                    <div>
                        <div>狀態</div>
                        <div>
                            <select v-model="formData.status">
                                <option value="0">未上架</option>
                                <option value="1">已上架</option>
                            </select>
                            <input type="file" id="fileInput" accept="image/*" style="display: none;" />
                            <label class="img_box" for="fileInput">+選擇圖片</label>
                            <div class="img_wrap">
                                <img src="" alt="" id="img1" width="50">
                            </div>
                        </div>
                    </div>
                </div>
           
                <div class="form_btn">
                    <PinkButton class="btn_admin" text="取消" @click="hideForm" />
                    <PinkButton class="btn_admin" text="儲存" type="submit" />
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
            exhibitions: [], // 假設你有一個存放展覽數據的數組
            showForm: false,
            editMode: false,
            formData: {
                title: "",
                content: "",
                startDate: "",
                endDate: "",
                status: "0" // 預設為未上架
            },
            news: [],
            test: [
                {
                    id: "MN20230901",
                    title: "「科技奇觀展」探索未來科...",
                    statusn: "0",
                },
                {
                    id: "MN20231101",
                    title: "「古文明珍寶展」現已開展...",
                    statusn: "1",

                }
            ],
            memt: [
                {
                    id: "MM2023061901",
                    name: "阿阿阿",
                    statusn: "1",
                }, {
                    id: "MM2023061902",
                    name: "欸欸欸",
                    statusn: "0",
                }

            ],
            exhm: [
                {
                    id: "EXH20230901",
                    title: "獨居沙漠，藝術家喬治亞．歐姬芙",
                    statusn: "0",
                },
                {
                    id: "EXH20231101",
                    title: "派對對物：人要金裝，佛要...",
                    statusn: "0",
                },
                {
                    id: "EXH20230701",
                    title: "線條、形狀、空間：建築美......",
                    statusn: "0",
                },
            ],
            showForm: false
        }
    },
    methods: {
        showAddForm() {
            this.editMode = false;
            this.showForm = true;
            this.resetFormData();
        },

        showEditForm(exhibition) {
            this.editMode = true;
            this.showForm = true;
            this.formData = {
                id: exhibition.id,
                title: exhibition.title,
                content: exhibition.content,
                startDate: exhibition.startDate,
                endDate: exhibition.endDate,
                status: exhibition.status
                // 其他欄位
            };
        },

        hideForm() {
            this.showForm = false;
            this.resetFormData();
        },

        resetFormData() {
            this.formData = {
                title: "",
                content: "",
                startDate: "",
                endDate: "",
                status: "0"
                // 其他欄位
            };
        },

        submitForm() {
            // 處理表單提交邏輯，可以根據 editMode 來判斷是新增還是編輯
            // 提交後要更新數據，隱藏表單，並重置表單數據
            if (this.editMode) {
                // 呼叫編輯的 API
            } else {
                // 呼叫新增的 API
            }
            this.hideForm();
        },
        toggleStatus(newStatus) {
            this.test.forEach(item => {
                if (item.selected) {
                    item.statusn = newStatus;
                }
            });
        },
        canToggle(newStatus) {
            return this.test.some(item => item.selected && item.statusn !== newStatus);
        },
        showEditForm() {
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
    div{
        margin-top: 10px;
        textarea {
    width: 100%;
    background-color: #ffffff1b;
    border: 1px solid #009CA8;
    border-radius: 10px;
    resize: none;
    padding-left: 5px;
    padding-right: 5px;

  }
    }

    .info_col {
        display: flex;
        margin-right: 10px;
        margin-bottom: 10px;
        div {
            width: 100%;
            margin-top: 10px;
            margin-right: 10px;
            .img_box{
                padding-left: 5px;
                padding-right: 5px;
                border: 1px solid $mblue;
                margin-left: 30px;
            }
        }
    }



    .form_btn {
        position: fixed;
        bottom: 0;
        left: 20px;
    }
}
</style>
    
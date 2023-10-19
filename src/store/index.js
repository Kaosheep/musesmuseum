import { createStore } from 'vuex'
//中央狀態管理
const publicURL = process.env.NODE_ENV === 'development' ? '' : 'https://tibamef2e.com/chd103/g1/'
const publicpath = process.env.NODE_ENV === 'development' ? 'http://localhost/musesmuseum/public/phps/' : 'https://tibamef2e.com/chd103/g1/phps/'
const imgpublicpath = process.env.NODE_ENV === 'development' ? process.env.BASE_URL : 'https://tibamef2e.com/chd103/g1/'


const getCookie = (cname) => {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

export default createStore({
  //類似vue裡面的data
  state: {
    first: false,
    siteLoading: false,
    apiURL: '',
    publicURL: publicURL,
    publicpath: publicpath,
    imgpublicpath: imgpublicpath,
    test: 'test data',
    mbr_name: '',
    mbr_id: '',
    isLogin: false,
    cartnum: parseInt(localStorage.getItem("cartnum")) || 0,
  },
  getters: {
  },
  mutations: {
    setMbrName(state, newName) {
      state.mbr_name = newName;
    },
    setIsLogin(state, status) {
      state.isLogin = status;
    },
    setcartnum(state, value) {
      state.cartnum = value;
    },
    Loaded(state) {
      if (localStorage["cartnum"]) {
        state.cartnum = parseInt(localStorage.getItem("cartnum"))
      } else {
        localStorage.setItem("cartnum", 0);
      }
    },
  },
  actions: {
    async fetchMbrName({ commit }) {
      const memberCookie = getCookie('members');
      if (!memberCookie) {
        // 沒登入
        commit('setIsLogin', false);
        return;
      }
      const members = JSON.parse(memberCookie);

      commit('setIsLogin', true);
      commit('setMbrName', members.mbr_name);
    },
    async logout({ commit, state }) {//state
      //清除 Cookie
      document.cookie = `members=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=${state.imgpublicpath}Home;`;
      commit('setIsLogin', false);
      commit('setMbrName', ''); 
      localStorage.setItem("cartnum", state.cartnum);//
    },
    async setBeforeUnloadEvent({ commit, state }) {
      window.addEventListener("beforeunload", (e) => {
        localStorage.setItem("cartnum", this.state.cartnum);
      });
    },
    async removeBeforeUnloadEvent() {
      window.removeEventListener("beforeunload");
    },
  },
})

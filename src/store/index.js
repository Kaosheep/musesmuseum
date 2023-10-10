import { createStore } from 'vuex'
//中央狀態管理
const publicURL = process.env.NODE_ENV === 'development' ? '' : 'https://tibamef2e.com/chd103/g1'
const publicpath = process.env.NODE_ENV === 'development' ? 'http://localhost/musesmuseum/public/phps/' : ''
const imgpublicpath = process.env.NODE_ENV === 'development' ? process.env.BASE_URL : ''


const getCookie = (cname) => {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
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
    siteLoading: false,
    apiURL: '', 
    publicURL: publicURL,
    publicpath: publicpath,
    imgpublicpath: imgpublicpath,
    test: 'test data',
    mbr_name: '',
    isLogin: false,
  },
  getters: {
  },
  mutations: {
    setMbrName(state, newName) {
    state.mbr_name = newName;
  },
    setIsLogin(state , status) {
      state.isLogin = status;
    }
  },
  actions: {
    async fetchMbrName({ commit }) {
      const memberCookie = getCookie('members');
      if(!memberCookie ) {
        // 沒登入
        commit('setIsLogin', false);
        return;
      }
      const members = JSON.parse(memberCookie);
      
      commit('setIsLogin', true);
        
      commit('setMbrName', members.mbr_name);
    },
  },
})

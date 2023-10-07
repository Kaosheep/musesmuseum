import { createStore } from 'vuex'
//中央狀態管理
const publicURL = process.env.NODE_ENV === 'development' ? '' : 'https://tibamef2e.com/chd103/g1'
const publicpath = process.env.NODE_ENV === 'development' ? 'http://localhost/musesmuseum/public/phps/' : ''
const imgpublicpath = process.env.NODE_ENV === 'development' ? process.env.BASE_URL : ''


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
  },
  getters: {
  },
  mutations: {
    setMbrName(state, newName) {
      state.mbr_name = newName;
    },
  },
  actions: {
    async fetchMbrName({ commit }) {
      try {
        //  API 獲取 mbr_name 數據
        const response = await fetch("http://localhost/musesmuseum/public/phps/MemberInfo.php");
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        const result = await response.json();
        console.log('mbr_name:', result.mbr_name);
        // 調用 mutation 設置 mbr_name
        commit('setMbrName', result.mbr_name);
      
      } catch (error) {
        console.error('獲取會員訊息失敗' , error );
      }
    },
  },
})

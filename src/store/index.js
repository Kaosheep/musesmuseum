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
  },
  getters: {
  },
  mutations: {
    updateSiteLoad(state, value) {
      state.siteLoading = value
    }
  },
  actions: {
  },
  modules: {
  }
})

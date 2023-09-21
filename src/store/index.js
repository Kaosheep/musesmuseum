import { createStore } from 'vuex'
//中央狀態管理
const publicURL = process.env.NODE_ENV === 'development' ? '' : 'https://tibamef2e.com/chd103/g1'

export default createStore({
  //類似vue裡面的data
  state: {
    siteLoading: false,
    apiURL: '', 
    publicURL: publicURL,
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

import { createStore } from 'vuex'
  //中央狀態管理
export default createStore({
  //類似vue裡面的data
  state: {
    siteLoading:false,
    apiURL:'',
  },
  getters: {
  },
  mutations: {
    updateSiteLoad(state, value){
      state.siteLoading=value
    }
  },
  actions: {
  },
  modules: {
  }
})

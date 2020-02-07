import Vue from "vue";
import Vuex from "vuex";
import App from "./App.vue";
import './assets/css/main.css'
import "./registerServiceWorker";

Vue.config.productionTip = false;

Vue.use(Vuex);

const store = new Vuex.Store({
  state:{
    SRVROOT: "http://127.0.0.1/server_ct/",
  }
})

new Vue({
  store,
  render: h => h(App)
}).$mount("#app");

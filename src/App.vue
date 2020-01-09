<template>
  <div id="app">
    <img alt="Vue logo" src="./assets/logo.png" class="mx-auto"/>
    <p class="text-white">Le Compte-Tout</p>
    <!-- @selectedList listener to make variable available-->
    <Dashboard v-if="onDashboard" @selectedList="goToList"/>
    <Counter v-else/>
  </div>
</template>

<script>
import Counter from "./components/List.vue";
import Dashboard from "./components/Dashboard.vue";
import './assets/css/main.css';

export default {
  name: "app",
  components: {
    Counter,
    Dashboard
  },

  data(){
    return{
      onDashboard: true,
      chosenList: -1,
    }
  },

  methods: {
    //get variable from listener (@selectedList="goToList") and assign to chosenList
    goToList: function(variable) {
      this.chosenList = variable;
      alert(this.chosenList);
      this.onDashboard = false;
    }
  }
};
</script>

<style>
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #272f36;
  margin-top: 60px;
}
</style>

<template>
  <div id="app">
    <img alt="Vue logo" src="./assets/logo.png" class="mx-auto"/>
    <p class="text-white">Le Compte-Tout</p>
    <Login v-if="loggedOut" @user="saveUserInfo"/>
    <!-- @selectedList listener to make variable available-->
    <Dashboard v-else-if="onDashboard" @selectedList="goToList" v-bind:idUser="this.idUser" v-bind:username="this.username"/>
    <Counter v-else v-bind:idList="this.chosenList"/>
  </div>
</template>

<script>
import Counter from "./components/List.vue";
import Dashboard from "./components/Dashboard.vue";
import Login from "./components/Login.vue";
import './assets/css/main.css';

export default {
  name: "app",
  components: {
    Counter,
    Dashboard,
    Login
  },

  data(){
    return{
      onDashboard: true,
      loggedOut: true,
      chosenList: -1,
      idUser: -1,
      username: "",
    }
  },

  methods: {
    //get variable from listener (@selectedList="goToList") and assign to chosenList
    goToList: function(variable) {
      this.chosenList = parseInt(variable, 10);
      alert(this.chosenList);
      this.onDashboard = false;
    },

    saveUserInfo: function(variable) {
      this.username = variable.username;
      this.idUser = parseInt(variable.idUser, 10);
      alert("Welcome " + this.username + " !");
      this.loggedOut = false;
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

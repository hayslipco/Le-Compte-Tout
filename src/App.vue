<template>
  <div id="app">
    <img alt="Vue logo" src="./assets/logo.png" class="mx-auto"/>
    <p class="text-white">Le Compte-Tout</p>
    <div class="text-white flex justify-center self-start" v-if="!loggedOut">
      <p>Connected as: {{username}} <span class="underline text-green-500 cursor-pointer" v-on:click="logout">Logout</span></p>
    </div>
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
      //alert(this.chosenList);
      this.onDashboard = false;
    },

    saveUserInfo: function(variable) {
      this.username = variable.username;
      this.idUser = parseInt(variable.idUser, 10);
      alert("Welcome " + this.username + " !");
      this.loggedOut = false;
    },

    logout: function(){
      this.loggedOut = true;
      this.onDashboard = true;
      this.chosenList = -1;
      this.idUser = -1;
      this.username = "";
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

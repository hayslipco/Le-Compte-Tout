<template>
    <div id="introDiv">
        <div id="loginForm">
            <input id="username" v-model="username" placeholder="username"
            class="border-solid border-2 border-gray-800 text-gray-400 rounded bg-gray-800 h-8 self-center my-2 p-1">
            <br>
            <input id="pwd" v-model="pwd" placeholder="password" type="password"
            class="border-solid border-2 border-gray-800 text-gray-400 rounded bg-gray-800 h-8 self-center my-2 p-1">
            <br>
            <input id="confirmPwd" placeholder="confirm password" type="password"
            class="border-solid border-2 border-gray-800 text-gray-400 rounded bg-gray-800 h-8 self-center my-2 p-1"
            v-if="registering"
            v-model="confirmPwd">
            <br>
            <!-- Login button -->
            <input id="loginButton" 
            v-on:click="submitLogin"
             class="px-4 hover:bg-green-800 rounded ml-2 text-white my-2 w-32 bg-gray-800 border border-black border-solid cursor-pointer"
             type="button"
             value="Login"
             v-if="!registering">
             <!-- Sign up button -->
            <input id="signUpButton" 
            v-on:click="submitRegister"
             class="px-4 hover:bg-green-800 rounded ml-2 text-white my-2 w-32 bg-gray-800 border border-black border-solid cursor-pointer"
             type="button"
             value="Sign up"
             v-else>
             <br>
             <p id="errorMsg" class="text-red-500"></p>
             <br>
             <br>
             <p class="text-white" v-if="!registering">No account but want to count ? <span class="underline text-green-500 cursor-pointer" v-on:click="toggleSignup">Sing up</span></p>
             <p class="text-white" v-else>Got an account to count ? <span class="underline text-green-500 cursor-pointer" v-on:click="toggleSignup">Login</span></p>
        </div>
    </div>
</template>

<style>
    #signInButton{
        cursor:pointer;
    }
</style>

<script>
import axios from "axios";

export default {
    mounted(){
        if(!localStorage.loggedIn){
                document.addEventListener('keypress', (e) => {
                    if (e.keyCode !== 13){
                        return
                }

                e.preventDefault()
                if(this.registering){
                    this.submitRegister();
                } else{
                    this.submitLogin();
                }
            });
        }
    },

    beforeDestroy(){
        document.removeEventListener('keypress', (e) => {
            if (e.keyCode !== 13){
                return
            }

            e.preventDefault()
            if(this.registering){
                this.submitRegister();
            } else{
                this.submitLogin();
            }
        });
    },

    data(){
        return{
            username: "",
            pwd: "",
            confirmPwd: "",
            authenticated: "",
            registered: "",
            registering: false,
            }
    },

    methods: {
        submitLogin: function(){
            this.data = [];
            axios.post(this.$store.state.SRVROOT + "login/", {
                data: {username: this.username, pwd: this.pwd},
                config: {headers: {"Content-Type": "multipart/form-data"}}
            })
            .then(response => {
                this.authenticated = response.data;
                //console.log(this.authenticated);
                this.verifyLoginResponse();
            })
            .catch(function(error) {
                alert("login error" + error);
            });
        },

        submitRegister: function(){
            if(this.username.trim() != ""){
                this.data = [];
                axios.post(this.$store.state.SRVROOT + "register/", {
                    data: {username: this.username, pwd: this.pwd},
                    config: {headers: {"Content-Type": "multipart/form-data"}}
                })
                .then(response => {
                    this.registered = response.data;
                    //console.log(this.registered);
                    this.verifyRegisterResponse();
                })
                .catch(function(error) {
                    alert("login error" + error);
                });
            }
        },

        verifyLoginResponse: function(){
            if(this.authenticated.idUser >= 0){
                this.$emit("user", this.authenticated);
            }else {
                this.pwd = "";
                document.querySelector("#errorMsg").innerHTML = "Bad creds man...";
                document.querySelector("#username").select();
            }
        },

        //response for registered: -1 = existing username, -2 other problem, 201 = Created
        verifyRegisterResponse: function(){
            if(this.registered.registered == 201){
                alert(this.username + " has been successfully registered, happy counting!");
                this.toggleSignup();
                this.username = "";
                this.pwd = "";
                document.querySelector("#errorMsg").innerHTML = this.username + "";
            } else if(this.registered.registered == -1){
                document.querySelector("#errorMsg").innerHTML = this.username + " already exists ¯\\_(ツ)_/¯";
                document.querySelector("#username").select();
            } else{
                document.querySelector("#errorMsg").innerHTML = "yeah something went wrong, please forgive.";
            }
        },

        toggleSignup: function(){
            this.registering = !this.registering;
        }
    }
}
</script>
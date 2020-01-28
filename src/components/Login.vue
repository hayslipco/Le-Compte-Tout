<template>
    <div id="introDiv">
        <div id="loginForm">
            <input id="username" v-model="username" placeholder="username"
            class="border-solid border-2 border-gray-800 text-gray-400 rounded bg-gray-800 h-8 self-center my-2 p-1">
            <br>
            <input id="pwd" v-model="pwd" placeholder="password" type="password"
            class="border-solid border-2 border-gray-800 text-gray-400 rounded bg-gray-800 h-8 self-center my-2 p-1">
            <br>
            <input id="signInButton" 
            v-on:click="submitLogin"
            v-on:keyup.enter="submitLogin"
             class="px-4 hover:bg-green-800 rounded ml-2 text-gray-400 my-2 w-32 bg-gray-800 border border-black border-solid"
             type="button"
             value="Sign in">
             <br>
             <p id="errorMsg" class="text-red-500"></p>
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
    created(){
        window.addEventListener('keypress', (e) => {
            if (e.keyCode !== 13){
                return
            }

            e.preventDefault()
            this.submitLogin();
        });
    },

    destroyed(){
        //window.removeEventListener('keypress', this.submitLogin);
    },

    data(){
        return{
            username: "",
            pwd: "",
            authenticated: false,
        }
    },

    methods: {
        submitLogin: function(){
            this.data = [];
            axios.post("http://127.0.0.1/server_ct/login/", {
                data: {username: this.username, pwd: this.pwd},
                config: {headers: {"Content-Type": "multipart/form-data"}}
            })
            .then(response => {
                this.authenticated = response.data;
                //console.log(this.authenticated);
                this.verifyResponse();
            })
            .catch(function(error) {
                alert("login error" + error);
            });
        },

        verifyResponse: function(){
            if(this.authenticated.idUser >= 0){
                this.$emit("user", this.authenticated);
            } else{
                this.username = "";
                this.pwd = "";
                document.querySelector("#errorMsg").innerHTML = "Bad creds man...";
                document.querySelector("#username").select();
            }
        }
    }
}
</script>
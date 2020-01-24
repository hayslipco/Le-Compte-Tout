<template>
    <div id="introDiv">
        <div id="loginForm">
            <input id="username" v-model="username" placeholder="username"
            class="border-solid border-2 border-gray-800 text-gray-400 rounded bg-gray-800 h-8 self-center my-2 p-1">
            <br>
            <input id="pwd" v-model="pwd" placeholder="password" type="password"
            class="border-solid border-2 border-gray-800 text-gray-400 rounded bg-gray-800 h-8 self-center my-2 p-1">
            <br>
            <button v-on:click="submitLogin"
             class="px-4 hover:bg-green-800 rounded ml-2 text-gray-400 my-2 w-32">Sign in</button>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
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
                this.$emit("authentic", this.authenticated);
                console.log(response.data);
            })
            .catch(function(error) {
                alert("login error" + error);
            });
        },

        verifyResponse: function(){
            
        }
    }
}
</script>
<template>
    <div>
        <ul class="text-white my-10 text-2xl w-64 mx-auto">
            <li v-for="list in allLists"
            :key="list.id"
            class="my-2 border-2 border-white border-solid rounded hover:bg-green-600"
            v-on:click="submit(list.id)"
            >{{list.name}}</li>
            <li class="my-2 border-2 border-gray-500 border-dashed rounded hover:bg-green-600 text-gray-500" v-on:click="addList" v-if="!addingNewList">New list</li>
            <li><input id="newListTxt" type="text" class="my-2 border-2 border-gray-500 border-dashed rounded bg-gray-800 text-white p-2" v-bind="newListName" v-show="addingNewList" ref="newListText"></li>
        </ul>
    </div>
</template>

<style>
    li {cursor: pointer;}
</style>

<script>
import axios from 'axios';


export default {
    created(){
        this.getAllLists();
    },

    data(){
        return{
            SERVER_PATH: "http://127.0.0.1/server_ct/",
            //the data that will be passed to App.vue
            selectedList: -1,
            //the users lists
            allLists: [],
            newListName: "",
            addingNewList: false,
        }
    },

    props: {
        idUser: Number,
        username: String,
    },

    methods: {
        //send clicked list to App.vue
        submit: function(index) {
            this.selectedList = index;
            this.$emit("selectedList", this.selectedList);
        },

        getAllLists: function(){
      
            this.data = [];
            axios.post("http://127.0.0.1/server_ct/getUserLists/", {
                data: {idUser: this.idUser},
                config: {headers: {'Content-Type': 'multipart/form-data' }}
            }).then(response => {

                //console.log(response.data);
                response.data.forEach(row => {
                this.allLists.push({
                        name: row["lisName"],
                        id: row["idList"],
                    }
                );
            });
            }).catch(function(error){
                
                //console.log(error);
                alert("axios error: " + error)

            });
        },

        addList: function(){
            this.addingNewList = !this.addingNewList;
            this.$refs.newListText.focus();
        },

        newList: function(){

            this.data = [];
            axios.post(this.SERVER_PATH + "newList/", {
                data: {listName: this.listName, idUser: this.idUser},
                config: {headers: {'Content-Type': 'multipart/form-data' }}
            }).then(response => {

                if(response.data == 201){
                    alert("list successfully added");
                } else if (response.data == -1){
                    alert("list already exists");
                } else {
                    alert("something went wrong lol");
                }
            }).catch(function(error){
                alert("axios error: " + error);
            })
        }
    }
}
</script>
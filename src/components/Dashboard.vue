<template>
    <div>
        <ul class="text-white my-10 text-2xl w-64 mx-auto">
            <li v-for="list in allLists"
            :key="list.id"
            class="my-2 border-2 border-white border-solid rounded hover:bg-green-600"
            v-on:click="submit(list.id)"
            >{{list.name}}</li>
            <li class="my-2 border-2 border-gray-500 border-dashed rounded hover:bg-green-600 text-gray-500" v-on:click="addList" v-if="!addingNewList">New list</li>
            <li><input id="newListTxt" type="text" class="my-2 border-2 border-gray-500 border-dashed rounded bg-gray-800 text-white px-1" v-model="newListName" v-show="addingNewList"></li>
            <li id="addNewListBtn" class="my border-2 border-gray-500 border rounded bg-gray-800 text-white hover:bg-green-600 w-16 mx-auto text-base" v-show="addingNewList" v-on:click="newList">Add</li>
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

        window.addEventListener('keypress', (e) => {
            if(this.addingNewList){
                if (e.keyCode !== 13){
                    return
                }

            e.preventDefault()
            this.newList();
            }
        });
    },

    beforeDestroy(){
         window.removeEventListener('keypress', (e) => {
            if(this.addingNewList){
                if (e.keyCode !== 13){
                    return
                }

            e.preventDefault()
            this.newList();
            }
        });
    },

    data(){
        return{
            //the data that will be passed to App.vue
            selectedList: -1,
            selectedListName: "",
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
            this.selectedListName = this.allLists.find(list => list.id === index).name;
            //alert(this.selectedListName);
            this.$emit("selectedList", {'id':this.selectedList, 'name':this.selectedListName});
        },

        getAllLists: function(){
    
            this.data = [];
            axios.post(this.$store.state.SRVROOT + "getUserLists/", {
                data: {idUser: this.idUser},
                config: {headers: {'Content-Type': 'multipart/form-data' }}
            }).then(response => {

                //console.log(response.data);
                this.allLists.length = 0;
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
            this.$nextTick(() => {
                document.getElementById("newListTxt").focus();
            })
        },

        updateLists: function(){
            this.addingNewList = !this.addingNewList;
            this.getAllLists();
        },

        newList: function(){
            console.log(this.newListName);
            if(this.newListName != ""){
                this.data = [];
                axios.post(this.$store.state.SRVROOT + "newList/", {
                    data: {listName: this.newListName, idUser: this.idUser},
                    config: {headers: {'Content-Type': 'multipart/form-data' }}
                }).then(response => {
                    console.log(response.data);
                    if(response.data == 201){
                        alert("list successfully added");
                        this.updateLists();
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
}
</script>
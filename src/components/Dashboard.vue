<template>
    <div>
        <ul class="text-white my-10 text-2xl w-64 mx-auto">
            <li v-for="list in allLists"
            :key="list.id"
            class="my-2 border-2 border-white border-solid rounded hover:bg-green-600"
            v-on:click="submit(list.id)"
            >{{list.name}}</li>
            <li class="my-2 border-2 border-gray-500 border-dashed rounded hover:bg-green-600 text-gray-500" v-on:click="submit(-1)">Nouvelle liste</li>
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
            //the data that will be passed to App.vue
            selectedList: -1,
            //the users lists
            allLists: [],
            idUser: 10,
        }
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
    }
}
</script>
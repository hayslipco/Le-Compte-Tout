<template>
  <div id="introDiv" class="text-white">
    <div id="topDiv" class="flex justify-center content-between flex-wrap">
      <input v-model="textBox" class="border-solid border-2 border-gray-800 text-gray-400 rounded bg-gray-800 h-8 self-center" />
      <div>
        <button v-on:click="addToList" class="px-4 hover:bg-green-800 rounded ml-2 text-gray-400 my-2">Add</button>
        <button id="toggleRem" v-on:click="toggleRemove()" class="w-16 h-8 hover:bg-red-600 mx-2 rounded">Remove</button>
      </div>
    </div>

    <div class="container mx-auto px-4 md:max-w-xl">
      <table class="container">
        <tr
          v-for="(memo, index) in memos"
          :key="index"
          class="border-solid border-b-2 border-gray-800"
        >
          <td class="py-4 text-center w-1/2">
            <span>{{ memo.text }} :</span>
          </td>
          <td class="w-8 text-left">
              <span>{{ memo.quant }}</span>
          </td>
          <transition name="transb" mode="out-in">
            <td v-if="!removal" key="countTd" class="text-right text-gray-400">
              <div key="plusMinus">
                <button
                  key="plus"
                  v-on:click="addOne(index)"
                  class="w-8 h-8 text-xl hover:bg-green-800 mx-2 rounded"
                >+</button>
                <button
                key="minus"
                  v-on:click="removeOne(index)"
                  class="w-8 h-8 text-xl hover:bg-purple-800 mx-2 rounded"
                >-</button>
              </div>
            </td>
            <td v-else  key="removalTd" class="text-right text-gray-400">
              <button key="remove" v-on:click="removeItem(index)" class="w-16 h-8 text-l hover:bg-red-900 mx-2 rounded">Remove</button>
            </td>
          </transition>
        </tr>
      </table>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  created(){
    this.getList();
  },

  data() {
    return {
      textBox: "",
      memos: [],
      removal: false,
    };
  },
  props: {},
  methods: {

    //ajax testing
    getList: function(){
      
      this.data = [];
      axios.get("http://mighty-woodland-68724.herokuapp.com/getList/").then(response => {

        response.data.forEach(row => {
          this.memos.push({
          text: row["lisName"],
          id: row["idList"],
          quant: row["lisNum"]
        });

      });

      }).catch(function(){
        
        //console.log(error);

      });

    },

    updateDB: function(name, quant, mode){
      
      axios.post('http://mighty-woodland-68724.herokuapp.com/update/', {
        data: {name: name, quant: quant, mode: mode},
        config: { headers: {'Content-Type': 'multipart/form-data' }},
      }).then(function(){

        //console.log(response);
      }).catch(function(){

        //console.log(response);
      });


    },

    addToList: function() {
      if (this.textBox.trim().length > 0) {
        this.memos.push({
          text: this.textBox,
          id: this.memos.length,
          quant: 0
        });
        this.updateDB(this.textBox, 0, "insert");

        this.textBox = "";

      }
    },
    removeItem: function(index) {
      this.updateDB(this.memos[index].text, 0, "delete");
      this.memos.splice(index, 1);
    },
    addOne: function(index) {
      this.memos[index].quant++;
      this.updateDB(this.memos[index].text, this.memos[index].quant, "update");
    },

    removeOne: function(index) {
      this.memos[index].quant--;
       this.updateDB(this.memos[index].text, this.memos[index].quant, "update");
    },

    toggleRemove(){
      this.removal = !this.removal;
      let btnMsg = this.removal ? "Count" : "Remove";
      document.querySelector("#toggleRem").innerHTML = btnMsg;
    }
  }
};
</script>
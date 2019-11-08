<template>
  <div id="introDiv" class="text-white">
    <input v-model="textBox" class="border-solid border-2 border-gray-800 text-gray-400 rounded bg-gray-800" />
    <button v-on:click="addToList" class=" px-4 hover:bg-green-800 rounded ml-2 text-gray-400">Add</button>
    <div class="container max-w-md mx-auto">
      <table class="container">
        <tr
          v-for="(memo, index) in memos"
          :key="index"
          class="border-solid border-b-2 border-gray-800"
        >
          <td class="py-4 text-left w-1/2">
            <span>{{ memo.text }} :</span>
          </td>
          <td>
              <span>{{ memo.quant }}</span>
          </td>
          <td class="text-right text-gray-400">
            <button
              v-on:click="addOne(index)"
              class="w-8 h-8 text-xl hover:bg-green-800 mx-2 rounded"
            >+</button>
            <button
              v-on:click="removeOne(index)"
              class="w-8 h-8 text-xl hover:bg-purple-800 mx-2 rounded"
            >-</button>
            <button
              v-on:click="removeItem(index)"
              class="w-16 h-8 hover:bg-red-600 mx-2 rounded"
            >remove</button>
          </td>
        </tr>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      textBox: "",
      memos: []
    };
  },
  props: {},
  methods: {
    addToList: function() {
      if (this.textBox.trim().length > 0) {
        this.memos.push({
          text: this.textBox,
          id: this.memos.length,
          quant: 0
        });
        this.textBox = "";
      }
    },
    removeItem: function(index) {
      this.memos.splice(index, 1);
    },
    addOne: function(index) {
      this.memos[index].quant++;
    },

    removeOne: function(index) {
      this.memos[index].quant--;
    }
  }
};
</script>
<template>
  <div id="introDiv">
    <input v-model="textBox" class="border-solid border-2 border-black" />
    <button v-on:click="addToList" class="border-solid border-2 border-black px-4 hover:bg-gray-500" style="border-left: hidden">Add</button>
    <div class="container max-w-md mx-auto">
      <table class="container">
        <tr
          v-for="(memo, index) in memos"
          :key="index"
          class="border-solid border-b-2 border-black"
        >
          <td class="py-4 text-left w-1/2">
            <span>{{ memo.text }} :</span>
          </td>
          <td>
              <span>{{ memo.quant }}</span>
          </td>
          <td class="text-right">
            <button
              v-on:click="addOne(index)"
              class="border-solid border-2 border-gray-600 w-8 h-8 text-xl hover:bg-gray-500 align-middle mx-2"
            >+</button>
            <button
              v-on:click="removeOne(index)"
              class="border-solid border-2 border-gray-600 w-8 h-8 text-xl hover:bg-gray-500 align-middle mx-2"
            >-</button>
            <button
              v-on:click="removeItem(index)"
              class="border-solid border-2 border-gray-600 w-16 h-8 hover:bg-red-500 align-middle mx-2"
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
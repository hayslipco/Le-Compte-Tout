<template>
    <div>
        <ul class="text-white my-10 text-2xl w-64 mx-auto">
            <li class="my-2 border-2 border-white border-solid rounded hover:bg-green-600" v-on:click="submit(0)">Liste des courses</li>
            <li class="my-2 border-2 border-white border-solid rounded hover:bg-green-600" v-on:click="submit(1)">Partie de scrabble</li>
            <li class="my-2 border-2 border-white border-solid rounded hover:bg-green-600" v-on:click="submit(2)">SHK</li>
            <li class="my-2 border-2 border-gray-500 border-dashed rounded hover:bg-green-600 text-gray-500" v-on:click="submit(2)">Nouvelle liste</li>
        </ul>
    </div>
</template>

<style>
    li {cursor: pointer;}
</style>

<script>
export default {
    data(){
        return{
            //the data that will be passed to App.vue
            selectedList: -1,
        }
    },

    methods: {
        //send clicked list to App.vue
        submit: function(index) {
            this.selectedList = index;
            this.$emit("selectedList", this.selectedList);
        }
    }
}
</script>
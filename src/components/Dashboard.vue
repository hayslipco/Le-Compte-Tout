<template>
    <div>
        <ul class="text-white my-10 text-2xl hover:cursor-wait">
            <li class="my-2" v-on:click="submit(0)">liste des courses</li>
            <li class="my-2" v-on:click="submit(1)">partie de scrabble</li>
            <li class="my-2" v-on:click="submit(2)">SHK</li>
        </ul>
    </div>
</template>

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
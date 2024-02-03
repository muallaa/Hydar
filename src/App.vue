<script >
import { RouterLink, RouterView } from 'vue-router'
import HomeView from './views/HomeView.vue'


export default {
  data(){
    return{
      time:''
    }
  },
  components:{
    HomeView,
  }
}
</script>

<template>
  <RouterView />

</template>

<style scoped>
</style>

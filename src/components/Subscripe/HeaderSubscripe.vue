<script>
import NavLink from '../template/NavLink.vue'
export default {
    name :'HeaderSubscripe',
    components :{
        NavLink
    }
}
</script>

<template>

    <div class="header">
        <div class="container">
            <div class="row">
                <div class=" w-100  bg-danger text-end text-white">
                    اشتراكات شات
                </div>

               
            <div class="">
                <img src="../../assets/forest.jpg" alt="" class="">
            </div>
            <nav-link></nav-link>

            <div class=" d-flex justify-content-center py-5">
                    <router-link to="/" class=" bg-success">دخول الشات</router-link>
            </div>

            </div>
        </div>
    </div>
</template>

<style scoped>

.row div:nth-child(2){
    padding: 0px;
}
.row div:nth-child(2)  img{
    width: 100%;
    height: 90px;
    
 
}


a{
    background-color:rgb(0, 0, 0);
    padding: 10px;
    padding-left: 5rem;
    padding-right: 5rem;
    color: white;
    text-decoration: none;
    border-radius: 10px;
    
}


</style>
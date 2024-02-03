<script>
import axios from 'axios'
import io from 'socket.io-client'
import NavLink from '@/components/template/NavLink.vue'
import {inject} from 'vue'

export default {

    name : 'HeaderHome',

    data(){
        return{
            socket : io('http://localhost:5000'),
            session : inject('session'),
            username_visit:'',
            name_member_reg:'',
            pass_member_reg:'',
            alert_succes : 'visually-hidden',
            alert_danger : 'visually-hidden',
            username_log :'',
            pass_log : '',
            location:'',
            flag:''

        }
    },

    components :{
        NavLink
    },
    methods:{
        reload(){
            window.location.reload();
        },

        enter_vistit(){

            this.get_empty_room()

            const params = new URLSearchParams()
            
            params.append('username' , this.username_visit)
            params.append('id_room' , this.$cookies.get('room').id)

            axios.post('http://localhost:5000/create_visit' , params)
            .then((res)=>{

                
                this.$cookies.set('id_u' , res.data['id'])
                this.$cookies.set('username' , this.username_visit )
                this.$cookies.set('type' , 'visitore')
               
                this.$router.push('/chat')
              
            })
            .catch((err)=>{
                console.log(err)
            })

          
        },

       async reg(){

                
           await this.get_contry()

            const params = new URLSearchParams()
            
            params.append('username' , this.name_member_reg)
            params.append('password' , this.pass_member_reg)
            params.append('location' , this.location)
            params.append('flag' , this.flag)

            const tmp = this
          await  axios.post('http://localhost:5000/create_member' , params)
            .then((res)=>{
                
                console.log(res)
                if(res.data['success'] == true){

                    tmp.alert_succes = ''

                    this.socket.emit("NUM_MEMBER")
                    this.socket.emit("all_member")
                    
                      
                    tmp.login(tmp.name_member_reg , tmp.pass_member_reg)
                 
          
                    
                }else{
                    tmp.alert_danger = ''

                   
                }
                
                
            })
            .catch((err)=>{
                console.log(err)
            })


        },

        login(username , password){

            this.get_empty_room()
            const params = new URLSearchParams()
            
            params.append('username' ,username)
            params.append('password' , password)
            
            params.append('id_room' , this.$cookies.get('room').id)

            const tmp = this

            axios.post('http://localhost:5000/login' , params)
            .then((res)=>{
                
                if(res.data[0]['success'] == true){

                    tmp.alert_succes = ''

                   
                    this.$cookies.set('id_u' , res.data[0]['id_u'].id  )
                    this.$cookies.set('username' , res.data[0]['id_u'].username  )
                    this.$cookies.set('type' , 'member')
                  

                    
                    setTimeout(()=>{
                        this.$router.push('/chat')
                    } , 1000)
                    
                }else{
                    tmp.alert_danger = ''
                    
                }
                
                
            })
            .catch((err)=>{
                console.log(err)
            })
        },

    async  get_contry(){

        const tmp = this

       await fetch('https://api.ipregistry.co/?key=7oxxzx029yb1w65b')
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (payload) {
                     

                        tmp.location = payload.location.country.name

                        tmp.flag = payload.location.country.flag.emojitwo

                        
                        
                        
                    });
      },

      get_empty_room(){

        this.socket.emit("GET_EMPTY_ROOM")

        this.socket.on("CALLBACK_EMPTY_ROOM"  , (data)=>{
            this.$cookies.set('room' , data) 
         
            
        })
      }
      
    },

    mounted(){

       
    }
}
</script>

<template>

<div class="header">
    <div class=" container">

        <div class="alert alert-success alert-dismissible fade show position-absolute" :class="alert_succes" role="alert">
                <strong>تم التسجيل</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="alert alert-danger alert-dismissible fade show position-absolute" :class="alert_danger" role="alert">
                <strong>لم يتم التسجيل</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <div class=" row">

            

            <div class="d-flex justify-content-between bg-dark " style="height:45px;">
                <div class=" align-self-center ">
                    <img src="../../assets/forest.jpg" alt="" style="width: 45px; heihgt:;">

                </div>
                <div class=" align-self-center">
                    <button class=" bi bi-arrow-clockwise bg-success text-white" @click="reload"></button>
                </div>
            </div>

            <div class="">
                <img src="../../assets/forest.jpg" alt="" class="">
            </div>

           <nav-link></nav-link>

            <div class="p-0">
                
                                                <!-- Tabs navs -->
                            <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
                                <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link active"
                                    id="ex3-tab-1"
                                    data-bs-toggle="tab"
                                    data-bs-target="#ex3-tabs-1"
                                
                                    role="tab"
                                    aria-controls="ex3-tabs-1"
                                    aria-selected="true"
                                    >   دخول الزوار</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link"
                                    id="ex3-tab-2"
                                    data-bs-toggle="tab"
                                    data-bs-target="#ex3-tabs-2"
                                    role="tab"
                                    aria-controls="ex3-tabs-2"
                                    aria-selected="false"
                                    > دخول الاعضاء</button
                                >
                                </li>
                                <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link"
                                    id="ex3-tab-3"
                                    data-bs-toggle="tab"
                                    data-bs-target="#ex3-tabs-3"
                                    role="tab"
                                    aria-controls="ex3-tabs-3"
                                    aria-selected="false"
                                    > نسجيل عضوية</button
                                >
                                </li>
                            </ul>
                            <!-- Tabs navs -->
                            
                            <!-- Tabs content -->
                            <div class="tab-content" id="ex2-content">
                                <div
                                class="tab-pane fade show active"
                                id="ex3-tabs-1"
                                role="tabpanel"
                                aria-labelledby="ex3-tab-1"
                                >
                                    <div class=" d-flex mx-5">
                                        <div class="  col-10">
                                            <input type="text" class=" input " name=""  placeholder=" اكتب الاسم المستعار" id="" v-model="username_visit">
                                            
                                        </div>

                                        <button class="btn btn-success " @click="enter_vistit">دخول</button>

                                    </div>
                                </div>
                                <div
                                class="tab-pane fade"
                                id="ex3-tabs-2"
                                role="tabpanel"
                                aria-labelledby="ex3-tab-2"
                                >
                                <div class=" d-flex mx-5">
                                    <div class="">
                                        <input type="text" class=" input my-1 " v-model="username_log" name=""  placeholder="اكتب اسم العضو " id="">
                                        
                            
                                        <input type="text" class=" input my-1" v-model="pass_log" name=""  placeholder="اكتب كلمة المرور " id="">
                                    
                                    </div>
                                    <div class=" d-flex justify-content-center ">
                                        <button class="btn btn-success " @click="login(this.username_log , this.pass_log)">دخول</button>
                                    </div>
                                </div>
                                </div>
                                <div
                                class="tab-pane fade"
                                id="ex3-tabs-3"
                                role="tabpanel"
                                aria-labelledby="ex3-tab-3"
                                >
                                    <div class=" d-flex mx-5">
                                        <div class="">
                                            <input type="text" class=" my-1 input " v-model="name_member_reg" name=""  placeholder="اكتب اسم العضو " id="">
                                        
                                            <input type="text" class=" my-1 input " v-model="pass_member_reg" name=""  placeholder=" اكتب كلمة المرور" id="">
                                        
                                        </div>
                                        <div class=" d-flex justify-content-center my-1">
                                            <button class="btn btn-success " @click="reg">دخول</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Tabs content -->

                    
            </div>

         
        </div>
    </div>
</div>
</template>

<style scoped>

.header{
    background-color: #40404f;
    height: 100%;
    max-height: 100%;
    min-height: 100%;
    margin: 0px;
    padding: 0px;
    overflow: hidden;
}
.container{
    
    height: 100%;
    width: 100%;
    max-width: 390px;
    min-height: 100%;
    background-color: white;
    
    border-left: 5px solid #19184D;
}
.row div:nth-child(1) div:nth-child(1) img{
    width: 50px;
    height: 71.19px;
}

.row div:nth-child(2){
    padding: 0px;
}
.row div:nth-child(2)  img{
    width: 100%;
    height: 90px;
    
 
}

li button{
    font-size: 12px;
}

label{
    font-size: 12px;
}
.btn-success{
    font-size: 12px;
    height: 2rem;
    align-self: center;
}


.input{

}
</style>
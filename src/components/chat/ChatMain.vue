<script>

import axios from 'axios'
import {inject} from 'vue'
import io from 'socket.io-client'
export default {

    name :'ChatMain',

    data(){
        return{
            socket : io('http://localhost:5000'),
            session : inject('session'),
            name:'https://pic1.zhimg.com/v2-5f4e219c7356cf7f2efd5c07a22dd520_720w.jpg?source=172ae18b',
            inp_chat:'',
            message : [],
            flag_user : '',
            country: 'asdasd',
            room_user:'',
            inp_message:'',
            p_message:[]
        }
    },

    methods: {
     async   submetchat(e){


            e.preventDefault();


            
           const x =  this.socket.emit('chat_message',{
                message : this.inp_chat,
                id_u : this.$cookies.get('id_u'),
                username : this.$cookies.get('username'),
                id_room:this.$cookies.get('room'),
                date_message:new Date().getHours()+':'+new Date().getMinutes(),
                type : this.$cookies.get('type')
            })

            

            this.inp_chat = ''


        },

        async submetmessage(id , type){

            this.socket.emit('p_message',{
                message : this.inp_message,
                id:id,
                id_u : this.$cookies.get('id_u'),
                username : this.$cookies.get('username'),
                type_user:this.$cookies.get('type'),
                type :type,
                date_message:new Date().getHours()+':'+new Date().getMinutes()

            })
        },

       async allchat(){
            
            this.socket.on("CALLBACK_P_MESSAGE" , (data) =>{
                this.message.push(data)

                
            })
        },

        logout(){

            const params = new URLSearchParams()
            
            params.append('id_room' ,this.$cookies.get('room').id)
            params.append('id_u' ,this.$cookies.get('id_u'))
            params.append('type' ,this.$cookies.get('type'))
           

            axios.post('http://localhost:5000/logout' , params).then((res)=>{

                
                this.$router.push('/')

            })
           
        },

        choose_room(r){

           
                    if(r.id == this.$cookies.get('room').id){
                        alert('انت موجود في الغرفة')
                    }else if(r.max_number <= r.m_exist){
                        alert('الغرفة ممتلئة')
                    }else{

                        this.socket.emit("UPDATE_NUMBER_ROOM" , {
                            id_room : r.id ,
                            exist : r.m_exist,
                            old_room: this.$cookies.get('room').id
                        })

                    var x =  this.socket.emit('chat_message',{
                        message:0,
                        id_u : this.$cookies.get('id_u'),
                        username : this.$cookies.get('usermname'),
                        id_room:this.$cookies.get('room'),
                        new_room : r
                    })

                    this.$cookies.set('room', r)


                    var x =  this.socket.emit('chat_message',{
                        message:1,
                        id_u : this.$cookies.get('id_u'),
                        username : this.$cookies.get('username'),
                        id_room:this.$cookies.get('room')
                    })


                    }

                    },

                    info_user(id , type){

                     
                        this.socket.emit("INFO_USER" ,{id_u : id , type : type})

                        this.socket.on("CALLBACK_INFO_USER" ,  async(res)=>{
                     
                         
                            this.flag_user = res[0].flag

                          this.country = res[0].location
                            
                
                        })

                        this.socket.emit("USER_ROOM" ,{id_u : id , type : type})

                            this.socket.on("CALLBACK_USER_ROOM" ,  async(res)=>{

                                this.room_user = res[0].name
                                

                            })



                    }
                        

        
    },

    mounted(){
        
        this.allchat()

        const data ={
          //  message:'هذا المستخدم دخل الغرفة ' + this.$cookies.get('room'),
            message:1,
            id_u:this.$cookies.get('id_u'),
            username: this.$cookies.get('username'),
            id_room : this.$cookies.get('room'),
            date_message : new Date().getHours()+':'+new Date().getMinutes()
        }
        this.message.push(data)
        
       
    }
}
</script>

<template>
    <div>
        <div class=" container-fluid  overflow-y-scroll" style=" height:80vh;">
        <div v-for="m in message" :key="message" >
            <div class="row"   v-if="(m.id_room.id == this.$cookies.get('room').id) && (m.message !=0) && (m.message != 1)">

                <div class=" d-flex justify-content-between py-1 ">
                    <div class="d-flex">
                        <div class=" align-self-center ">
                            <img :src="name" alt="" id="img_user" class="" data-bs-toggle="modal" :data-bs-target="'#info_modal'+m.id_u" @click="info_user(m.id_u , this.$cookies.get('type'))"/>
                        </div>

                        <div class=" align-self-center px-2">
                       
                            <p class="  my-1 ">{{m.username}}</p>
                            <p class="">{{ m.message }}</p>

                        </div>
                    </div>
                    <div class=" align-self-center">
                        <p>{{  m.date_message}}</p>
                    </div>
                   <!---model -->
                    <div class=" modal" :id="'info_modal'+m.id_u">
                        <div class=" modal-dialog">
                            <div class=" modal-content">
                                <div class=" modal-header">
                                    <img :src="name" alt="" id="img_header_modal">
                                    <p>{{ m.username }}</p>
                                </div>
                                <div class=" modal-body">
                                    <div>
                                        <img :src="name" alt="" class=" img-fluid">
                                    </div>

                                    <div>
                                        <p class=" text-center">النفس وماتهوى</p>
                                    </div>

                                    <div class=" d-flex justify-content-between">
                                            
                                        <div class="d-flex">
                                            <div> <img :src="flag_user" alt="" class=" img-fluid" width="50"> </div>

                                            <div class=" align-self-center mx-1">
                                           {{ this.country }}
                                            </div>

                                        </div>

                                            <div class=" align-self-center">{{  this.room_user }}</div>
                                    </div>

                                </div>

                                <div class=" modal-footer row">
                                 
                                    <div class=" d-flex justify-content-around">
                                        
                                            <button class=" btn btn-outline-dark bi bi-envelope" data-bs-toggle="modal" :data-bs-target="'#modal_message'+m.id_u"> &nbsp; محادثة خاصة</button>
                                            <button class=" btn btn-outline-warning bi bi-exclamation"> &nbsp; تنبيه</button>
                                            <button class=" btn btn-primary bi bi-like bi bi-heart-fill"> &nbsp; اعجاب</button>
                                            <button class=" btn btn-danger bi bi-ban"> &nbsp; تجاهل</button>
                                     
                                       
                                </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end modal-->
                        <div class="modal" :id="'modal_message'+m.id_u">
                            <div class=" modal-dialog">
                                <div class=" modal-content">
                                    <div class=" modal-header">
                                        
                                        <img :src="name" alt="" id="img_header_modal">
                                        <p>{{ m.username }}</p>
                                    </div>
                                    <div class=" modal-body">
                                        <div class="d-flex">
                                            <div class=" align-self-center ">
                                                <img :src="name" alt="" id="img_user" class="" data-bs-toggle="modal" :data-bs-target="'#info_modal'" @click="info_user(m.id_u , m.type)"/>
                                            </div>
                    
                                            <div class=" align-self-center px-2">
                                           
                                                <p class="  my-1 ">{{m.username}}</p>
                                                <p class="">{{ m.message }}</p>
                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" modal-footer row">
                                        <form class="d-flex" @submit.prevent="submetmessage(m.id_u , m.type)">
                                            <input type="text" class=" form-control" v-model="inp_message">
                                            <button class="btn btn-success" type="submit" >ارسال</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!----->
                </div>
                <hr class="m-0">
               

            


            </div>

            <div v-else-if= "(m.id_room.id == this.$cookies.get('room').id) && (m.message == 0) ">
                <div class=" d-flex justify-content-between py-1 ">
                    <div class="d-flex">
                        <div class=" align-self-center ">
                            <img :src="name" alt="" id="img_user"/>
                        </div>

                        <div class=" align-self-center px-2">
                       
                            <p class="  my-1 ">{{m.username}}</p>
                            <p class=""> <span id="id_room" @click="choose_room(m.new_room)">{{ m.new_room.name }}</span> هذا المستخدم غادر الى الغرفة </p>

                        </div>
                    </div>
                    
                    <div class=" align-self-center text-start">
                        <p>{{  m.date_message}}</p>
                    </div>
                   
                </div>
                <hr class="m-0">
            </div>

            <div v-else-if= "(m.id_room.id == this.$cookies.get('room').id) && (m.message == 1)">
                <div class=" d-flex justify-content-between py-1 ">
                    <div class="d-flex">
                        <div class=" align-self-center ">
                            <img :src="name" alt="" id="img_user"/>
                        </div>

                        <div class=" align-self-center px-2">
                       
                            <p class="  my-1 ">{{m.username}}</p>
                            <p class="">  هذا المستخدم دخل الغرفة </p>

                        </div>
                    </div>
                    
                    <div class=" align-self-center text-start">
                        <p>{{  m.date_message}}</p>
                    </div>
                   
                </div>
                <hr class="m-0">
            </div>

            <div v-else>

            </div>
        </div>

           
        </div>

        <!---->
        <div class=" container-fluid fixed-bottom " >
            <div class="row" style="margin-top: -6rem;">
                <form class="d-flex" @submit.prevent="submetchat">
                    <button class="btn btn-success bi bi-arrow-left mx-3" title="تسجيل خروج" type="button" @click="logout"></button>
                    <input type="text" class=" form-control" v-model="inp_chat">
                    <button class="btn btn-success" type="submit" >ارسال</button>
                </form>
            </div>
        </div>
        <!---->

    </div>
</template>

<style scoped>
#img_user{
    width: 4rem;
    height: 4rem;
}

.d-flex div p{
    font-size: 1rem;
}

.d-flex div p a{
    background-color: rgb(126, 124, 124);
    color: white;
    padding: 4px;
    text-decoration: none;
}

#img_header_modal{
    width:18px;
    height: 18px;
}
</style>
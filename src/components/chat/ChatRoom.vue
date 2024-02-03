<script>
import io from 'socket.io-client'
export default {
    name :'ChatRoom',
    data(){
        return{
                socket : io('http://localhost:5000'),
                rooms:[]
        }
    },

    methods:{

        all_room(){

            this.socket.emit("ALL_ROOMS")

            this.socket.on("callbak_ALL_ROOMS" , (data)=>{
                this.rooms = data 
                
            })
        },

        choose_room(id_room , name_room , max , exist , r){

            if(id_room == this.$cookies.get('room').id){
                alert('انت موجود في الغرفة')
            }else if(max <= exist){
                alert('الغرفة ممتلئة')
            }else{
            
                this.socket.emit("UPDATE_NUMBER_ROOM" , {
                    id_room : id_room ,
                    exist : exist,
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

        }
        
    },

    mounted(){

        this.all_room()
    }
}
</script>

<template>
    <div class="online text-start offcanvas offcanvas-end" tabindex="-1" id="room" aria-labelledby="room">

            <div class=" container-fluid">
                <div class="row  text-white">
                <div class=" h-100 bg-dark rounded rounded-start-1">
                    <div class="row ">
                        <div class=" d-flex justify-content-between">
                           
                            <button class=" btn btn-danger  btn-close"></button>
                           
                            <p>الغرف</p>

                          
                        </div>

                        <div class="px-1 py-2">
                            <input type="text" name="" id="" placeholder="البحث....." class=" form-control">
                        </div>

                        <div class="p-1" v-for="r in rooms" :key="rooms.id" id="rooms" @click="choose_room(r.id , r.name , r.max_number , r.m_exist , r)">
                            <div class=" d-flex justify-content-between py-1 ">
                   
                             

                                <div class="d-flex "> 
                                
                                    <div class=" align-self-center ">
                                        <img src="../../assets/forest.jpg" alt="" id="img_user">
                                    </div>

                                    <div class=" align-self-center px-2">
                                        <p class=""> {{ r.name }}</p>
                                    </div>

                                   

                                    <div class=" align-self-center h-100 bg-danger" id="statue">
                                        
                                    </div>
                                </div>

                                <div class=" align-self-center">
                                 
                                </div>
                    
                             </div>

                <hr class="m-0">
                        </div>


                    </div>
                </div>
                  
                </div>
            </div>

    </div>
</template>

<style scoped>

input{
    background: white;
    color: white;
}

img{
    width: 50px;
    height: 50px;
}

p{
    font-size: 10px;
}


#img_ip{
    width: 20px;
    height: 20px;
}

#rooms:hover{
    background-color: aliceblue;
    color: black;
    cursor: pointer;
}
</style>
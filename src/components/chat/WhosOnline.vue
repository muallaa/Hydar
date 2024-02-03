<script>

import io from 'socket.io-client'
export default {
    name :'WhosOnline',

    data(){
        return{
            socket : io('http://localhost:5000'),
            all_online:[]
        }
    },

    methods:{

            ALL_ONLINE(){

                this.socket.emit("all_member_online" , {
                    room : this.$cookies.get("room")
                })

               

        this.socket.on("callback_all_memebr_online" , async (data)=>{

            console.log("aaaaaaaa")
        var arr = Array()

    for await (var i of data){

        this.socket.emit("INFO_USER" ,{id_u : i['id_u'] , type : i['type']})

        this.socket.on("CALLBACK_INFO_USER" , (data)=>{

            
            arr.push(data[0])
            this.all_online = arr

            console.log(this.all_online)
          
        })

   
       
}
   

})

            }
    },

    mounted(){

            this.ALL_ONLINE()

            console.log("online")
    }
}
</script>

<template>
    <div class="offcanvas offcanvas-end online text-start"  tabindex="-1" id="whosonline" aria-labelledby="whosonline">

            <div class=" container-fluid">
                <div class="row  text-white">
                <div class=" h-100 bg-dark rounded rounded-start-1">
                    <div class="row ">
                        <div class=" d-flex justify-content-between">
                           
                            <button class=" btn btn-danger  btn-close"></button>
                           
                            <p>المتواجدون</p>

                          
                        </div>

                        <div class="px-1 py-2">
                            <input type="text" name="" id="search" placeholder="البحث....." class=" form-control">
                        </div>

                        <div v-for="i in all_online" :key="all_online.id">

                     
                        <div class="p-0">
                            <div class=" d-flex justify-content-between py-1 ">
                   
                                <div class="d-flex ">
                                
                                    <div class=" align-self-center h-100 bg-danger" id="statue">   </div>

                                        <div class=" align-self-center ">
                                            <img src="../../assets/forest.jpg" alt="" id="img_user">
                                        </div>

                                    <div class=" align-self-center px-2">
                                        <p class="  my-1 ">{{i.username}}</p>
                                        <p class="">((عضو جديد))</p>
                                    </div>
                                        
                                 
                                </div>

                                <div class=" align-self-center">
                                    <img :src="i.flag" alt="" id="img_ip">
                                    <p class=" text-center">#444</p>
                                </div>

                             
                    
                             </div>

                <hr class="m-0">
                        </div>

                    </div>

                      
                        <div class=" bg-secondary text-center py-3">
                        المتواجدون في الدردشة
                        </div>
                        
                        <hr>

                        <div class="p-0">
                            <div class=" d-flex justify-content-between py-1 ">
                   
                                <div class=" align-self-center">
                                <img src="../../assets/forest.jpg" alt="" id="img_ip">
                                    <p>#44</p>
                                </div>

                                <div class="d-flex ">
                                

                                    <div class=" align-self-center px-2">
                                        <p class="  my-1 ">Mualla</p>
                                        <p class="">هذا المستخدم انتقل الى <a href="">الفرفة العامة (2)</a></p>
                                    </div>

                                    <div class=" align-self-center ">
                                        <img src="../../assets/forest.jpg" alt="" id="img_user">
                                    </div>

                                    <div class=" align-self-center h-100 bg-danger" id="statue">
                                        
                                    </div>
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

#statue{
    width: 5px;
}

#img_ip{
    width: 20px;
    height: 20px;
}
</style>
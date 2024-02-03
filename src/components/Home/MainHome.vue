<script>
import io from 'socket.io-client'
export default {
    name : 'MainHome',
    data(){
        return{
            socket : io('http://localhost:5000'),
            connect:'flase',
            number_mrmber:'',
            allMemebr : [],
            arr : Array()
        }
    },


    methods:{

        check(){
            var ifConnect = window.navigator.onLine

            if(ifConnect){
                this.connect = true
            }else{
                this.connect = false
            }

        },

      async  n_member(){

                this.socket.emit("NUM_MEMBER")

                this.socket.on("callbacl_num_member" , (data)=>{
                    this.number_mrmber = data
                })

        },

        async all_member(){

             this.socket.emit("all_member")

            this.socket.on("callback_all_memebr" , async (data)=>{

                console.log(data.length)
                   

                for  (var i of data){

                    
                    this.socket.emit("INFO_USER" ,{id_u : i['id_u'] , type : i['type']})
 
            }

            this.socket.on("CALLBACK_INFO_USER" ,  async(res)=>{
                     
                 
                     this.arr.push(res[0])
                
                 })

                
               

            })

           

            
        }

    },
    mounted(){
        // check online
        window.addEventListener('online', this.check)
        window.addEventListener('offline', this.check)
       

      
        // end check online

        //num memeber
        this.n_member()
        //end nm memeber

        this.all_member()
    }
}
</script>

<template>

    <div class="main">
        <div class="container">
            <div class="row pt-2">
                <div class="p-0  d-flex justify-content-between bg-dark">
                    <!---connect internet -->
                    <div class=" py-1 w-25 bg-success text-white text-center"  v-if="connect">متصل</div>
                    <div class=" py-1 w-25 bg-danger text-white text-center" v-else>غير متصل</div>
                    <!--- end connect internet-->

                    <!--number memeber connect =-->
                    <div class=" py-1 w-25 bg-success text-white text-center">{{ number_mrmber }}</div>
                    <!---end number memeber connect -->
                    
                </div>

                <div class="px-0 online  overflow-y-scroll">
                <!---all member -->
                    <div class="" v-for="(i, key , index ) in arr" :key="allMemebr.id">
                        <div class="d-flex justify-content-between ">
                        <div class=" d-flex align-self-center">
                            <img src="../../assets/forest.jpg" alt="" id="img_user">
                            <div class="mx-2">
                                <b>{{i.username}}</b>
                                <h6 >(عضو جديد)</h6>
                            </div>
                        </div>
                        <div>
                            <img :src="i.flag" alt="" id="country">
                        </div>
                        </div>
                        <hr class="m-0">
                    </div>
                    <!----->


                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.main{
    background-color: #40404f;
    height: 100%;
    max-height: 100vh;
    min-height: 100%;
    margin: 0px;
    padding: 0px;
    overflow: hidden;
}
.container{
    
    height: 100%;
    width: 100%;
    max-width: 390px;
    min-height: 100vh;
    background-color: white;
    border-left: 5px solid #19184D;
}
    #img_user{
        width: 65px;
        height: 50px;
    }

    #country{
        width: 30px;
        height: 50px;
    }

    .online{
        height: 55vh;
    }
    
    h6{
        font-size: 10px;
        font-weight: 100;
    }

    
</style>
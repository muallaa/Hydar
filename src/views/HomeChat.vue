<script>
import FooterLink from '@/components/template/FooterLink.vue'
import ChatMain from '@/components/chat/ChatMain.vue'
import WhosOnline from '@/components/chat/whosonline.vue'
import MessageChat from '@/components/chat/MessageChat.vue'
import ChatRoom from '@/components/chat/ChatRoom.vue'
export default {
    name : 'HomeChat',
    data(){
        return{
           
        }
    },
    components:{
        FooterLink,
        ChatMain,
        WhosOnline,
        MessageChat,
        ChatRoom
    },
    methods:{

    }

}
</script>

<template>
    <div class="main">
        <ChatMain></ChatMain>
        <FooterLink></FooterLink>
        <WhosOnline></WhosOnline>
        <MessageChat></MessageChat>
        <ChatRoom></ChatRoom>
       
    </div>
</template>

<style scoped>
.main{
    height: 100%;
}
</style>
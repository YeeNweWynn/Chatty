<style>
    .me{
        text-align: right;

    }
    .other{
        text-align: left;
    }
</style>
<template>
    <div class="container">
        <div v-for="chat in chats" v-if="chats.length>0" class="card-body">
            <div v-if="chat.user_id == userid" >
                <p class="me">{{chat.message}}</p>
            </div>
            <div v-else class="other">
                <p class="other">{{chat.message}}</p>
            </div>
        </div>
        <div class="card-footer row">
            <input class="form-control col-md-6" v-model="text" @keyup.enter="sendText">
            <button class="form-control col-md-2" @click="sendText">Send</button>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Chat Component mounted.')
        },
        props:['userid','friendid'],
        data(){
            return {
                chats:[],
                text:'',
            }
        },
        created:function(){
            this.getChat();
        }, 
        methods:{
            getChat(){
                const friendId=$('meta[name="friendId"]').attr('content');
                axios.post('/chat/getChat/'+friendId).
                then(response=>{
                    this.chats=response.data;
                });                
            },
            sendText(){
                axios.post('/chat/postChat', {user_id:this.userid, friend_id:this.friendid, message:this.text}).then(({data}) => {
                    this.chats.push(data);
                    this.text = '';
                });
            }
        }
    }
</script>

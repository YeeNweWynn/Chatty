<style>
    .me,.other{
        display:inline-block;
        background:#e6e6e6;
        color:#000;
        border-radius:20px;
        box-shadow:1px 1px 2px rgba(0,0,0,.3);
        padding:3px 15px;
    }
    .me{
        float:right;
    }
    .other{
        float: left;
    }
    .block{
        width:100%;
        float:left;
    }
</style>
<template>
    <div class="container">
        <div :key="chat.id" v-for="chat in chats" class="block">
            <div v-if="chat.user_id == userid">
                <p class="me">{{chat.message}}</p>
            </div>
            <div v-else>
                <p class="other">{{chat.message}}</p>
            </div>
        </div>
        <div class="card-footer row">
            <input class="form-control col-sm-10" v-model="text" @keyup.enter="sendText">
            <button class="form-control col-sm-2" @click="sendText" style="background:#97ddff;">Send</button>
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
            Echo.channel('chat-'+this.userid+'-'+this.friendid).listen('BroadcastMessage', (e) => {
                this.chats.push(e.chat);
            });

        }, 
        methods:{
            getChat(){
                axios.get('/chat/getChat/'+this.friendid).
                then(response=>{
                    this.chats=response.data;
                });
            },
            sendText(){
                if(this.text !=''){
                    axios.post('/chat/postChat', {friend_id:this.friendid, message:this.text}).then(({data}) => {
                        this.chats.push(data);
                        this.text = '';
                    });
                }
            }
        }
    }
</script>

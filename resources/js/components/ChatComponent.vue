<template>

    <div class="panel box box-primary">
        <div class="box-header with-border">
            <i class="fa fa-comments-o"></i>
            <h4 class="box-title">

                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    Chat
                </a>

            </h4>

            <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                <div class="btn-group" data-toggle="btn-toggle">
                    <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                </div>
            </div>
        </div>
        <div id="collapseOne" class="panel-collapse collapse">
            <div class="box-body" >
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="box">

                        <div class="box-body chat" id="chat-box">
                            <!-- chat item -->
                            <div v-for="message in messages[0]" v-bind:key="message.id">
                                <div class="item" >
                                    <img :src="user1" alt="user image" class="online">

                                    <p class="message">
                                        <a href="#" class="name">
                                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                                            <span style="color:red;" v-if="message.acctouser==1">{{$parent.project.accountant.name}}</span>
                                            <span v-if="message.acctouser==0">{{$parent.project.user.name}}</span>

                                        </a>
                                        {{message.message}}
                                    </p>
                                    <!-- /.attachment -->
                                </div>
                            </div>

                            
                           
                        </div>
                        <!-- /.chat -->
                        <div class="box-footer" v-if="$parent.$parent.userType!=1">
                            <div class="input-group">
                                <input class="form-control" v-model="msgBox" placeholder="Type message...">

                                <div class="input-group-btn">
                                    <button type="button" @click.prevent="sendMessage" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:{

        user1:'',
        user2:'',
        chat:{},

        
        
       
    },
    data(){
        return{
            messages:[],
            user:this.$parent.$parent.user,
            msgBox:'',
            projectid:this.$parent.project.id

        }
    },
    mounted() {
        console.log('Component mounted.');
        console.log('project.'+this.projectid);
        this.getChatMessages();
    },
    methods:{
        getChatMessages(){
            axios.post('/API/getChatMessages',{
                api_token: this.$parent.$parent.user.api_token,
                chatid: this.chat.id
            })
           .then((response) => 
           {
                //this.msgBox = response.data.message;
                //console.log(response.data);
                this.messages.push(response.data);
                //this.projects.push(response.data);
                //console.log(response.data);
                //console.log('project.'+this.projectid);


            })
           .catch(function (error) {
                console.log(error);
           }
           );
        },

        sendMessage(){
            axios.post('/API/sendChatMessages',{
                api_token: this.$parent.$parent.user.api_token,
                chatid: this.chat.id,
                userType:this.$parent.$parent.userType,
                message:this.msgBox,
                projectid:this.projectid


            })
           .then((response) => 
           {
                this.messages[0].push(response.data);
                //console.log(response.data);


            })
           .catch(function (error) {
                console.log(error);
           }
           );
        },

       
    },
    created(){

        
        Echo.join('project.'+this.projectid)
            .listen('MessagePosted',(e)=>{
                //console.log(e.message);
                this.messages[0].push(e.message);
            });
    
    }
}
</script>

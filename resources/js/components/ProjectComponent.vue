<template>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="box-primary">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-th"></i> 

                            {{project.name}}

                            <label v-if="project.status==0"><span class="label label-warning">Pending</span></label>
                            <label v-if="project.status==1"><span class="label label-success">Approved</span></label>
                            <label v-if="project.status==2"><span class="label label-danger">Rejected</span></label>
                            <label v-if="project.status==3"><span class="label label-nfo">Finished</span></label>

                        </h3>
                        <label class="btn btn-primary btn-file btn-xs">
                            Add Files 
                            <input type="file" style="display: none;">

                        </label>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-lg-4 col-xs-6">

                                        <!-- small box -->
                                        <div class="small-box bg-green">
                                            <div class="inner">
                                                <h3>53<sup style="font-size: 20px">%</sup></h3>

                                                <p>Bounce Rate</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-dollar"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">
                                                More info <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-12 col-xs-12">
                                        <dl class="dl-horizontal">
                                            <dt>Project Description</dt>
                                            <dd>{{project.description}}</dd>

                                            <dt>Created At</dt>
                                            <dd>{{project.created_at}}</dd>

                                            <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                                            <dt>Malesuada porta</dt>
                                            <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                                            <dt>Felis euismod semper eget lacinia</dt>
                                            <dd>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo
                                                sit amet risus.
                                            </dd>
                                        </dl>
                                    </div>

                                </div>

                                <file-component v-bind:src="icon" v-for="document in project.documents" v-bind:key="document.id" v-bind:file="document">

                                </file-component>
                                
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-solid">
                                    <div class="box-body">
                                        <div class="box-group" id="accordion">

                                            <chat-component  v-bind:chat="project.ac_chat" v-bind:key="project.ac_chat.id" v-bind:user1="user1" v-bind:user2="user2">
                                                
                                            </chat-component>
                                        </div>
                                    </div>
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
    props:['project'],
    data(){
        return{

            icon:"../../dist/img/png.jpg",
            user1:"../../dist/img/user4-128x128.jpg",
            user2:"../../dist/img/user3-128x128.jpg",
            accountant:this.project.accountant,
            user:this.project.user
            
        }
        
    },
    mounted() {
        console.log('Component mounted.');
        //this.getChatMessages();
    },

    methods:{
        getChatMessages(){
            axios.post('/API/getChatMessages',{
                api_token: this.$parent.user.api_token,
                chatid: this.project.ac_chat.id
            })
           .then((response) => 
           {
                //this.msgBox = response.data.message;
                //console.log(response.data);
                //this.messages.push(response.data);
                //this.projects.push(response.data);
                console.log(response.data);


            })
           .catch(function (error) {
                console.log(error);
           }
           );
        }
    }

}
</script>

@extends('user.layout.auth')

@section('content')
    <div id="app">
        <project-component></project-component>
        <div  class="container" v-for="sets in chats">
            
            <div class="row" v-for="chat in sets">
              
                <div class="col-md-6">
                    <div v-for="properties in chat.chat_messages">
                      
                            <label  :key="properties.id">@{{properties.message}}</label>
                            
                      
                    </div>
                    <input type="text" name="chatmsg" v-model="msgBox">
                    <button name="send" @click.prevent="sendMessage"> send</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts') 
    <script>
        
        const app=new Vue({



            el:'#app',
            data : {
                messages:[],
                msgBox:'',
                user: {!! Auth::check() ? Auth::user()->toJson() : 'null' !!},
                chats:[],

                
            },
            mounted() {
              this.Test();
              //this.testApi();
            },
 
            methods: {
                Test(){
                     axios.get('/user/getmsges')
                           .then((response) => {
                               //this.msgBox = response.data.message;
                               //console.log(response.data);
                               //this.messages.push(response.data);
                               this.chats.push(response.data);
                               //console.log(this.chats);


                           })
                           .catch(function (error) {
                               console.log(error);
                           }
                      );
                },

                sendMessage(){
                      axios.post('/user/postmsges', {
                          api_token: this.user.api_token,
                          message:this.msgBox,
                          chatid: 1
                      })
                      .then((response) => {
                          //this.messages.unshift(response.data);
                          //this.messages = '';

                          console.log(response);
                      })
                      .catch((error) => {
                          console.log(error);
                      })
 
                },

                testApi(){
                      axios.post('/user/chatmessages', {
                          api_token: this.user.api_token,
                          chatid: 1
                      })
                      .then((response) => {
                          //this.messages.unshift(response.data);
                          //this.messages = '';

                          console.log(response);
                          this.messages.push(response.data);
                      })
                      .catch((error) => {
                          console.log(error);
                      })
 
                }



                


             }
        });


    </script>
@endsection

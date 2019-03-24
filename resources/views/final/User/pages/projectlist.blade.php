@extends('final.user.layout.user')

@section('page-heading')
Users
@endsection

@section('page-name')
Blocked Users
@endsection

@section('content')
<div id="app">

  <project-component v-for="project in projects[0]" v-bind:project="project" v-bind:key="project.id">


  </project-component>


    @{{projects}}

</div>
@endsection


@section('scripts') 
<script>

  const app=new Vue({
    el:'#app',
    data: function(){
      return{

        projects:[],
        user: {!! Auth::check() ? Auth::user()->toJson() : 'null' !!},
        userType:{!!$userType!!}
        

      }

    },

    mounted() {
              this.Test();
              //this.testApi();
    },

    methods:{
      Test(){
       axios.post('/API/getuserprojects',{
            api_token: this.user.api_token,
            userid:this.user.id,
            userType:this.userType
       })
       .then((response) => 
       {
          //this.msgBox = response.data.message;
          //console.log(response.data);
          //this.messages.push(response.data);
          this.projects.push(response.data);
          //console.log(this.chats);


        })
       .catch(function (error) {
         console.log(error);
       }
       );
     },
   }
 });


</script>
@endsection

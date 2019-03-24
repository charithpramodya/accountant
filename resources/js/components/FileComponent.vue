<template>
    <div class="box-body chat">

        <div class="item">


            <img :src="src" alt="user image" class="online">
            <a href="#">{{file.filename}}</a>
            


        </div>

    </div>
</template>

<script>
export default {
    props:['file','src'],
    
    mounted() {
        console.log('Component mounted.');
       
    }
}
</script>

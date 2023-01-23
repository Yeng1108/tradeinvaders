<template>
    <div>
        <button class="btn btn-primary ml-4" @click="followUser">Follow</button>
      
    </div>
</template>

<script>
import { assertDeclareTypeAlias } from '@babel/types';
import axios from 'axios';

    export default {

        props: ['userId'],

        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            followUser(){
                axios.post('/follow/'+ this.userId)
                .then(response => {
                    alert(response.data);
                })
            }
        }
    }
</script>

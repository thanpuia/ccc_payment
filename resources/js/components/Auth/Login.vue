<template>
    <div>
        <div class="row">
            <form action="#" @submit.prevent="handleLogin">
                <div class="form-row">
                    <input type="email" v-model="formData.email" placeholder="Email">
                </div>
                <div class="form-row">
                    <input type="password" v-model="formData.password" placeholder="Password">
                </div>
                <div class="form-row">
                    <button type="submit">Sign In</button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            details:{},
            formData: {
                email:'',
                password:'',
            }
        }
    },
    methods: {
        handleLogin() {
            axios.get('/sanctum/csrf-cookie').then(response => {
            axios.post('/api/login', this.formData).then(response => {
            console.log('User signed in!');
        }).catch(error => console.log(error)); // credentials didn't match
    });

        }
    }
}
</script>
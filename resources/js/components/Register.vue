<template>
    <div class="login-page">
        <div class="login">
            <div class="register-container auth-container">

                <div class="register-form-column">
                    <form @submit.prevent="registerAppUser">
                        <h3>Create an Account</h3>
                        <div class="form-wrapper">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" v-model="username"
                                   placeholder="Enter your username" class="form-control" required>
                        </div>

                        <div class="form-wrapper">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" v-model="password"
                                   placeholder="Enter your password" class="form-control" required>
                        </div>

                        <div class="form-wrapper">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   v-model="password_confirmation" placeholder="Re-enter password" class="form-control"
                                   required>
                        </div>
                        <button type="submit">SIGN UP &nbsp;&nbsp;<span v-if="showSpinner"
                                                                        class="fa fa-spin fa-spinner"></span></button>
                    </form>

                    <div class="text-center m-t-50 link-reg">
                        <p @click="redirectToLogin">Do you have an account? <span>Log in</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Register",
        data() {
            return {
                username: '',
                password: '',
                password_confirmation: '',
                showSpinner: false,

            }
        },
        methods: {
            registerAppUser() {
                if (this.username && this.password && this.password_confirmation) {

                    let userData = {
                        username: this.username,
                        password: this.password,
                        password_confirmation: this.password_confirmation
                    };

                    axios.post(`http://localhost:8000/api/register`, userData)
                        .then(({data}) => {
                            console.log(data);
                            // if (data) {
                            //     this.createUserOnCometChat(this.username);
                            // }
                        }).catch(error => {
                        alert(error.response.data.message);
                    })
                }
            },
            redirectToLogin() {
                this.$router.push({name: 'login'})
            },
            async createUserOnCometChat(username) {
                let url = `https://api-eu.cometchat.io/v2.0/users`;
                let data = {
                    uid: username,
                    name: `${username} sample`,
                    avatar: 'https://data-eu.cometchat.io/assets/images/avatars/captainamerica.png',
                };

                try {
                    const userResponse = await fetch(url, {
                        method: 'POST',
                        headers: new Headers({
                            appid: process.env.MIX_COMMETCHAT_APP_ID,
                            apikey: process.env.MIX_COMMETCHAT_API_KEY,
                            'Content-Type': 'application/json'
                        }),
                        body: JSON.stringify(data),
                    });
                    const userJson = await userResponse.json();

                    console.log('New User', userJson);
                    // this.createAuthTokenAndSaveForUser(username);
                    this.redirectToLogin();
                } catch (error) {
                    console.log('Error', error);
                }
            }
        }
    }
</script>

<style scoped>

</style>

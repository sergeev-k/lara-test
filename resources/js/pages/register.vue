<template>
    <div>
        <b-form @submit.prevent="onSubmit" @reset="onReset">
            <b-form-group id="input-group-2" label="Your Name:" label-for="input-2">
                <b-form-input
                    id="input-2"
                    v-model="form.name"
                    required
                    placeholder="Enter name"
                ></b-form-input>
            </b-form-group>

            <b-form-group
                id="input-group-1"
                label="Email address:"
                label-for="input-1">
                <b-form-input
                    id="input-1"
                    v-model="form.email"
                    type="email"
                    required
                    placeholder="Enter email"
                ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-3" label="Password:" label-for="input-3">
                <b-form-input
                    id="input-3"
                    v-model="form.password"
                    required
                    placeholder="Enter password"
                ></b-form-input>
            </b-form-group>

            <b-button type="submit" variant="primary">Submit</b-button>
            <b-button type="reset" variant="danger">Reset</b-button>
        </b-form>
    </div>
</template>

<script>
    export default {
        name: 'Register',
        data() {
            return {
                form: {
                    email: '',
                    name: '',
                    password: ''
                },
            }
        },
        methods: {
            onSubmit() {
                this.$axios.post('/sign_up', this.form).then(res => {
                    if(res.data.data === 'Success'){
                        this.$router.push({name: 'home'})
                    }
                });
            },
            onReset() {
                this.form.email = '';
                this.form.name = '';
                this.form.password = '';

            }
        }
    }
</script>

<style scoped>

</style>

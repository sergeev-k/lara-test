<template>
    <div>
        <b-form @submit="onSubmit" @reset="onReset" v-if="show">
            <b-form-group
                id="input-group-1"
                label="Email address:"
                label-for="input-1"
            >
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
        name: 'Login',
        data() {
            return {
                form: {
                    email: '',
                    password: '',
                },
                show: true
            }
        },
        methods: {
            onSubmit(evt) {
                evt.preventDefault();
                this.$axios.post('/login', this.form).then(user => {
                    if (user.status >= 200 && user.status < 300) {
                        this.$router.push({name: 'home', params: { login: true }})
                    }
                });
            },
            onReset(evt) {
                evt.preventDefault();
                this.form.email = '';
                this.form.password = '';
                // Trick to reset/clear native browser form validation state
                this.show = false;
                this.$nextTick(() => {
                    this.show = true
                })
            }
        }
    }
</script>

<style scoped>

</style>

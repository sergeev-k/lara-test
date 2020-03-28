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

            <b-form-group id="input-group-2" label="Your Name:" label-for="input-2">
                <b-form-input
                    id="input-2"
                    v-model="form.name"
                    required
                    placeholder="Enter name"
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
            <b-form-group id="input-group-4" label="Password confirmation:" label-for="input-4">
                <b-form-input
                    id="input-4"
                    v-model="form.password_confirmation"
                    required
                    placeholder="Enter password confirmation"
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
                    password: '',
                    password_confirmation: '',
                },
                show: true
            }
        },
        methods: {
            onSubmit(evt) {
                evt.preventDefault();

                this.$axios.post('api/register', this.form).then(res => {
                    if(res.status >= 200 && res.status < 300) this.$router.push({name: 'home'})
                });
            },
            onReset(evt) {
                evt.preventDefault();
                this.form.email = '';
                this.form.name = '';
                this.form.password = '';
                this.form.password_confirmation = '';
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

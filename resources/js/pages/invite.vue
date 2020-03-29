<template>
    <div>
        <b-form @submit.prevent="onSubmit">
            <b-form-group
                id="input-group-1"
                label="Email address:"
                label-for="input-1"
            >
                <b-form-input
                    id="input-1"
                    v-model="email"
                    type="email"
                    required
                    placeholder="Enter email"
                ></b-form-input>
            </b-form-group>

            <b-button type="submit" variant="primary">Submit</b-button>
        </b-form>
    </div>
</template>

<script>
    export default {
        name: "invite",
        data() {
            return {
                email: '',
            }
        },
        methods: {
            async onSubmit() {
                try{
                    const response = await this.$axios.post('/invite', {email: this.email});
                    if(response.status === 200) {
                        this.$router.push({ name: 'home' })
                    }
                }catch(e){
                    console.log(e.message);
                }
            },

        }
    }
</script>

<style scoped>

</style>

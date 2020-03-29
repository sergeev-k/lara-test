<template>
    <div>
        <b-form @submit.prevent="onSubmit">
            <b-form-select
                id="users"
                v-model="project"
                size="sm"
                class="w-100 mb-3">
                <option :value="null" selected disabled>Select Project</option>
                <template v-for="project of projects">
                    <option :value="project.id">{{ project.name }}</option>
                </template>
            </b-form-select>

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
        props: ['id'],
        data() {
            return {
                email: '',
                project: null,
                projects: []
            }
        },
        mounted() {
            this.getProjects();
        },
        methods: {
            async onSubmit() {
                try{
                    const response = await this.$axios.post('/invite', {email: this.email, project_id: this.project });
                    if(response.status === 200) {
                        this.$router.push({ name: 'home' })
                    }
                }catch(e){
                    console.log(e.message);
                }
            },
            async getProjects() {
                try {
                    await this.$axios.get('/sanctum/csrf-cookie');
                    const projects = await this.$axios.get('api/v1/projects');
                    this.projects = projects.data.data;
                } catch (e) {
                    this.errorMessage(e);
                }
            },
            errorMessage(message) {
                // Todo: временно
                console.log(message)
            }

        }
    }
</script>

<style scoped>

</style>

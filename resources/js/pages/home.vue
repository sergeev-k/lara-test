<template>
    <div>
        <b-list-group v-if="projects.length">
            <b-list-group-item v-for="(project, i) in projects" :key="i" class="d-flex justify-content-between align-items-center">
                {{ project.name }}
                <b-button variant="primary" @click="subscribe(project.id)" size="sm">Subscribe</b-button>
            </b-list-group-item>
        </b-list-group>

        <p v-else class="text-center">Not Projects</p>
    </div>
</template>

<script>
    export default {
        name: "home",
        data() {
            return {
                projects: [],
                users: [],
            }
        },
        mounted() {
            this.getProjects();
            this.getUsers()
        },
        methods:{
            async getProjects() {
                try{
                    const projects = await this.$axios.get('/projects');
                    this.projects = projects.data.data;
                }catch(e){
                    this.errorMessage(e);
                }
            },
            async getUsers() {
                try{
                    const users = await this.$axios.get('/users');
                    this.users = users.data.data;
                }catch(e){
                    this.errorMessage(e);
                }
            },
            subscribe(id){

            },
            errorMessage(message){
                // Todo: временно
                console.log(message)
            }
        }

    }
</script>

<style scoped>

</style>

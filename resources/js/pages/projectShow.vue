<template>
    <div>
        <div class="text-right">
            <b-button size="sm" variant="outline-info" @click="$router.push({name: 'home'})">All Projects</b-button>
        </div>

        <b-table v-if="project.length" striped hover :items="project" :fields="fields" caption-top>
            <template v-slot:table-caption>Project</template>
        </b-table>
    </div>
</template>

<script>
    export default {
        name: "projectShow",
        data() {
            return {
                project: [],
                fields: ['id', 'name', 'desc'],
            }
        },
        mounted() {
            this.getProject();
        },
        methods: {
            async getProject() {
                try {
                    await this.$axios.get('/sanctum/csrf-cookie');
                    const project = await this.$axios.get(`/api/v1/project/${this.$route.params.id}`);
                    this.project.push(project.data.data);
                } catch (e) {
                    this.errorMessage(e);
                    if(e.response.status === 404){
                        this.$router.push({name: 'home'})
                    }
                }
            },
            errorMessage(message) {
                console.log(message)
            }
        }
    }
</script>

<style scoped>

</style>

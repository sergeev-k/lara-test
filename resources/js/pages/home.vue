<template>
    <b-row>
        <b-list-group class="w-100">
            <b-list-group-item
                v-for="(project, i) in projects"
                :key="i"
                class="d-flex justify-content-between align-items-center w-100">
                {{ i+1 }}.
                <router-link :to="{ path: `project/${project.id}` }" class="flex-grow-1 ml-2">
                    {{ project.name }}
                </router-link>
            </b-list-group-item>
        </b-list-group>

        <div class="w-100 mt-3">
            <b-button variant="primary" @click="$router.push({name: 'invite'})" type="submit">Send Invite User</b-button>
        </div>
    </b-row>
</template>

<script>
    export default {
        name: "home",
        data() {
            return {
                projects: [],
            }
        },
        mounted() {
            this.getProjects();
        },
        methods: {
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

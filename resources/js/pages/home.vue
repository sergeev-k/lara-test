<template>
    <b-row>
        <b-form inline v-if="projects.length" @submit.prevent="getInvite" class="w-100">
            <b-list-group class="w-100">
                <b-list-group-item
                    v-for="(project, i) in projects"
                    :key="i"
                    class="d-flex justify-content-between align-items-center w-100">
                    {{ i+1 }}.
                    <router-link :to="{ path: `project/${project.id}` }" class="flex-grow-1 ml-2">
                        {{ project.name }}
                    </router-link>
                    <b-form-checkbox v-model="selectProject[project.id]" />
                </b-list-group-item>
            </b-list-group>

            <div class="d-flex w-100 mt-3">
                <label class="mr-3 flex-shrink-0" for="users">Select User :</label>
                <b-form-select
                    id="users"
                    v-model="selectedUser"
                    size="sm"
                    class="w-100">
                    <option :value="null" selected disabled>Select User</option>
                    <template v-for="user of users">
                        <option :value="user.id">{{ user.name }}</option>
                    </template>
                </b-form-select>
            </div>

            <div class="w-100 mt-3">
                <b-button variant="primary" type="submit">Send Invite</b-button>
            </div>
        </b-form>
    </b-row>
</template>

<script>
    export default {
        name: "home",
        data() {
            return {
                projects: [],
                users: [],
                selectedUser: null,
                selectProject: [],
                selectedProject: []
            }
        },
        mounted() {
            this.getProjects();
            this.getUsers()
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
            async getUsers() {
                try {
                    const users = await this.$axios.get('/users');
                    this.users = users.data.data;
                } catch (e) {
                    this.errorMessage(e);
                }
            },
            getInvite() {

                this.$router.push({ name: 'invite'});
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

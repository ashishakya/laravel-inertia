<template>
    <layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Leads</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>DOB</th>
                            <th>Package</th>
                            <th>Added On</th>
                            <th>Action</th>
                        </tr>
                        <tr v-for="lead in leads" :key="lead.id">
                            <td v-text="lead.id"></td>
                            <td v-text="lead.name"></td>
                            <td v-text="lead.email"></td>
                            <td v-text="lead.phone"></td>
                            <td v-text="lead.dob"></td>
                            <td v-text="lead.interested_package"></td>
                            <td v-text="lead.created_at"></td>
                            <td>
                                <inertia-link :href="`leads/${lead.id}`">View</inertia-link>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from "../../Shared/Layout";

    export default {
        components: {
            Layout
        },
        props:['leads']
    }
</script>

<style scoped>

</style>

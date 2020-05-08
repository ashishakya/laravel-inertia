<template>
    <layout>
        <div class="container">
            <div class="row" style="display: flex">
                <h1>Braches</h1>
                <div class="ml-auto">
                    <inertia-link :href="$route('branches.create')" class="btn btn-primary">Add Branch</inertia-link>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact (Landline)</th>
                            <th>Contact (Mobile)</th>
                            <th>Contact (Email)</th>
                        </tr>
                        <tr v-for="branch in branches" :key="branch.id">
                            <td v-text="branch.name"></td>
                            <td v-text="branch.address"></td>
                            <td v-text="branch.contact.landline"></td>
                            <td v-text="branch.contact.mobile"></td>
                            <td v-text="branch.contact.email"></td>
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
        props: ['branches']
    }
</script>

<style scoped>

</style>

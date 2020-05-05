<template>
    <layout>
        <div class="container">
            <form @submit.prevent="handleSubmit">
                <div class="row">
                    <div class="col-md-6">
                        <!--                        name-->
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter name"
                                   id="name"
                                   v-model="lead.name"
                                   tabindex="1"
                            >
                        </div>
                        <!--                        phone-->
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="tel"
                                       class="form-control"
                                       placeholder="Enter phone"
                                       id="phone"
                                       v-model="lead.phone"
                                       tabindex="3"
                                >
                            </div>
                            <!--                        interested pa-->
                            <div class="form-group col-md-6">
                                <label for="phone">Interested Package</label>
                                <input type="string"
                                       class="form-control"
                                       placeholder="Enter package"
                                       id="package"
                                       v-model="lead.interested_package"
                                       tabindex="4"
                                >
                            </div>
                        </div>

                    </div>


                    <div class="col-md-6">
                        <!--                        email-->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email"
                                   class="form-control"
                                   placeholder="Enter email"
                                   id="email"
                                   v-model="lead.email"
                                   tabindex="2"
                            >
                        </div>
                        <!--                        dob-->
                        <div class="form-group">
                            <label for="phone">Dob</label>
                            <input type="date"
                                   class="form-control"
                                   placeholder="Enter DOB"
                                   id="dob"
                                   v-model="lead.dob"
                                   tabindex="5"
                            >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-success">Save</button>
                        <inertia-link :href="$route('leads.index')" class="btn btn-warning">Back</inertia-link>
                    </div>
                </div>
            </form>
        </div>
    </layout>
</template>

<script>
    import Layout from "../../Shared/Layout";

    export default {
        data() {
            return {
                lead: {
                    name: '',
                    email: '',
                    phone: '',
                    dob: '',
                    interested_package: ''
                }
            }
        },
        created() {
            this.lead = this.leadDetail;
        },
        components: {
            Layout
        },
        props: {
            leadDetail: {
                type: Object
            }
        },
        methods: {
            handleSubmit() {

            }
        }
    }
</script>

<style scoped>

</style>

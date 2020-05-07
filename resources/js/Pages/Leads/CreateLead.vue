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
                            <div v-if="$page.errors.name">
                                <span v-text="$page.errors.name[0]" class="text-danger"></span>
                            </div>
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
                                <div v-if="$page.errors.phone">
                                    <span v-text="$page.errors.phone[0]" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Interested Package</label>
                                <select
                                       class="form-control"
                                       id="package"
                                       v-model="lead.interested_package"
                                       tabindex="4"
                                >
                                    <option value="">Select a package</option>
                                    <option v-for="packageItem in packages" v-text="packageItem.name"></option>
                                </select>
                                <div v-if="$page.errors.interested_package">
                                    <span v-text="$page.errors.interested_package[0]" class="text-danger"></span>
                                </div>
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
                            <div v-if="$page.errors.email">
                                <span v-text="$page.errors.email[0]" class="text-danger"></span>
                            </div>
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
                            <div v-if="$page.errors.dob">
                                <span v-text="$page.errors.dob[0]" class="text-danger"></span>
                            </div>
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
        props: ['packages'],
        components: {
            Layout
        },
        methods: {
            async handleSubmit() {
                let response = await this.$inertia.post('/leads', this.lead);
            }
        }
    }
</script>

<style scoped>

</style>

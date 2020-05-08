<template>
    <layout>
        <div class="container">
            <div class="card">
                <div class="card-header">Add New Branch</div>
                <div class="card-body">
                    <form @submit.prevent="handleSubmit"
                          @keydown='form.errors.clear($event.target.name)'>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Branch Name</label>
                                    <input name='name' class="form-control" type="text" id="name" v-model="formData.name"/>
                                    <div v-if="form.errors.has('name')">
                                        <span class="text-danger" v-text="form.errors.get('name')"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input name='address' class="form-control" type="text" id="address" v-model="formData.address"/>
                                    <div v-if="form.errors.has('address')">
                                        <span class="text-danger" v-text="form.errors.get('address')"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="landline">Contact (Landline)</label>
                                    <input name='contact.landline' class="form-control" type="tel" id="landline" v-model="formData.contact.landline"/>
                                </div>
                                <div v-if="form.errors.has('contact.landline')">
                                    <span class="text-danger" v-text="form.errors.get('contact.landline')"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mobile">Contact (Mobile)</label>
                                    <input name='contact.mobile' class="form-control" type="tel" id="mobile" v-model="formData.contact.mobile"/>
                                    <div v-if="form.errors.has('contact.mobile')">
                                        <span class="text-danger" v-text="form.errors.get('contact.mobile')"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Contact (Email)</label>
                                    <input name='contact.email' class="form-control" type="email" id="email" v-model="formData.contact.email"/>
                                    <div v-if="form.errors.has('contact.email')">
                                        <span class="text-danger" v-text="form.errors.get('contact.email')"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-success" type="submit">Save</button>
                                <inertia-link :href="$route('branches.index')" class="btn btn-warning">Cancel</inertia-link>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from "../../Shared/Layout";
    import Form from "../../Helpers/Form";

    export default {
        data() {
            return {
                formData: {
                    name: '',
                    address: '',
                    contact: {
                        landline: '',
                        mobile: '',
                        email: '',
                    }
                },
                form: new Form()
            }
        },
        components: {
            Layout
        },
        methods: {
            handleSubmit() {
                let targetRoute = this.$route('branches.store');
                this.form.post(targetRoute, this.formData)
            }
        }
    }
</script>

<style scoped>

</style>

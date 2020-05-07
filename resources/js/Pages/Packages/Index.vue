<template>
    <layout>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Available Packages</div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"
                                    v-for="item in packages"
                                    :key="item.id"
                                    style="display: flex"
                                >
                                    <inertia-link href="#" v-text="item.name"/>
                                    <p class="ml-auto">Rs. {{ item.amount }}/-</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Add Packages</div>
                        <div class="card-body">
                            <form @submit.prevent="handleSubmit">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" v-model="formData.name">
                                    <div v-if="$page.errors.name">
                                        <span class="text-danger" v-text="$page.errors.name[0]"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input id="amount" name="amount" class="form-control" type="number" v-model="formData.amount">
                                    <div v-if="$page.errors.amount">
                                        <span class="text-danger" v-text="$page.errors.amount[0]"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="no_of_days">No of Days</label>
                                    <input id="no_of_days" type='number' name="no_of_days" class="form-control" v-model="formData.no_of_days">
                                    <div v-if="$page.errors.no_of_days">
                                        <span class="text-danger" v-text="$page.errors.no_of_days[0]"></span>
                                    </div>
                                </div>
                                <button class="btn btn-success" type="submit">Save</button>
                                <button class="btn btn-dark" type="reset">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from "../../Shared/Layout";
    import {form} from "../../Helpers/Form";

    export default {
        data() {
            return {
                formData: {
                    name: '',
                    amount: '',
                    no_of_days: ''
                }
            }
        },
        components: {
            Layout
        },
        props: {
            packages: {type: Array}
        },
        methods: {
            handleSubmit() {
                let targetRoute = this.$route('packages.store');
                form.post(targetRoute, this.formData)
                    .then(() => this.resetForm())
                    .catch(() => console.error('Error while storing package.'))
            },
            resetForm() {
                this.formData = {
                    name: '',
                    amount: '',
                    no_of_days: ''
                }
            }
        }
    }
</script>

<style scoped>

</style>

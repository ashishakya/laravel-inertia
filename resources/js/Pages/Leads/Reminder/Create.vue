<template>
    <layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        <inertia-link :href="$route('leads.index')">Leads</inertia-link>
                        <span class="breadcrumb-sep">/</span>
                        <inertia-link :href="$route('leads.show', [lead.id])" v-text="lead.name"></inertia-link>
                        <span class="breadcrumb-sep">/</span>
                        Add Reminder
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Add Reminder</div>
                        <div class="card-body">
                            <form @submit.prevent="handleSubmit">
                                <div class="form-group">
                                    <label for="reminder">Reminder</label>
                                    <textarea name="reminder" id="reminder" class="form-control" cols="30" rows="5" v-model="formData.reminder"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="date">Reminder Date</label>
                                    <input type='date' name="reminder_date" id="date" class="form-control" v-model="formData.reminder_date"/>
                                </div>

                                <button class="btn btn-success" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from "../../../Shared/Layout";

    export default {
        data() {
            return {
                formData:{
                    reminder: '',
                    reminder_date: '',
                }
            }
        },
        components: {
            Layout
        },
        props: {
            lead: {
                type: Object
            }
        },
        methods:{
            handleSubmit(){

            }
        }
    }
</script>

<style scoped>

</style>

<template>
    <layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        <inertia-link :href="$route('leads.index')">Leads</inertia-link>
                        <span class="breadcrumb-sep">/</span>
                        <inertia-link :href="$route('leads.show', [lead.id])">Lead Details</inertia-link>
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
                            <ReminderForm @reminder-submitted="handleSubmit">
                                <inertia-link class="btn btn-warning" :href="$route('leads.show',[lead.id])">Cancel</inertia-link>
                            </ReminderForm>
                            <!--                            <form @submit.prevent="handleSubmit">-->
                            <!--                                <div class="form-group">-->
                            <!--                                    <label for="reminder">Reminder</label>-->
                            <!--                                    <textarea name="reminder" id="reminder" class="form-control" cols="30" rows="5" v-model="formData.reminder"></textarea>-->
                            <!--                                    <div class="error" v-if="$page.errors.reminder">-->
                            <!--                                        <span class="text-danger">{{ $page.errors.reminder[0] }}</span>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->

                            <!--                                <div class="form-group">-->
                            <!--                                    <label for="date">Reminder Date</label>-->
                            <!--                                    <input type='date' name="reminder_date" id="date" class="form-control" v-model="formData.reminder_date"/>-->
                            <!--                                    <div class="error" v-if="$page.errors.reminder_date">-->
                            <!--                                        <span class="text-danger">{{ $page.errors.reminder_date[0] }}</span>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->

                            <!--                                <button class="btn btn-success" type="submit">Save</button>-->
                            <!--                            </form>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from "../../../Shared/Layout";
    import ReminderForm from "./Shared/ReminderForm";

    export default {
        data() {
            return {
                // formData: {
                //     reminder: '',
                //     reminder_date: '',
                // }
            }
        },
        components: {
            Layout,
            ReminderForm
        },
        props: {
            lead: {
                type: Object
            }
        },
        methods: {
            handleSubmit(formData) {
                formData.lead_id = this.lead.id;
                let targetRoute = this.$route('leads.reminders.store', [this.lead.id]);
                this.$inertia.post(targetRoute, formData)
            }
        }
    }
</script>

<style scoped>

</style>

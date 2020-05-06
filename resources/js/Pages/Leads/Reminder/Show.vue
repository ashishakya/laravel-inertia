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
                        Reminder
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Add Reminder</div>
                        <div class="card-body">
                            <ReminderForm :reminderDetail="reminder"
                                          @reminder-submitted="handleSubmit"
                                          @add-new-reminder="handleNewReminder"
                                          @close-reminder="handleCloseReminder"
                            >
                                <inertia-link class="btn btn-warning" :href="$route('leads.show',[lead.id])">Cancel</inertia-link>
                            </ReminderForm>
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
                formData: {
                    reminder: '',
                    reminder_date: '',
                    lead_id: this.lead.id,
                }
            }
        },
        components: {
            Layout,
            ReminderForm
        },
        props: {
            lead: {
                type: Object
            },
            reminder: {
                type: Object
            }
        },
        methods: {
            handleSubmit(formData) {
                let targetRoute = this.$route('leads.reminders.update', [this.lead.id, this.reminder.id]);
                this.$inertia.patch(targetRoute, formData)
            },
            handleNewReminder(reminder){
                console.log('new reminder', reminder)

            },
            handleCloseReminder(reminder){
                console.log('close reminder', reminder)

            }
        }
    }
</script>

<style scoped>

</style>

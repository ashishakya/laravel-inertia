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
                        <inertia-link :href="$route('leads.reminders.show', [lead.id, reminder.id])">Reminder</inertia-link>
                        <span class="breadcrumb-sep">/</span>
                        Add Note
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Add Note</div>
                        <div class="card-body">
                            <form @submit.prevent="handleSubmit">
                                <div class="form-group">
                                    <label for="note"></label>
                                    <textarea name="note" id="note" cols="55" rows="10" v-model="formData.note"></textarea>
                                    <div v-if="$page.errors.note" class="error">
                                        <span class="text-danger" v-text="$page.errors.note[0]"></span>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-success">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from "../../../../Shared/Layout";

    export default {
        data() {
            return {
                formData: {
                    note: '',
                    reminder_id: this.reminder.id
                }
            }
        },
        components: {
            Layout
        },
        props: {
            lead: {type: Object},
            reminder: {type: Object}
        },
        methods: {
            handleSubmit() {
                let targetRoute = this.$route('leads.reminders.close_reminder', [this.lead.id, this.reminder.id])
                this.$inertia.post(targetRoute, this.formData)
            },
        }
    }
</script>

<style scoped>

</style>

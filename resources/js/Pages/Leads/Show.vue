<template>
    <layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        <inertia-link :href="$route('leads.index')">Lead</inertia-link>
                        <span class="breadcrumb-sep">/</span>
                        Lead Details
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Lead Details</div>
                        <div class="card-body">
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
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card" v-if="leadDetail.reminders.length > 0">
                        <div class="card-header">Lead Reminders</div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list-group-item-action"
                                    v-for="reminder in leadDetail.reminders"
                                    :key="reminder.id">
                                    <div class="row">
                                        <div class="col-md-5">{{ reminder.reminder }}</div>
                                        <div class="col-md-2">{{ reminder.reminder_date }}</div>
                                        <div class="col-md-2"><strong>{{ reminder.status }}</strong></div>
                                        <div class="col-md-3">
                                            <inertia-link :href="$route('leads.reminders.show', [leadDetail.id, reminder.id])">View</inertia-link>
                                            <template v-if="reminder.status !== 'Completed'">
                                                |
                                                <inertia-link href="#" @click.prevent="markAsCompleted(reminder)">Mark as completed</inertia-link>
                                            </template>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card" v-else>
                        <div class="card-header">Lead Reminders</div>
                        <div class="card-body">
                            <inertia-link class="btn btn-success" :href="$route('leads.reminders.create', [leadDetail.id])">Add New Reminder</inertia-link>
                        </div>
                    </div>
                </div>
            </div>
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
                    interested_package: '',
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
                let targetRoute = this.$route('leads.update', this.leadDetail.id);
                this.$inertia.patch(targetRoute, this.lead)
            },
            markAsCompleted(reminder) {
                let targetRoute = this.$route('leads.reminders.mark_as_completed', [this.leadDetail.id, reminder.id])
                this.$inertia.post(targetRoute);
            }
        }
    }
</script>

<style scoped>

</style>

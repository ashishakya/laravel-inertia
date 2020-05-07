<template>
    <layout>
        <!--        these are replaced inside slot tag in Layout.vue file-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <ReminderList :reminders="reminders"/>
                </div>
                <div class="col-sm-8">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-package-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Packages</a>
                            <a class="nav-item nav-link" id="nav-recent-leads-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Leads</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-package-tab">
                            <div class="card">
                                <div class="card-header">Available Packages</div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"
                                            v-for="packageItem in packages"
                                            :key="packageItem.id"
                                            style="display: flex"
                                        >
                                            <inertia-link href="#" v-text="packageItem.name"/>
                                            <span class="ml-auto">Rs. {{ packageItem.amount }}/-</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-recent-leads-tab">
                            <div class="card">
                                <div class="card-header">Recent Leads</div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Registered On</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="lead in latestLeads"
                                            :key="lead.id"
                                        >
                                            <td>
                                                <inertia-link :href="$route('leads.show', [lead.id])" v-text="lead.name"/>
                                            </td>
                                            <td v-text="lead.email"></td>
                                            <td v-text="lead.phone"></td>
                                            <td v-text="lead.created_at"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from "../../Shared/Layout";
    import ReminderList from "./Reminder/ReminderList";

    export default {
        props: [
            'reminders',
            'packages',
            'latestLeads'
        ],
        components: {
            Layout,
            ReminderList,

        }
    }
</script>

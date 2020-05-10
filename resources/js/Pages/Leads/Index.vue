<template>
    <layout>
        <div class="container">
            <div class="row" style="display: flex">
                <h1>Leads</h1>
                <div class="ml-auto">
                    <inertia-link :href="$route('leads.create')" class="btn btn-primary">Add Lead</inertia-link>
                </div>
            </div>
            <div class="row" style="display: flex">
                <div class="form-group col-md-2">
                    <span>Show</span>
                    <select name="show" id="show" v-model="queryParams.limit">
                        <option>5</option>
                        <option>10</option>
                        <option>20</option>
                    </select>
                    <span> records</span>
                </div>
                <div class="form-group col-md-3 ml-auto">
                    <input type="search" id="search" class="form-control" placeholder="Search" v-model="queryParams.search">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>DOB</th>
                            <th>Age</th>
                            <th>Package</th>
                            <th>Added On</th>
                            <th>Action</th>
                        </tr>
                        <tr v-for="lead in leads.data" :key="lead.id">
                            <td v-text="lead.name"></td>
                            <td v-text="lead.email"></td>
                            <td v-text="lead.phone"></td>
                            <td v-text="lead.dob"></td>
                            <td v-text="lead.age"></td>
                            <td v-text="lead.interested_package"></td>
                            <td v-text="lead.created_at"></td>
                            <td>
                                <inertia-link :href="$route('leads.show', [lead.id])">View</inertia-link>
                            </td>
                        </tr>
                    </table>
                    <links
                        :urlsArray="paginatedLinks"
                        :previousPageUrl="leads.prev_page_url"
                        :nextPageUrl="leads.next_page_url"
                        v-model="queryParams.page"
                    >
                    </links>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from "../../Shared/Layout";
    import Links from "../Utilities/Links";

    export default {
        data() {
            return {
                queryParams: {
                    search: '',
                    limit: 5,
                    page: ''
                },
                queryExcept: {
                    limit: this.limit || 5,
                    page: 1,
                }
            }
        },
        created() {
            this.queryParams.search = this.initialSearch
        },
        components: {
            Layout,
            Links
        },
        props: ['leads', 'paginatedLinks', 'initialSearch'],
        watch: {
            queryParams: {
                handler() {
                    let filteredQueryParams = this.filterQuery(this.queryParams)
                    let currentUrl = this.$route('leads.index');
                    this.$inertia.replace(currentUrl, {
                        data: filteredQueryParams
                    })
                }, deep: true
            }
        },
        methods: {
            filterQuery(currentQuery) {
                let queryParams = Object.assign({}, currentQuery);
                for (let propName in queryParams) {
                    if (queryParams[propName] === '' || queryParams[propName] === null || queryParams[propName] === undefined) {
                        delete queryParams[propName];
                    }
                }
                
                let exceptQuery = this.queryExcept;
                for(let key in exceptQuery) {
                    if (queryParams[key] == exceptQuery[key]) {
                        delete queryParams[key]
                    }
                }
                return queryParams;
            },
        }
    }
</script>

<style scoped>

</style>

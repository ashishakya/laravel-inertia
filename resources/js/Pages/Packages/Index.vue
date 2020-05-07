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
                            here comes the list
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
        components: {
            Layout
        },
        props: {
            packages: {type: Array}
        }
    }
</script>

<style scoped>

</style>

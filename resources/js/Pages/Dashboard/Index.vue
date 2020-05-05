<template>
    <layout>
<!--        these are replaced inside slot tag in Layout.vue file-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>This is dashboard</p>
                    Hello {{ fname }} {{ lname }}
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from "../../Shared/Layout";

    export default {
        props:['fname', 'lname'],
        components:{
            Layout
        }
    }
</script>

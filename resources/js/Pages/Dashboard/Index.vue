<template>
    <layout>
        <!--        these are replaced inside slot tag in Layout.vue file-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <ReminderList :reminders="reminders"/>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from "../../Shared/Layout";
    import ReminderList from "./Reminder/ReminderList";

    export default {
        props: ['reminders'],
        components: {
            Layout,
            ReminderList
        }
    }
</script>

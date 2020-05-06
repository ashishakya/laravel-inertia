<template>
    <div class="card">
        <div class="card-header">Reminders List for Today</div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"
                    v-for="reminder in reminders"
                    :key="reminder.id"
                >
                    <inertia-link :href="$route('leads.reminders.show', [reminder.lead_id, reminder.id])">
                        <strong v-text="reminder.lead.name"></strong>
                        <br>
                        {{ reminder.reminder }}
                    </inertia-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            reminders: Array
        }
    }
</script>

<style scoped>

</style>

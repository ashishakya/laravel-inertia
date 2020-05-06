<template>
    <div>
        <div class="form-group">
            <label for="reminder">Reminder</label>
            <textarea name="reminder" id="reminder" class="form-control" cols="30" rows="5" v-model="formData.reminder"></textarea>
            <div class="error" v-if="$page.errors.reminder">
                <span class="text-danger">{{ $page.errors.reminder[0] }}</span>
            </div>
        </div>

        <div class="form-group">
            <label for="date">Reminder Date</label>
            <input type='date' name="reminder_date" id="date" class="form-control" v-model="formData.reminder_date"/>
            <div class="error" v-if="$page.errors.reminder_date">
                <span class="text-danger">{{ $page.errors.reminder_date[0] }}</span>
            </div>
        </div>

        <button class="btn btn-success" type="submit" @click="handleSubmit">Save</button>
        <template v-if="reminderDetail">
            <button class="btn btn-outline-danger" @click="handleCloseReminder">Close Reminder</button>
        </template>
        <slot></slot>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                formData: {
                    reminder: '',
                    reminder_date: '',
                }
            }
        },
        props: {
            reminderDetail: {
                type: Object
            }
        },
        created() {
            if (this.reminderDetail) {
                this.formData = this.reminderDetail
            }
        },
        methods: {
            handleSubmit() {
                this.$emit('reminder-submitted', this.formData)
            },
            handleNewReminder() {
                this.$emit('add-new-reminder', this.reminderDetail)
            },
            handleCloseReminder() {
                this.$emit('close-reminder', this.reminderDetail)
            }
        }
    }
</script>

<style scoped>

</style>

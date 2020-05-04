<template>
    <div>
        <p>This is Inertia js dashboard</p>
        <hr>
        <p>Welcome {{ fname }} {{ lname }}</p>
    </div>
</template>

<script>
    export default {
        props:['fname', 'lname']
    }
</script>

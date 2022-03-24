<template>
    <div class="col-md-3">
        <div class="lesson-field" v-for="lesson in lessons" :key="lesson.id">
            <a :href="'/lessons/'+lesson.id">{{lesson.title}}</a>
            <p>Description: {{lesson.desc}}</p>
            <p>Credits: {{lesson.credit_quantity}}</p>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['lessons'],
    }
</script>

<style scoped>
    .lesson-field{
        width: 100%;
        margin-top: 15px;
        margin-bottom: 15px;
    }
</style>
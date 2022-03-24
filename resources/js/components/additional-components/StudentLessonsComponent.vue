<template>
    <div class="col-md-3">
        <div class="lesson-field" v-for="lesson in lessons" :key="lesson.id">
            <p>{{lesson.title}}</p>
            <p>Description: {{lesson.desc}}</p>
            <p>Credits: {{lesson.credit_quantity}}</p>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                lessons: [] 
            }
        },
        props: ['student_id'],
        mounted() {
            this.getLessons();
        },
        methods: {
            getLessons(){
                axios.get('/students/get-lessons/'+this.student_id).then((response) => {
                    console.log(response.data);
                    this.lessons = response.data;
                });
            } 
        }
    }
</script>

<style scoped>
    .lesson-field{
        width: 100%;
        margin-top: 15px;
        margin-bottom: 15px;
    }
</style>
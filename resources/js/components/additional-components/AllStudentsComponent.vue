<template>
    <div class="col-md-3">
        <div class="student-field" v-for="student in students" :key="student.id">
            <a :href="'/students/'+student.id">{{student.first_name}} {{student.last_name}}</a>
            <p>Course: {{student.course}}</p>
            <p>Credit limit: {{student.max_credit_limit}}</p>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                students: [] 
            }
        },
        mounted() {
            this.getStudents();
        },
        methods: {
            getStudents(){
                axios.get('/students/').then((response) => {
                    console.log(response.data);
                    this.students = response.data;
                });
            } 
        }
    }
</script>

<style scoped>
    .student-field{
        width: 100%;
        margin-top: 15px;
        margin-bottom: 15px;
    }
</style>
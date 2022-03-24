<template>
    <div class="container">
        <div class="row justify-content-center">
            <student-form-component type="update" :student="student"></student-form-component>
            <add-lesson-to-student-component :student="student"></add-lesson-to-student-component>
            <students-lessons-component :student_id="student.id"></students-lessons-component>
        </div>
        <a href="/lessons/">Watch lessons data</a>
        <a href="/">Back to students list</a>
        <button @click="deleteStudent">Delete Student</button>
    </div>
</template>

<script>
    import StudentsLessons from './additional-components/StudentLessonsComponent.vue';
    import StudentForm from './additional-components/StudentFormComponent.vue';
    import AddLessonToStudent from './additional-components/AddLessonToStudentComponent.vue';
    export default {
        data(){
        },
        props: ['student'],
        components: {
            'students-lessons-component': StudentsLessons,
            'student-form-component': StudentForm,
            'add-lesson-to-student-component': AddLessonToStudent,
        },
        methods:{
            deleteStudent(){
                axios({
                    method: 'post',
                    url: '/students/delete',
                    params: {
                        id: this.student.id,
                    }
                })
                .then((response) => { 
                    window.location.replace('/');
                }); 
            }
        }
    }
</script>
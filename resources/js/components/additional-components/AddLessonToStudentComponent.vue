<template>
    <div class="col-md-3">
        <p>Choose new lesson</p>
        <p>{{status}}</p>
        <div>
            <select name="" id="" v-model="choosenLesson">
                <option :value="lesson.id" v-for="lesson in lessons" :key="lesson.id">{{lesson.title}}</option>
            </select>
            <button @click="addLessonData">Добавить урок</button>
            <button @click="DeleteLessonData">Удалить урок</button>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                choosenLesson: '',
                lessons: [],
                status: '',
            }
        },
        props: ['student'],
        mounted(){
            this.getAllLessons();
        },
        methods: {
            addLessonData(){
                axios({
                    method: 'post',
                    url: '/students/add-lesson-to-student/',
                    params: {
                        student_id: this.student.id,
                        lesson_id: this.choosenLesson,
                    }
                })
                .then((response) => { 
                    this.status = response.data;
                    location.reload()
                }); 
            },
            DeleteLessonData(){
                axios({
                    method: 'post',
                    url: '/students/delete-students-lesson/',
                    params: {
                        student_id: this.student.id,
                        lesson_id: this.choosenLesson,
                    }
                })
                .then((response) => { 
                    this.status = response.data;
                    location.reload()
                }); 
            },
            getAllLessons(){
                axios.get('/lessons/get-lessons').then((response) => {
                    console.log(response.data);
                    this.lessons = response.data;
                });
            } 
        }
    }
</script>
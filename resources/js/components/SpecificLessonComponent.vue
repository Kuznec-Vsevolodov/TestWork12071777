<template>
    <div class="container">
        <div class="row justify-content-center">
            <lesson-form-component type="update" :lesson="lesson"></lesson-form-component>
        </div>
        <a href="/lessons">Back to lessons list</a>
        <button @click="deleteLesson">Удалить</button>
    </div>
</template>

<script>
    import LessonForm from './additional-components/LessonFormComponent.vue';
    export default {
        data(){
        },
        props: ['lesson'],
        components: {
            'lesson-form-component': LessonForm,
        },
        methods:{
            deleteLesson(){
                axios({
                    method: 'post',
                    url: '/lessons/delete',
                    params: {
                        id: this.lesson.id,
                    }
                })
                .then((response) => { 
                    window.location.replace('/');
                }); 
            }
        }
    }
</script>
<template>
    <div class="container">
        <div class="row justify-content-center">
            <lesson-form-component :type="'create'" lesson=""></lesson-form-component>
            <lessons-list-component :lessons="lessons"></lessons-list-component>
        </div>
        <a href="/">Watch students list</a>
    </div>
</template>

<script>
    import LessonsList from './additional-components/AllLessonsComponent.vue';
    import LessonForm from './additional-components/LessonFormComponent.vue';
    export default {
        props: ['lessons'],
        components: {
            'lessons-list-component': LessonsList,
            'lesson-form-component': LessonForm,
        }
    }
</script>
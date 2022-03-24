<template>
    <div class="container">
        <div class="row justify-content-center">
            <student-form-component :type="'create'" student=""></student-form-component>
            <students-list-component></students-list-component>
        </div>
        <a href="/lessons/">Watch lessons data</a>
    </div>
</template>

<script>
    import StudentsList from './additional-components/AllStudentsComponent.vue';
    import StudentForm from './additional-components/StudentFormComponent.vue';
    export default {
        data(){
        },
        components: {
            'students-list-component': StudentsList,
            'student-form-component': StudentForm,
        }
    }
</script>

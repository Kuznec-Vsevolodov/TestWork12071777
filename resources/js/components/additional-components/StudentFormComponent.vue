<template>
    <div class="col-md-6">
        <p>Student</p>
        <p>{{status}}</p>
        <div>
            <input type="text" v-model="firstName" placeholder="Name">
            <input type="text" v-model="lastName" placeholder="Last name">
            <input type="number" v-model="course" placeholder="Course">
            <input type="number" v-model="maxCreditLimit" placeholder="Credit quantity">
            <button @click="sendCreationData">{{button_text}}</button>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                firstName: '',
                lastName: '',
                course: 1,
                maxCreditLimit: 0,
                status: '',
                url: '',
                button_text: '',
            }
        },
        props: ['type', 'student'],
        mounted(){
            this.formTypeDetermine();
        },
        methods: {
            sendCreationData(){
                axios({
                            method: 'post',
                            url: this.url,
                            params: {
                                first_name: this.firstName,
                                last_name: this.lastName,
                                course: this.course,
                                max_credit_limit: this.maxCreditLimit
                            }
                        })
                        .then((response) => { 
                            this.status = response.data;
                            location.reload()
                        }); 
            },
            formTypeDetermine(){
                if(this.type == 'create'){
                    this.url = '/students/create';
                    this.button_text = 'Add user'
                }else{
                    this.firstName = this.student.first_name;
                    this.lastName = this.student.last_name;
                    this.course = this.student.course;
                    this.maxCreditLimit = this.student.max_credit_limit;
                    this.url = '/students/update/'+this.student.id;
                    this.button_text = 'Update user'
                }
            } 
        }
    }
</script>
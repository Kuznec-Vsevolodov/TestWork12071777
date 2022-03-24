<template>
    <div class="col-md-8">
        <p>Lesson</p>
        <p>{{status}}</p>
        <div>
            <input type="text" v-model="title" placeholder="Title">
            <input type="text" v-model="description" placeholder="Description">
            <input type="number" v-model="credits" placeholder="Credit quantity">
            <button @click="sendCreationData">Send Data</button>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                title: '',
                description: '',
                credits: 1,
                status: '',
                url: '',
            }
        },
        props: ['type', 'lesson'],
        mounted(){
            this.formTypeDetermine();
        },
        methods: {
            sendCreationData(){
                axios({
                            method: 'post',
                            url: this.url,
                            params: {
                                title: this.title,
                                desc: this.description,
                                credit_quantity: this.credits,
                            }
                        })
                        .then((response) => { 
                            this.status = response.data;
                            location.reload();
                        }); 
            },
            formTypeDetermine(){
                if(this.type == 'create'){
                    this.url = '/lessons/create'
                }else{
                    this.title = this.lesson.title;
                    this.description = this.lesson.desc;
                    this.credits = this.lesson.credit_quantity;
                    this.url = '/lessons/update/'+this.lesson.id;
                }
            } 
        }
    }
</script>
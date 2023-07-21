<template>
    <form @submit.prevent="onSubmit" class="d-flex justify-content-center align-items-center mb-4">
        <div class="form-outline flex-fill">
            <input v-model="content" type="text" id="add-todo-input" name="content" class="form-control"/>
        </div>
        <button type="submit" class="btn btn-info ms-2">Add</button>
    </form>
</template>
<script>
export default {
    data(){
        return {
            content: ''
        }
    },
    methods: {
        onSubmit(){
            if(this.content.trim()) {
                const newTodo = {
                    content: this.content,
                }

                this.$emit('add-todo', newTodo);
                this.content = '';
            }
        }
    }
}
</script>
<style></style>
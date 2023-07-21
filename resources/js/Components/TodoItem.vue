<template>
    <li class="list-group-item border-0 d-flex align-items-center ps-0 d-flex justify-content-between">
        <div>
            <input class="form-check-input me-3" type="checkbox" aria-label="..." :checked="todo.completed"
                @change="complete" />
            <span :class="{ done: todo.completed }">{{ todo.content }}</span>
        </div>

        <button class="rm text-right" @click="$emit('remove-todo', todo.id)">&times;</button>
    </li>
</template>

<script>
export default {
    props: {
        todo:{
            type: Object,
            required: true
        }
    },
    methods: {
        complete(){
            this.todo.completed = !this.todo.completed;
            this.$emit('edit-todo', this.todo);
        }
    }
}
</script>

<style scoped>
.rm {
    border-radius: 6px;
    font-weight: bold;
    border: 2px solid #fff;
    background-color: red;
    color: #fff;
}

.done {
    text-decoration: line-through;
}
</style>
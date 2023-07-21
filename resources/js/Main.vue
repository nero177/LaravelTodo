<template>
    <h1>ToDo App</h1>
    <todo-list :todos="todos" @remove-todo="removeTodo" @add-todo="addTodo" @edit-todo="editTodo" />
</template>

<script>
import TodoList from './Components/TodoList.vue';
import axios from 'axios';
const apiUrl = 'http://127.0.0.1:8000/api/todos/';

export default {
    components: {
        TodoList
    },
    data() {
        return {
            todos: []
        }
    },
    mounted() {
        fetch(apiUrl)
            .then(response => response.json())
            .then(json => {
                this.todos = json;
            });
    },
    methods: {
        removeTodo(id) {
            this.todos = this.todos.filter(t => t.id !== id);
            axios.delete(apiUrl + id);
        },
        addTodo(todo) {
            axios.post(apiUrl, { ...todo })
                .then(response => this.todos = [...this.todos, response.data]);
        },
        editTodo(todo) {
            axios.put(apiUrl + todo.id, {...todo});
        }
    }
}
</script>

<style>
h1 {
    text-align: center;
    margin-top: 80px;
}

.wrapper {
    width: 600px;
    height: 500px;
    background-color: rgba(0, 0, 0, 0.6);
    margin: 40px auto;
    border-radius: 20px;
    backdrop-filter: blur(8px);
}
</style>


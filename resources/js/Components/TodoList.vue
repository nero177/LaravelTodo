<template>
  <section class="vh-100">
    <div class="container pt-4">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-8 col-xl-6">
          <div class="card rounded-3">
            <div class="card-body p-4">
              <p class="mb-2"><span class="h2 me-2">Tasks</span></p>

              <add-todo @add-todo="addTodo"/>

              <ul class="list-group rounded-0">
                <todo-item v-for="todo in todos" :todo="todo" @remove-todo="removeTodo" @edit-todo="editTodo"/>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import TodoItem from './TodoItem.vue';
import AddTodo from './AddTodo.vue';

export default {
  components: {
    TodoItem,
    AddTodo
  },
  props: {
    todos: {
      type: Array,
      required: true
    }
  },
  methods: {
    removeTodo(id){
      this.$emit('remove-todo', id);
    },
    addTodo(todo){
      this.$emit('add-todo', todo);
    },
    editTodo(todo){
      this.$emit('edit-todo', todo);
    }
  }
}
</script>
<style></style>
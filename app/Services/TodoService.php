<?php

namespace App\Services;
use App\Models\Todo;

class TodoService
{
    public function index()
    {
        return Todo::all();
    }
    public function store($data)
    {
        $todo = new Todo();
        $todo->content = $data['content'];
        $todo->save();
        return $todo;
    }

    public function destroy($id)
    {
        Todo::destroy($id);
    }

    public function update($data, $id)
    {
        $todo = Todo::findOrFail($id);

        foreach($data as $key => $value){
            $todo->$key = $value;
        }

        $todo->save();
    }
}
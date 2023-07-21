<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;

use App\Services\TodoService;

class TodosController extends Controller
{
    public function index(){
        $todoService = new TodoService();
        $todos = $todoService->index();
        return response()->json($todos);
    }

    public function store(StoreTodoRequest $request){
        $validated = $request->validated();
        $todoService = new TodoService();
        $todo = $todoService->store($validated);

        return response()->json($todo);
    }

    public function destroy($id){
        $todoService = new TodoService();
        $todoService->destroy($id);
        return response(200);
    }

    public function update(StoreTodoRequest $request, $id){
        $todoService = new TodoService();
        $validated = $request->validated();
        $todoService->update($validated, $id);

        return response(200);
    }
}

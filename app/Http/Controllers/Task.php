<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Task extends Controller
{
    public function index()
    {
        //display all tasks paginated and filtered by completion status,priority and category
        $tasks = \App\Models\Task::query();
        if (request()->has('completed')) {
            $tasks->where('completed', request('completed'));
        }
        if (request()->has('priority')) {
            $tasks->where('priority', request('priority'));
        }
        if (request()->has('category')) {
            $tasks->where('categories_id', request('category'));
        }
        //return the tasks as a json response
        return response()->json($tasks->paginate(10));
    }
    public function store(Request $request): JsonResponse
    {
        //validate the request
        $request->validate([
            'categories_id' => 'required|exists:categories,id',
            'priority' => 'required|in:low,medium,high',
            'due_date' => 'date|after:today',
            'title' => 'required|string|unique:tasks',
            'description' => 'min:3|max:50',
            'completed' => 'required|boolean'
        ]);
        //create a new task
        $task = Task::create($request->all());
        //return the task as a json response
        return response()->json($task);
    }
    public function show(Task $task): JsonResponse
    {
        //return the task as a json response
        return response()->json($task);
    }
    public function completed (Task $task): JsonResponse{

        $task->update(['completed' => true]);
        //return the task as a json response
        return response()->json($task);

    }
    public function restore (Task $task): JsonResponse{

        $task->restore($task);
        //return the task as a json response
        return response()->json($task);

    }

}

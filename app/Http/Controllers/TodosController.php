<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $todos = $todo->all();
        return view('todos.index', ['todos' => $todos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
        ]);

        $todo = new Todo();
        $todo->name = $request->title;
        $todo->save();
        return redirect('/')->with('success', 'Tarea creada exitosamente');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect('/')->with('success', 'Tarea eliminada exitosamente');
    }

    public function update(Todo $todo)
    {
        $status = $todo->status == 0
        ? true
        : false;

        $todo->update([
            'name' => $todo->name,
            'status' => $status,
        ]);
        return redirect('/')->with('success', 'Tarea finalizada exitosamente');
    }
}

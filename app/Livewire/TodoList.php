<?php

namespace App\Livewire;

use Livewire\Component;
use \App\Models\Todo;

class TodoList extends Component
{

    public $todos;
    public $task = '';

    public function mount()
    {
        $this->getTodos();
    }

    function getTodos()
    {
        $this->todos = Todo::all()->reverse();
    }

    function addTodo()
    {
        if ($this->task != '') {
            $todo = new Todo();
            $todo->task = $this->task;
            $todo->save();
            $this->task = '';
            $this->getTodos();

            return redirect()->route('tasks.index');
        }
    }

    function markAsDone(Todo $todo)
    {
        $todo->status = 'afgerond';
        $todo->save();
        $this->getTodos();
        return redirect()->route('tasks.index');
    }


    function verwijderTaak(Todo $todo)
    {
        $todo->delete();
        $this->getTodos();

        return redirect()->route('tasks.index');
    }


    public function render()
    {
        return view('livewire.todo-list');
    }
}

<?php

use function Livewire\Volt\{state, with};

state(['task']);

with([
    'todos' => fn() => auth()->user()->todos
]);

$add = function () {
    auth()->user()->todos()->create([
        'task' => $this->task
    ]);

    $this->task = '';
};

?>

<div>

    <form wire:submit="add">
        <input type="text" wire:model="task">

        <button
            type="submit"
            class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
        >
            Add
        </button>
    </form>

    <div class="mt-2">
        @foreach ($todos as $todo)
            <div>
                {{ $todo->task }}
            </div>
        @endforeach
    </div>

</div>

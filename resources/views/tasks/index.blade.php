<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Task Manager - Healducat</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gradient-to-br from-emerald-50 to-green-100 min-h-screen">

<!-- NAVBAR -->
<header class="bg-gradient-to-r from-emerald-600 to-green-500 shadow-lg">

<div class="max-w-7xl mx-auto px-4 md:px-8 py-3 flex flex-wrap gap-3 justify-between items-center text-white">

<div class="flex items-center gap-2">
<img src="{{ asset('images/healducat.jpeg') }}"
class="w-9 h-9 rounded-lg shadow">
<h1 class="text-lg md:text-xl font-bold">Healducat</h1>
</div>

<nav class="flex flex-wrap gap-4 text-sm font-medium">

<a href="/dashboard" class="hover:opacity-80">Dashboard</a>

<a href="/tasks" class="border-b-2 border-white pb-1">Tasks</a>

<a href="/study" class="hover:opacity-80">Timer</a>

<a href="/break" class="hover:opacity-80">Break</a>

<a href="/progress">Progress</a>

</nav>

<form method="POST" action="/logout">
@csrf
<button class="bg-white text-emerald-600 px-3 py-1 rounded-lg font-semibold text-sm">
Logout
</button>
</form>

</div>

</header>

<!-- MAIN -->
<div class="max-w-7xl mx-auto px-4 md:px-8 py-6 md:py-10">

<!-- HEADER -->
<div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">

<h2 class="text-xl md:text-2xl font-bold text-gray-700">
Task Manager
</h2>

<button onclick="toggleForm()"
class="bg-emerald-500 text-white px-4 py-2 rounded-lg hover:bg-emerald-600 text-sm">
Add Task +
</button>

</div>

<!-- FORM -->
<div id="taskForm" class="hidden bg-white rounded-xl shadow p-4 md:p-6 mb-6">

<form method="POST" action="/tasks" class="grid grid-cols-1 md:grid-cols-3 gap-3">

@csrf

<input
type="text"
name="title"
placeholder="Task name..."
class="border rounded-lg px-3 py-2 w-full text-sm"
required
>

<input
type="date"
name="deadline"
class="border rounded-lg px-3 py-2 w-full text-sm"
required
>

<button
type="submit"
class="bg-emerald-500 text-white rounded-lg px-4 py-2 hover:bg-emerald-600 text-sm">
Save Task
</button>

</form>

</div>

<!-- TASK LIST -->
<div class="bg-white rounded-2xl shadow p-4 md:p-6 overflow-x-auto">

<!-- HEADER TABLE -->
<div class="hidden md:grid grid-cols-4 text-gray-500 text-sm font-semibold border-b pb-3 mb-4">
<div>Task</div>
<div>Status</div>
<div>Deadline</div>
<div>Action</div>
</div>

@forelse($tasks as $task)

<!-- DESKTOP -->
<div class="hidden md:grid grid-cols-4 items-center py-4 border-b">

<div class="font-medium {{ $task->is_completed ? 'line-through text-gray-400' : '' }}">
{{ $task->title }}
</div>

<div>
@if($task->is_completed)
<span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">Completed</span>
@elseif($task->status == 'in_progress')
<span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-sm">In Progress</span>
@else
<span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm">Pending</span>
@endif
</div>

<div class="text-gray-500 text-sm">
{{ \Carbon\Carbon::parse($task->deadline)->format('d M Y') }}
</div>

<div>
@if(!$task->is_completed)
<a href="{{ route('focus.task',$task->id) }}"
class="bg-emerald-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-emerald-600">
Mulai
</a>
@endif
</div>

</div>

<!-- MOBILE CARD -->
<div class="md:hidden border-b py-4 space-y-2">

<div class="font-medium {{ $task->is_completed ? 'line-through text-gray-400' : '' }}">
{{ $task->title }}
</div>

<div class="flex justify-between text-sm">

<div>
@if($task->is_completed)
<span class="bg-green-100 text-green-600 px-2 py-1 rounded">Completed</span>
@elseif($task->status == 'in_progress')
<span class="bg-yellow-100 text-yellow-600 px-2 py-1 rounded">Progress</span>
@else
<span class="bg-gray-100 text-gray-600 px-2 py-1 rounded">Pending</span>
@endif
</div>

<div class="text-gray-500">
{{ \Carbon\Carbon::parse($task->deadline)->format('d M Y') }}
</div>

</div>

@if(!$task->is_completed)
<a href="{{ route('focus.task',$task->id) }}"
class="inline-block bg-emerald-500 text-white px-3 py-1 rounded text-sm mt-2">
Mulai Belajar
</a>
@endif

</div>

@empty

<p class="text-center text-gray-400 py-6 text-sm">
Belum ada task
</p>

@endforelse

</div>

</div>

<!-- SCRIPT -->
<script>

function toggleForm(){
let form = document.getElementById("taskForm");
form.classList.toggle("hidden");
}

</script>

</body>
</html>
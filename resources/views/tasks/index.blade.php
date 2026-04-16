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

<div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center text-white">

<div class="flex items-center gap-2">
<span class="text-2xl">💚</span>
<h1 class="text-xl font-bold">Healducat</h1>
</div>

<nav class="flex gap-8 font-medium">

<a href="/dashboard" class="hover:opacity-80">Dashboard</a>

<a href="/tasks" class="border-b-2 border-white pb-1">Tasks</a>

<a href="/study" class="hover:opacity-80">Timer</a>

<a href="/break" class="hover:opacity-80">Break Time</a>

<a href="/progress">Progress</a>

</nav>

<form method="POST" action="/logout">
@csrf
<button class="bg-white text-emerald-600 px-4 py-1 rounded-lg font-semibold">
Logout
</button>
</form>

</div>

</header>

<!-- MAIN -->
<div class="max-w-7xl mx-auto px-8 py-10">

<!-- HEADER -->
<div class="flex justify-between items-center mb-8">

<h2 class="text-2xl font-bold text-gray-700">
Task Manager
</h2>

<button onclick="toggleForm()"
class="bg-emerald-500 text-white px-4 py-2 rounded-lg hover:bg-emerald-600">
Add Task +
</button>

</div>

<!-- FORM ADD TASK -->
<div id="taskForm" class="hidden bg-white rounded-xl shadow p-6 mb-6">

<form method="POST" action="/tasks" class="grid md:grid-cols-3 gap-4">

@csrf

<input
type="text"
name="title"
placeholder="Task name..."
class="border rounded-lg px-3 py-2 w-full"
required
>

<input
type="date"
name="deadline"
class="border rounded-lg px-3 py-2 w-full"
required
>

<button
type="submit"
class="bg-emerald-500 text-white rounded-lg px-4 py-2 hover:bg-emerald-600">
Save Task
</button>

</form>

</div>

<!-- TASK LIST -->
<div class="bg-white rounded-2xl shadow p-6">

<div class="grid grid-cols-4 text-gray-500 text-sm font-semibold border-b pb-3 mb-4">

<div>Task</div>
<div>Status</div>
<div>Deadline</div>
<div>Action</div>

</div>

@forelse($tasks as $task)

<div class="grid grid-cols-4 items-center py-4 border-b">

<div class="font-medium {{ $task->is_completed ? 'line-through text-gray-400' : '' }}">
{{ $task->title }}
</div>

<div>

@if($task->is_completed)

<span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">
Completed
</span>

@elseif($task->status == 'in_progress')

<span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-sm">
In Progress
</span>

@else

<span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm">
Pending
</span>

@endif

</div>

<div class="text-gray-500 text-sm">
{{ \Carbon\Carbon::parse($task->deadline)->format('d M Y') }}
</div>

<div>

@if(!$task->is_completed)

<a href="{{ route('focus.task',$task->id) }}"
class="bg-emerald-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-emerald-600">

Mulai Belajar

</a>

@endif

</div>

</div>

@empty

<p class="text-center text-gray-400 py-6">
Belum ada task
</p>

@endforelse

</div>

</div>

<!-- SCRIPT -->
<script>

function toggleForm(){

let form = document.getElementById("taskForm");

if(form.classList.contains("hidden")){
form.classList.remove("hidden");
}else{
form.classList.add("hidden");
}

}

</script>

</body>
</html>
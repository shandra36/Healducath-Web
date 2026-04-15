<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Task Manager - Healducat</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-emerald-100 via-green-100 to-emerald-200 min-h-screen">

<!-- NAVBAR -->
<div class="flex justify-between items-center px-10 py-6">

<h1 class="text-2xl font-bold text-emerald-700">
Healducat
</h1>

<div class="flex items-center gap-6 text-gray-600">

<a href="/dashboard">Dashboard</a>
<a href="/tasks" class="text-emerald-600 font-semibold">Task</a>
<a href="/moods">Mood</a>
<a href="#">Profile</a>

<form method="POST" action="/logout">
@csrf
<button class="bg-red-100 text-red-500 px-4 py-1 rounded-full">
Logout
</button>
</form>

</div>

</div>

<!-- HEADER -->
<div class="text-center mt-10 mb-10">
<h2 class="text-4xl font-bold text-gray-800 mb-2">
📝 Task Manager
</h2>
<p class="text-gray-600">
Atur tugas kamu, capai target, dan tetap produktif 🚀
</p>
</div>

<!-- FORM -->
<div class="max-w-4xl mx-auto bg-white/60 backdrop-blur-lg p-6 rounded-2xl shadow-md mb-10">

<form method="POST" action="/tasks" class="flex gap-4">
@csrf

<input type="text" name="title" placeholder="Judul tugas"
class="flex-1 px-4 py-3 rounded-xl bg-gray-100 outline-none">

<input type="date" name="deadline"
class="px-4 py-3 rounded-xl bg-gray-100 outline-none">

<button class="bg-emerald-500 text-white px-6 rounded-xl hover:bg-emerald-600 transition">
+ Tambah Task
</button>

</form>

</div>

<!-- LIST TASK -->
<div class="max-w-4xl mx-auto space-y-5">

@forelse($tasks as $task)

@php
$today = \Carbon\Carbon::today();
$deadline = \Carbon\Carbon::parse($task->deadline);
@endphp

<div class="bg-white/70 backdrop-blur-lg p-6 rounded-2xl shadow flex justify-between items-center">

<div>
<h3 class="font-semibold text-lg 
{{ $task->is_completed ? 'line-through text-gray-400' : '' }}">
{{ $task->title }}
</h3>

<p class="text-sm text-gray-500 mt-1">
📅 {{ $deadline->format('d F Y') }}
</p>

<!-- STATUS -->
@if($task->is_completed)
<span class="text-xs bg-green-100 text-green-600 px-3 py-1 rounded-full">
✔ Completed
</span>
@elseif($deadline->isToday())
<span class="text-xs bg-orange-100 text-orange-600 px-3 py-1 rounded-full">
🔥 In Progress
</span>
@elseif($deadline->isPast())
<span class="text-xs bg-red-100 text-red-600 px-3 py-1 rounded-full">
❌ Terlambat
</span>
@endif

</div>

<!-- ACTION -->
<div class="flex gap-3">

@if(!$task->is_completed)
<a href="{{ url('/focus/'.$task->id) }}"
class="bg-emerald-500 text-white px-4 py-2 rounded-xl hover:bg-emerald-600">
Kerjakan Sekarang
</a>
@csrf

</form>
@endif

<form method="POST" action="/tasks/{{ $task->id }}">
@csrf @method('DELETE')
<button class="bg-red-100 text-red-500 px-3 py-2 rounded-xl">
🗑
</button>
</form>

</div>

</div>

@empty

<div class="text-center mt-20 text-gray-400">
<p class="text-lg">Belum ada task 😴</p>
<p>Tambahkan task pertama kamu sekarang!</p>
</div>

@endforelse

</div>

</body>
</html>
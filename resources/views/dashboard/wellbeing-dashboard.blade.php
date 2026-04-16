<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard - Healducat</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gradient-to-br from-emerald-50 to-green-100 min-h-screen">

@if (!auth()->check())
<script>window.location.href = "/login";</script>
@endif


<!-- NAVBAR -->
<header class="bg-gradient-to-r from-emerald-600 to-green-500 shadow-lg">

<div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center text-white">

<!-- LOGO -->
<div class="flex items-center gap-3">

<div class="text-2xl">💚</div>

<h1 class="text-xl font-bold">
Healducat
</h1>

</div>

<!-- MENU -->
<nav class="flex gap-8 font-medium">

<a href="/dashboard" class="border-b-2 border-white pb-1">
Dashboard
</a>

<a href="/tasks" class="hover:opacity-80">
Tasks
</a>

<a href="/moods" class="hover:opacity-80">
Timer
</a>

<a href="/break" class="hover:opacity-80">
Break Time
</a>

<a href="/progress" class="hover:opacity-80">
Progress
</a>

</nav>

<!-- USER -->
<form method="POST" action="/logout">
@csrf
<button class="bg-white text-emerald-600 px-4 py-1 rounded-lg font-semibold">
Logout
</button>
</form>

</div>

</header>



<!-- MAIN CONTENT -->
<div class="max-w-7xl mx-auto px-8 py-10">


<!-- WELCOME -->
<div class="bg-white p-6 rounded-2xl shadow mb-8">

<h2 class="text-xl font-semibold">
Welcome back, {{ auth()->user()->name }} 👋
</h2>

<p class="text-gray-500">
{{ now()->format('l, d M Y') }}
</p>

</div>



<!-- STATS -->
<div class="grid md:grid-cols-3 gap-6 mb-10">

<!-- STUDY TIME -->
<div class="bg-white p-6 rounded-2xl shadow">

<h3 class="text-gray-500 mb-2">
Study Time
</h3>

<p class="text-3xl font-bold text-emerald-600">
{{ $totalStudyTime }} min
</p>

<p class="text-sm text-gray-400 mt-1">
Total belajar
</p>

</div>


<!-- TASK COMPLETED -->
<div class="bg-white p-6 rounded-2xl shadow">

<h3 class="text-gray-500 mb-2">
Tasks Completed
</h3>

<p class="text-3xl font-bold text-emerald-600">
{{ $totalSessions }}
</p>

<p class="text-sm text-gray-400 mt-1">
Total session
</p>

</div>


<!-- FOCUS LEVEL -->
<div class="bg-white p-6 rounded-2xl shadow">

<h3 class="text-gray-500 mb-2">
Focus Level
</h3>

<p class="text-3xl font-bold text-emerald-600">
{{ $avgStudy ? round($avgStudy) : 0 }}%
</p>

<div class="w-full bg-gray-200 rounded-full h-2 mt-3">

<div class="bg-emerald-500 h-2 rounded-full"
style="width: {{ $avgStudy ? round($avgStudy) : 0 }}%">

</div>

</div>

</div>

</div>



<!-- TASK LIST -->
<div class="bg-white rounded-2xl shadow p-6">

<div class="flex justify-between items-center mb-4">

<h3 class="text-lg font-semibold">
Task List
</h3>

<a href="/tasks"
class="bg-emerald-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-emerald-600">
Add Task +
</a>

</div>


<div class="space-y-3">

@forelse($todayTasks ?? [] as $task)

<div class="flex justify-between items-center p-4 rounded-lg bg-gray-50 hover:bg-emerald-50 transition">

<div class="font-medium">
{{ $task->title }}
</div>

<div class="text-sm text-gray-500">
Due: {{ $task->deadline }}
</div>

</div>

@empty

<p class="text-gray-400 text-center py-4">
Tidak ada tugas hari ini 🎉
</p>

@endforelse

</div>

</div>


</div>

</body>
</html>
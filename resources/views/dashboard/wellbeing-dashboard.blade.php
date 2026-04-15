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
<div class="bg-white shadow-md">
<div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">

<h1 class="text-2xl font-bold text-emerald-600">
Healducat
</h1>

<div class="flex items-center gap-5 text-sm">

<a href="/dashboard" class="text-emerald-600 font-semibold">Dashboard</a>
<a href="/tasks" class="text-gray-600 hover:text-emerald-600">Task</a>
<a href="/moods" class="text-gray-600 hover:text-emerald-600">Study</a>
<a href="/break" class="text-gray-600 hover:text-emerald-600">Break</a>

<form method="POST" action="/logout">
@csrf
<button class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600">
Logout
</button>
</form>

</div>

</div>
</div>

<!-- CONTENT -->
<div class="max-w-6xl mx-auto py-10 px-6">

<!-- WELCOME -->
<div class="bg-white/80 backdrop-blur-lg p-8 rounded-2xl shadow-lg mb-10">

<h2 class="text-2xl font-semibold">
Hi, {{ auth()->user()->name }} 👋
</h2>

<p class="text-gray-500 mt-1">
{{ now()->format('l, d M Y') }}
</p>

<p class="text-gray-600 mt-3">
Tetap semangat! Progress kecil hari ini = hasil besar nanti 🚀
</p>

</div>

<!-- 🔥 TASK REMINDER (ANTI ERROR FIX) -->
<div class="bg-white p-6 rounded-2xl shadow mb-10">

<h3 class="text-lg font-semibold text-emerald-600 mb-4">
🔥 Tugas Hari Ini
</h3>

@forelse($todayTasks ?? [] as $task)

<div class="flex justify-between items-center py-3 px-3 rounded-lg hover:bg-emerald-50 transition">

<div>
<p class="font-medium">{{ $task->title }}</p>
<p class="text-xs text-gray-400">Deadline hari ini</p>
</div>

<span class="text-red-500 text-sm font-semibold">
⚠ Urgent
</span>

</div>

@empty

<div class="text-center py-4">
<p class="text-gray-400">Tidak ada tugas hari ini 🎉</p>
</div>

@endforelse

</div>

<!-- STATS -->
<div class="grid md:grid-cols-3 gap-6 mb-10">

<div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
<p class="text-gray-500 text-sm">Total Sessions</p>
<h2 class="text-3xl font-bold text-emerald-600 mt-2">
{{ $totalSessions }}
</h2>
</div>

<div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
<p class="text-gray-500 text-sm">Total Study Time</p>
<h2 class="text-3xl font-bold text-emerald-600 mt-2">
{{ $totalStudyTime }} min
</h2>
</div>

<div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
<p class="text-gray-500 text-sm">Average Session</p>
<h2 class="text-3xl font-bold text-emerald-600 mt-2">
{{ $avgStudy ? round($avgStudy) : 0 }} min
</h2>
</div>

</div>

<!-- MENU -->
<div class="grid md:grid-cols-3 gap-8">

<!-- STUDY -->
<a href="/moods"
class="bg-gradient-to-br from-emerald-500 to-green-400 text-white p-8 rounded-2xl shadow-lg hover:scale-105 transition">

<div class="text-4xl mb-4">🎯</div>
<h3 class="text-xl font-semibold">Start Study</h3>
<p class="opacity-90">Mulai sesi fokus</p>

</a>

<!-- TASK -->
<a href="/tasks"
class="bg-white p-8 rounded-2xl shadow hover:shadow-xl hover:-translate-y-1 transition">

<div class="text-4xl mb-4">📝</div>
<h3 class="text-xl font-semibold">Task Manager</h3>
<p class="text-gray-500">Kelola tugas kamu</p>

</a>

<!-- BREAK -->
<a href="/break"
class="bg-white p-8 rounded-2xl shadow hover:shadow-xl hover:-translate-y-1 transition">

<div class="text-4xl mb-4">🧘</div>
<h3 class="text-xl font-semibold">Break Activity</h3>
<p class="text-gray-500">Istirahat sehat</p>

</a>

</div>

</div>

</body>
</html>
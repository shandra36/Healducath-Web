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

<div class="max-w-6xl mx-auto py-12 px-6">

<!-- HEADER -->
<div class="flex justify-between items-center mb-12">

<h1 class="text-3xl font-bold text-emerald-600">
Healducat
</h1>

<form method="POST" action="/logout">
@csrf
<button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
Logout
</button>
</form>

</div>

<!-- WELCOME -->
<div class="bg-white/80 backdrop-blur-lg p-8 rounded-2xl shadow-lg mb-10 border border-white">

<h2 class="text-2xl font-semibold">
Hi, {{ auth()->user()->name }} 👋
</h2>

<span class="text-sm text-gray-400 block mt-1">
{{ now()->format('l, d M Y') }}
</span>

<p class="text-gray-600 mt-3">
Kamu sudah belajar dengan baik hari ini, lanjutkan ya 🚀
</p>

</div>

<!-- STATS -->
<div class="grid md:grid-cols-3 gap-6 mb-10">

<!-- TOTAL SESSION -->
<div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition">
<p class="text-gray-500 text-sm">Total Sessions</p>
<h2 class="text-3xl font-bold text-emerald-600 mt-2">
{{ $totalSessions }}
</h2>
</div>

<!-- TOTAL STUDY TIME -->
<div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition">
<p class="text-gray-500 text-sm">Total Study Time</p>
<h2 class="text-3xl font-bold text-emerald-600 mt-2">
{{ $totalStudyTime }} min
</h2>
</div>

<!-- AVG -->
<div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition">
<p class="text-gray-500 text-sm">Average Session</p>
<h2 class="text-3xl font-bold text-emerald-600 mt-2">
{{ $avgStudy ? round($avgStudy) : 0 }} min
</h2>
</div>

</div>

<!-- MOTIVATION -->
<div class="bg-white p-6 rounded-2xl shadow mb-12">
<p class="text-sm text-gray-500 mb-2">Today's Motivation</p>
<h3 class="text-lg font-semibold text-emerald-600">
Keep going, you're doing great 💪
</h3>
</div>

<!-- ACTION MENU -->
<div class="grid md:grid-cols-3 gap-8">

<!-- START STUDY (HIGHLIGHT) -->
<a href="/moods"
class="group bg-gradient-to-br from-emerald-500 to-green-400 text-white p-8 rounded-2xl shadow-lg hover:scale-105 transition duration-300">

<div class="text-4xl mb-4">🎯</div>

<h3 class="text-xl font-semibold mb-2">
Start Study
</h3>

<p class="opacity-90">
Mulai sesi fokus + pilih mood
</p>

</a>

<!-- BREAK -->
<a href="/break"
class="group bg-white p-8 rounded-2xl shadow-md hover:shadow-2xl hover:-translate-y-2 transition duration-300">

<div class="text-4xl mb-4">🧘</div>

<h3 class="text-xl font-semibold mb-2 group-hover:text-emerald-600">
Break Activity
</h3>

<p class="text-gray-500">
Ambil waktu istirahat sehat
</p>

</a>

<!-- REFRESH -->
<a href="/dashboard"
class="group bg-white p-8 rounded-2xl shadow-md hover:shadow-2xl hover:-translate-y-2 transition duration-300">

<div class="text-4xl mb-4">📊</div>

<h3 class="text-xl font-semibold mb-2 group-hover:text-emerald-600">
Refresh Stats
</h3>

<p class="text-gray-500">
Lihat update perkembangan belajar
</p>

</a>

</div>

</div>

</body>
</html>
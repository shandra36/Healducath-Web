<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Progress - Healducat</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gradient-to-br from-emerald-50 to-green-100 min-h-screen">

<header class="bg-gradient-to-r from-emerald-600 to-green-500 shadow-lg">
<div class="max-w-7xl mx-auto px-4 md:px-8 py-3 flex flex-wrap gap-3 justify-between items-center text-white">

<div class="flex items-center gap-2">
<span class="text-xl md:text-2xl">💚</span>
<h1 class="text-lg md:text-xl font-bold">Healducat</h1>
</div>

<nav class="flex flex-wrap gap-3 md:gap-6 text-sm md:text-base font-medium">
<a href="/dashboard">Dashboard</a>
<a href="/tasks">Tasks</a>
<a href="/study">Timer</a>
<a href="/break">Break</a>
<a href="/progress" class="border-b-2 border-white pb-1">Progress</a>
</nav>

<form method="POST" action="/logout">
@csrf
<button class="bg-white text-emerald-600 px-3 py-1 rounded-lg text-sm font-semibold">
Logout
</button>
</form>

</div>
</header>

<div class="max-w-7xl mx-auto px-4 md:px-8 py-8 md:py-10">

<h2 class="text-xl md:text-2xl font-bold text-gray-700 mb-6">
Your Progress Today 📊
</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">

<div class="bg-white p-5 md:p-6 rounded-2xl shadow">
<p class="text-gray-500 text-sm">Study Hours</p>
<h2 class="text-2xl md:text-3xl font-bold text-emerald-600">
{{ $studyHours }} jam
</h2>
</div>

<div class="bg-white p-5 md:p-6 rounded-2xl shadow">
<p class="text-gray-500 text-sm">Focus Level</p>
<h2 class="text-2xl md:text-3xl font-bold text-emerald-600">
{{ $focusLevel }}%
</h2>
</div>

<div class="bg-white p-5 md:p-6 rounded-2xl shadow">
<p class="text-gray-500 text-sm">Break Balance</p>
<h2 class="text-2xl md:text-3xl font-bold text-emerald-600">
{{ $breakBalance }}%
</h2>
</div>

</div>

<div class="bg-white p-5 md:p-6 rounded-2xl shadow mt-6 md:mt-8 overflow-x-auto">

<h3 class="font-semibold mb-4 md:mb-6">Weekly Study Progress</h3>

<div class="flex items-end gap-3 min-w-[400px] md:min-w-full">

@foreach($weeklyData as $day)

<div class="flex flex-col items-center gap-1">

<div
class="bg-emerald-500 w-5 md:w-6 rounded"
style="height: {{ $day['height'] }}px">
</div>

<span class="text-xs text-gray-400">
{{ $day['label'] }}
</span>

</div>

@endforeach

</div>

</div>

</div>

<div class="max-w-7xl mx-auto px-4 md:px-8 pb-12 md:pb-16">

<h2 class="text-xl md:text-2xl font-bold text-gray-700 mb-6">
Habit & Insight 🔍
</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">

<div class="bg-white p-5 md:p-6 rounded-2xl shadow">

<h3 class="font-semibold mb-4">Habit Tracker</h3>

<div class="grid grid-cols-7 text-center text-xs md:text-sm text-gray-400 mb-2">
<div>Mon</div><div>Tue</div><div>Wed</div>
<div>Thu</div><div>Fri</div><div>Sat</div><div>Sun</div>
</div>

<div class="grid grid-cols-7 gap-1 md:gap-2">

@foreach($habit as $day)

<div class="{{ $day ? 'bg-emerald-500' : 'bg-gray-200' }} h-5 md:h-6 rounded"></div>

@endforeach

</div>

</div>

<div class="bg-white p-5 md:p-6 rounded-2xl shadow">

<h3 class="font-semibold mb-4">Insight AI</h3>

<p class="text-gray-600 text-sm mb-4">
{{ $insight }}
</p>

<p class="text-gray-600 text-sm">
Disarankan belajar {{ $recommended }} menit per sesi untuk hasil maksimal 🚀
</p>

</div>

<div class="bg-white p-5 md:p-6 rounded-2xl shadow md:col-span-2">

<h3 class="font-semibold mb-4">Energy & Mood</h3>

<div class="flex justify-between items-center text-2xl md:text-4xl">

<div>
{{ $moodStats['semangat'] }} 🙂
</div>

<div>
{{ $moodStats['biasa'] }} 😐
</div>

<div>
{{ $moodStats['lelah'] }} 😴
</div>

</div>

<p class="text-center text-gray-500 mt-4 text-sm md:text-base">
Mood dominan hari ini: <b>{{ $dominantMood }}</b>
</p>

</div>

</div>

</div>

</body>
</html>
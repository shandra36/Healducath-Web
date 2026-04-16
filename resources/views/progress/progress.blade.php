<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Progress - Healducat</title>

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
<a href="/dashboard">Dashboard</a>
<a href="/tasks">Tasks</a>
<a href="/study">Timer</a>
<a href="/break">Break Time</a>
<a href="/progress" class="border-b-2 border-white pb-1">Progress</a>
</nav>

<form method="POST" action="/logout">
@csrf
<button class="bg-white text-emerald-600 px-4 py-1 rounded-lg font-semibold">
Logout
</button>
</form>

</div>

</header>

<!-- ===================== -->
<!-- SECTION 1 (OVERVIEW) -->
<!-- ===================== -->
<div class="max-w-7xl mx-auto px-8 py-10">

<h2 class="text-2xl font-bold text-gray-700 mb-6">
Your Progress Today 📊
</h2>

<div class="grid md:grid-cols-3 gap-6">

<!-- Study Hours -->
<div class="bg-white p-6 rounded-2xl shadow">
<p class="text-gray-500 text-sm">Study Hours</p>
<h2 class="text-3xl font-bold text-emerald-600">12.4 jam</h2>
</div>

<!-- Focus -->
<div class="bg-white p-6 rounded-2xl shadow">
<p class="text-gray-500 text-sm">Focus Level</p>
<h2 class="text-3xl font-bold text-emerald-600">85%</h2>
</div>

<!-- Break Balance -->
<div class="bg-white p-6 rounded-2xl shadow">
<p class="text-gray-500 text-sm">Break Balance</p>
<h2 class="text-3xl font-bold text-emerald-600">72%</h2>
</div>

</div>

<!-- GRAPH -->
<div class="bg-white p-6 rounded-2xl shadow mt-8">

<h3 class="font-semibold mb-4">Weekly Study Progress</h3>

<div class="h-40 flex items-end gap-3">

<div class="bg-emerald-400 w-6 h-20 rounded"></div>
<div class="bg-emerald-500 w-6 h-28 rounded"></div>
<div class="bg-emerald-300 w-6 h-16 rounded"></div>
<div class="bg-emerald-600 w-6 h-32 rounded"></div>
<div class="bg-emerald-400 w-6 h-24 rounded"></div>
<div class="bg-emerald-500 w-6 h-30 rounded"></div>

</div>

</div>

</div>

<!-- ===================== -->
<!-- SECTION 2 (DETAIL) -->
<!-- ===================== -->
<div class="max-w-7xl mx-auto px-8 pb-16">

<h2 class="text-2xl font-bold text-gray-700 mb-6">
Habit & Insight 🔍
</h2>

<div class="grid md:grid-cols-2 gap-6">

<!-- HABIT TRACKER -->
<div class="bg-white p-6 rounded-2xl shadow">

<h3 class="font-semibold mb-4">Habit Tracker</h3>

<div class="grid grid-cols-7 text-center text-sm text-gray-400 mb-2">
<div>Mon</div><div>Tue</div><div>Wed</div>
<div>Thu</div><div>Fri</div><div>Sat</div><div>Sun</div>
</div>

<div class="grid grid-cols-7 gap-2">

<div class="bg-emerald-500 h-6 rounded"></div>
<div class="bg-emerald-500 h-6 rounded"></div>
<div class="bg-gray-200 h-6 rounded"></div>
<div class="bg-emerald-500 h-6 rounded"></div>
<div class="bg-emerald-500 h-6 rounded"></div>
<div class="bg-gray-200 h-6 rounded"></div>
<div class="bg-emerald-500 h-6 rounded"></div>

</div>

</div>

<!-- AI INSIGHT -->
<div class="bg-white p-6 rounded-2xl shadow">

<h3 class="font-semibold mb-4">Insight AI</h3>

<p class="text-gray-600 text-sm mb-4">
Kamu lebih fokus saat belajar pagi hari 🌅
</p>

<p class="text-gray-600 text-sm">
Disarankan belajar 60–90 menit per sesi untuk hasil maksimal 🚀
</p>

</div>

<!-- MOOD -->
<div class="bg-white p-6 rounded-2xl shadow col-span-2">

<h3 class="font-semibold mb-4">Energy & Mood</h3>

<div class="flex justify-between items-center">

<div class="text-4xl">😃</div>
<div class="text-4xl">😐</div>
<div class="text-4xl">😴</div>

</div>

<p class="text-center text-gray-500 mt-4">
Mood kamu hari ini cukup stabil 👍
</p>

</div>

</div>

</div>

</body>
</html>
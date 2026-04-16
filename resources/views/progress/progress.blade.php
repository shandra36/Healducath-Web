<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Progress - Healducat</title>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="bg-gradient-to-br from-green-100 to-emerald-200 min-h-screen">

<!-- NAVBAR -->
<header class="bg-gradient-to-r from-emerald-600 to-green-500 shadow-lg">
<div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center text-white">

<div class="flex items-center gap-2">
<span class="text-2xl">💚</span>
<h1 class="text-xl font-bold">Healducat</h1>
</div>

<nav class="flex gap-8 font-medium">
<a href="{{ route('dashboard') }}">Dashboard</a>
<a href="{{ route('tasks.index') }}">Tasks</a>
<a href="{{ route('study.start') }}">Timer</a>
<a href="{{ route('break.random') }}">Break Time</a>
<a href="{{ route('progress') }}" class="border-b-2 border-white pb-1">Progress</a>
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

<h2 class="text-2xl font-bold text-gray-700 mb-6">
Progress & Analytics 📊
</h2>

<div class="bg-white rounded-2xl shadow p-6 grid md:grid-cols-3 gap-6">

<!-- LEFT: BAR CHART -->
<div class="md:col-span-2">

<h3 class="text-gray-600 font-semibold mb-3">Study Time</h3>

<canvas id="barChart"></canvas>

</div>

<!-- RIGHT SIDE -->
<div class="space-y-4">

<!-- DONUT -->
<div class="bg-gray-50 p-4 rounded-xl shadow text-center">
<h4 class="text-gray-600 mb-2">Progress</h4>
<canvas id="donutChart" class="mx-auto w-40"></canvas>
<p class="mt-2 font-bold text-emerald-600">75% Completed</p>
</div>

<!-- WEEKLY FOCUS -->
<div class="bg-gray-50 p-4 rounded-xl shadow">
<p class="text-gray-500 text-sm">Weekly Focus</p>
<h2 class="text-2xl font-bold text-emerald-600">87%</h2>
</div>

<!-- TOTAL TIME -->
<div class="bg-gray-50 p-4 rounded-xl shadow">
<p class="text-gray-500 text-sm">Total Study Time</p>
<h2 class="text-2xl font-bold text-emerald-600">28h 40m</h2>
</div>

</div>

</div>

</div>

<!-- SCRIPT -->
<script>

// BAR CHART
new Chart(document.getElementById('barChart'), {
type: 'bar',
data: {
labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
datasets: [{
label: 'Study Time',
data: [20, 30, 40, 35, 50, 45, 60],
backgroundColor: '#10b981'
}]
},
options: {
plugins: { legend: { display: false } },
responsive: true
}
});


// DONUT CHART
new Chart(document.getElementById('donutChart'), {
type: 'doughnut',
data: {
labels: ['Completed', 'Remaining'],
datasets: [{
data: [75, 25],
backgroundColor: ['#10b981', '#e5e7eb']
}]
},
options: {
plugins: { legend: { display: false } },
cutout: '70%'
}
});

</script>

</body>
</html>
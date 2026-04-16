<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Progress Belajar - Healducat</title>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

<!-- MAIN -->
<div class="max-w-7xl mx-auto px-8 py-10">

<h2 class="text-2xl font-bold text-gray-700 mb-8">
Progress Belajar 📊
</h2>

<div class="grid md:grid-cols-3 gap-6 mb-10">

<div class="bg-white p-6 rounded-2xl shadow">
<p class="text-gray-500 text-sm">Total Session</p>
<h2 class="text-3xl font-bold text-emerald-600">12</h2>
</div>

<div class="bg-white p-6 rounded-2xl shadow">
<p class="text-gray-500 text-sm">Total Waktu Belajar</p>
<h2 class="text-3xl font-bold text-emerald-600">320 menit</h2>
</div>

<div class="bg-white p-6 rounded-2xl shadow">
<p class="text-gray-500 text-sm">Task Selesai</p>
<h2 class="text-3xl font-bold text-emerald-600">8</h2>
</div>

</div>

<div class="bg-white p-6 rounded-2xl shadow">

<h3 class="text-lg font-semibold mb-4">
Grafik Waktu Belajar Mingguan
</h3>

<canvas id="studyChart"></canvas>

</div>

</div>

<script>

const ctx = document.getElementById('studyChart');

new Chart(ctx, {
type: 'bar',
data: {
labels: ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'],
datasets: [{
label: 'Menit Belajar',
data: [30,45,25,60,40,20,50],
backgroundColor: '#10b981'
}]
},
options: {
plugins: {
legend: {
display:false
}
}
}
});

</script>

</body>
</html>
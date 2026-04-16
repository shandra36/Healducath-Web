<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard - Healducat</title>

<script src="https://cdn.tailwindcss.com"></script>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

@keyframes float {
0% { transform: translateY(0px); }
50% { transform: translateY(-8px); }
100% { transform: translateY(0px); }
}

.animate-float{
animation: float 3s ease-in-out infinite;
}

</style>

</head>

<body class="bg-gradient-to-br from-emerald-50 via-green-50 to-emerald-100 min-h-screen">

@if (!auth()->check())
<script>window.location.href="/login"</script>
@endif


<!-- NAVBAR -->
<header class="bg-gradient-to-r from-emerald-600 to-green-500 shadow-lg">

<div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center text-white">

<div class="flex items-center gap-3">

<div class="text-2xl animate-pulse">💚</div>

<h1 class="text-xl font-bold">
Healducat
</h1>

</div>

<nav class="flex gap-8 font-medium">

<a href="/dashboard" class="border-b-2 border-white pb-1">
Dashboard
</a>

<a href="/tasks">Tugas</a>
<a href="/moods">Timer Belajar</a>
<a href="/break">Waktu Istirahat</a>
<a href="/progress">Progres</a>

</nav>

<form method="POST" action="/logout">
@csrf
<button class="bg-white text-emerald-600 px-4 py-1 rounded-lg font-semibold hover:scale-105 transition">
Keluar
</button>
</form>

</div>

</header>



<!-- MAIN -->
<div class="max-w-7xl mx-auto px-8 py-10 space-y-8">


<!-- WELCOME -->
<div class="bg-white p-6 rounded-2xl shadow-lg flex justify-between items-center">

<div>

<h2 class="text-2xl font-semibold">
Selamat datang kembali, {{ auth()->user()->name }} 👋
</h2>

<p class="text-gray-500">
{{ now()->format('l, d M Y') }}
</p>

<p class="text-emerald-600 mt-1 font-medium">
Siap meningkatkan fokus belajar hari ini 🚀
</p>

</div>

<div class="text-5xl animate-float">
📚
</div>

</div>



<!-- MOOD CHECK -->
<div class="bg-white p-6 rounded-2xl shadow">

<h3 class="font-semibold mb-4 text-lg">
Bagaimana kondisi belajar kamu hari ini?
</h3>

<form action="{{ route('study.startSession') }}" method="POST">
@csrf

<div class="flex gap-4">

<button type="submit" name="mood" value="semangat"
class="px-6 py-3 rounded-xl bg-green-100 hover:bg-green-200 transition">
🙂 Sangat Semangat
</button>

<button type="submit" name="mood" value="biasa"
class="px-6 py-3 rounded-xl bg-yellow-100 hover:bg-yellow-200 transition">
😐 Biasa Saja
</button>

<button type="submit" name="mood" value="lelah"
class="px-6 py-3 rounded-xl bg-blue-100 hover:bg-blue-200 transition">
😴 Sedikit Lelah
</button>

</div>

</form>

</div>



<!-- STATISTIK -->
<div class="grid md:grid-cols-3 gap-6">

<div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl hover:-translate-y-1 transition">

<h3 class="text-gray-500">Waktu Belajar</h3>

<p class="text-3xl font-bold text-emerald-600">
{{ $totalStudyTime }} menit
</p>

<p class="text-gray-400 text-sm">
Total belajar
</p>

</div>



<div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl hover:-translate-y-1 transition">

<h3 class="text-gray-500">Tugas Selesai</h3>

<p class="text-3xl font-bold text-emerald-600">
{{ $totalSessions }}
</p>

<p class="text-gray-400 text-sm">
Total sesi belajar
</p>

</div>



<div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl hover:-translate-y-1 transition">

<h3 class="text-gray-500">Tingkat Fokus</h3>

<p class="text-3xl font-bold text-emerald-600">
{{ $avgStudy ? round($avgStudy) : 0 }}%
</p>

<div class="w-full bg-gray-200 rounded-full h-2 mt-3">

<div class="bg-emerald-500 h-2 rounded-full transition-all duration-700"
style="width: {{ $avgStudy ? round($avgStudy) : 0 }}%">
</div>

</div>

</div>

</div>



<!-- TUGAS HARI INI -->
<div class="bg-white rounded-2xl shadow p-6">

<div class="flex justify-between items-center mb-5">

<h3 class="text-lg font-semibold">
Tugas Hari Ini
</h3>

<a href="/tasks"
class="bg-emerald-500 text-white px-4 py-2 rounded-lg hover:bg-emerald-600 transition">
Tambah Tugas +
</a>

</div>

<div class="space-y-3">

@forelse($todayTasks ?? [] as $task)

<div class="p-4 rounded-lg bg-gray-50 hover:bg-emerald-50 transition flex justify-between">

<div>

<p class="font-medium">
{{ $task->title }}
</p>

<p class="text-gray-400 text-sm">
Deadline: {{ $task->deadline }}
</p>

</div>

<a href="/timer"
class="bg-emerald-500 text-white px-3 py-1 rounded-lg text-sm hover:scale-105 transition">
Mulai
</a>

</div>

@empty

<p class="text-gray-400 text-center py-4">
Tidak ada tugas hari ini 🎉
</p>

@endforelse

</div>

</div>



<!-- QUICK STUDY -->
<div class="bg-emerald-500 text-white p-6 rounded-2xl shadow flex justify-between items-center">

<div>

<h3 class="text-lg font-semibold">
Mulai Sesi Belajar
</h3>

<p class="text-sm opacity-80">
Mulai sesi fokus selama 25 menit
</p>

</div>

<a href="/timer"
class="bg-white text-emerald-600 px-4 py-2 rounded-lg font-semibold hover:scale-105 transition">
Mulai Belajar
</a>

</div>



<!-- GRAFIK PROGRES -->
<div class="bg-white p-6 rounded-2xl shadow">

<h3 class="text-lg font-semibold mb-4">
Progres Belajar Mingguan
</h3>

<canvas id="studyChart"></canvas>

</div>


</div>



<!-- CHART SCRIPT -->
<script>

const ctx = document.getElementById('studyChart');

new Chart(ctx, {

type: 'line',

data: {

labels: ['Sen','Sel','Rab','Kam','Jum','Sab','Min'],

datasets: [{

label: 'Durasi Belajar (menit)',

data: [30,45,60,20,90,50,70],

borderColor: '#10b981',

backgroundColor: 'rgba(16,185,129,0.2)',

tension: 0.4,

fill: true

}]

},

options: {

responsive:true,

plugins:{
legend:{display:false}
},

scales:{
y:{
beginAtZero:true
}
}

}

});

</script>


</body>
</html>
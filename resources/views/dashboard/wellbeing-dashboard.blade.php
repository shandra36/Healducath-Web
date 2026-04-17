<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard - Healducat</title>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

@keyframes gradientMove{
0%{background-position:0% 50%;}
50%{background-position:100% 50%;}
100%{background-position:0% 50%;}
}

.bg-animate{
background:linear-gradient(-45deg,#bbf7d0,#d1fae5,#a7f3d0,#bbf7d0);
background-size:400% 400%;
animation:gradientMove 15s ease infinite;
}

.card{
transition:all .25s ease;
}

.card:hover{
transform:translateY(-4px);
box-shadow:0 18px 35px rgba(0,0,0,0.12);
}

.mood{
transition:.25s;
}

.mood:hover{
transform:scale(1.05);
box-shadow:0 8px 20px rgba(0,0,0,0.12);
}

.hero-bg{
background:linear-gradient(135deg,#e6f7f1,#cdeee5);
}

</style>

</head>

<body class="bg-animate min-h-screen">

@if (!auth()->check())
<script>window.location.href="/login"</script>
@endif


<header class="bg-gradient-to-r from-emerald-600 to-green-500 shadow-lg">

<div class="max-w-7xl mx-auto px-4 md:px-8 py-3 flex flex-wrap gap-3 justify-between items-center text-white">

<div class="flex items-center gap-3">

<img src="{{ asset('images/healducat.jpeg') }}"
class="w-9 h-9 rounded-lg shadow">

<h1 class="text-xl font-bold tracking-wide">
Healducat
</h1>

</div>

<nav class="flex flex-wrap gap-4 text-xs md:text-sm font-medium">
    
<a href="/dashboard" class="border-b-2 border-white pb-1">
Dashboard
</a>

<a href="/tasks">Tasks</a>

<a href="{{ route('study.start') }}">
Timer
</a>

<a href="{{ route('break.random') }}">
Break
</a>

<a href="/progress">
Progres
</a>

</nav>

<form method="POST" action="/logout">
@csrf
<button class="bg-white text-emerald-600 px-4 py-1 rounded-lg font-semibold hover:scale-105 transition">
Logout
</button>
</form>

</div>

</header>


<section class="hero-bg">

<div class="max-w-7xl mx-auto px-4 md:px-8 py-10 md:py-16 grid md:grid-cols-2 items-center gap-8">

<div>

<h1 class="text-2xl md:text-3xl font-bold text-emerald-700 leading-tight">
Belajar Lebih Fokus <br>
& Produktif
</h1>

<p class="text-gray-600 mt-4">
Selamat datang kembali, ayo capai target belajarmu hari ini
</p>

<div class="flex gap-4 mt-6">

<a href="{{ route('study.start') }}"
class="bg-emerald-500 text-white px-6 py-3 rounded-xl shadow hover:bg-emerald-600 transition">

Mulai Belajar

</a>

<a href="/progress"
class="bg-white px-6 py-3 rounded-xl shadow hover:bg-gray-100 transition">

Lihat Progress

</a>

</div>

</div>

<div class="flex justify-center">

<img src="{{ asset('images/dashboard.png') }}"
class="w-full max-w-xs md:max-w-md">

</div>

</div>

</section>


<div class="max-w-7xl mx-auto px-4 md:px-8 py-8 grid grid-cols-1 lg:grid-cols-3 gap-6">

<div class="lg:col-span-2 space-y-6">


<div class="bg-white p-6 rounded-2xl shadow card">

<h3 class="font-semibold mb-4 text-lg">
Bagaimana kondisi belajar kamu hari ini?
</h3>

<form action="{{ route('study.startSession') }}" method="POST">
@csrf

<div class="grid grid-cols-1 sm:grid-cols-3 gap-3">

<button type="submit" name="mood" value="semangat"
class="mood px-4 py-3 rounded-xl bg-green-100 text-sm">
🙂 Sangat Semangat
</button>

<button type="submit" name="mood" value="biasa"
class="mood px-4 py-3 rounded-xl bg-yellow-100 text-sm">
😐 Biasa Saja
</button>

<button type="submit" name="mood" value="lelah"
class="mood px-4 py-3 rounded-xl bg-blue-100 text-sm">
😴 Sedikit Lelah
</button>

</div>

</form>

</div>


<div class="bg-white rounded-2xl shadow p-6 card">

<div class="flex justify-between items-center mb-4">

<h3 class="text-lg font-semibold">
Tugas Hari Ini
</h3>

<a href="/tasks"
class="bg-emerald-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-emerald-600 transition">
Tambah +
</a>

</div>

<div class="space-y-3">

@forelse($todayTasks ?? [] as $task)

<div class="p-4 rounded-xl bg-gray-50 hover:bg-emerald-50 transition flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

<div>

<p class="font-medium">
{{ $task->title }}
</p>

<p class="text-gray-400 text-xs">
Deadline: {{ $task->deadline }}
</p>

</div>

<a href="{{ route('focus.task', $task->id) }}"
class="bg-emerald-500 text-white px-3 py-1 rounded-lg text-xs hover:scale-105 transition">
Mulai
</a>

</div>

@empty

<p class="text-gray-400 text-center py-4 text-sm">
Tidak ada tugas hari ini 🎉
</p>

@endforelse

</div>

</div>

</div>


<div class="space-y-6">

<div class="bg-white rounded-2xl shadow p-5 card">

<h3 class="text-gray-500 text-sm">
Waktu Belajar
</h3>

<p class="text-3xl font-bold text-emerald-600 mt-1">
{{ $totalStudyTime }} menit
</p>

</div>

<div class="bg-white rounded-2xl shadow p-5 card">

<h3 class="text-gray-500 text-sm">
Tugas Selesai
</h3>

<p class="text-3xl font-bold text-emerald-600 mt-1">
{{ $totalSessions }}
</p>

</div>

<div class="bg-white rounded-2xl shadow p-5 card">

<h3 class="text-gray-500 text-sm">
Tingkat Fokus
</h3>

<p class="text-3xl font-bold text-emerald-600 mt-1">
{{ $avgStudy ? round($avgStudy) : 0 }}%
</p>

<div class="w-full bg-gray-200 rounded-full h-2 mt-3">

<div class="bg-emerald-500 h-2 rounded-full transition-all duration-700"
style="width: {{ $avgStudy ? round($avgStudy) : 0 }}%">
</div>

</div>

</div>

<div class="bg-white rounded-2xl shadow p-5 card">

<h3 class="text-sm font-semibold mb-3">
Progres Belajar
</h3>

<canvas id="studyChart"></canvas>

</div>

</div>

</div>


<script>

const ctx = document.getElementById('studyChart');

new Chart(ctx,{

type:'line',

data:{
labels:['Sen','Sel','Rab','Kam','Jum','Sab','Min'],
datasets:[{
data: {!! json_encode($chartData) !!},
borderColor:'#10b981',
backgroundColor:'rgba(16,185,129,0.2)',
tension:0.4,
fill:true
}]
},

options:{
responsive:true,
plugins:{legend:{display:false}},
scales:{y:{beginAtZero:true}}
}

});

</script>

</body>
</html>
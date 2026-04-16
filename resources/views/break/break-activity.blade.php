<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Break Time - Healducat</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>

/* background daun */

@keyframes leafMove{
0%{transform:translateY(0px);}
50%{transform:translateY(-20px);}
100%{transform:translateY(0px);}
}

.leaf{
animation:leafMove 6s ease-in-out infinite;
opacity:0.2;
}

/* breathing animation */

@keyframes breathe{
0%{transform:scale(0.9);}
50%{transform:scale(1.2);}
100%{transform:scale(0.9);}
}

.breathing{
animation:breathe 4s ease-in-out infinite;
}

/* circular progress */

.timer-circle{
width:220px;
height:220px;
border-radius:50%;
background:conic-gradient(#10b981 0deg, #d1fae5 0deg);
display:flex;
align-items:center;
justify-content:center;
box-shadow:0 10px 30px rgba(0,0,0,0.1);
}

.timer-inner{
width:170px;
height:170px;
border-radius:50%;
background:white;
display:flex;
align-items:center;
justify-content:center;
font-size:36px;
font-weight:bold;
color:#059669;
}

</style>

</head>

<body class="bg-gradient-to-br from-green-100 via-emerald-100 to-green-200 min-h-screen">

<!-- BACKGROUND LEAF -->

<div class="absolute top-20 left-20 text-6xl leaf">🍃</div>
<div class="absolute bottom-20 right-32 text-5xl leaf">🍃</div>
<div class="absolute top-40 right-10 text-4xl leaf">🍃</div>

<!-- NAVBAR -->

<header class="bg-gradient-to-r from-emerald-600 to-green-500 shadow-lg">

<div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center text-white">

<div class="flex items-center gap-2">
<span class="text-2xl animate-pulse">💚</span>
<h1 class="text-xl font-bold">Healducat</h1>
</div>

<nav class="flex gap-8 font-medium">

<a href="{{ route('dashboard') }}">Dashboard</a>
<a href="{{ route('tasks.index') }}">Tugas</a>
<a href="{{ route('study.start') }}">Timer</a>

<a href="{{ route('break.random') }}" class="border-b-2 border-white pb-1">
Break Time
</a>

<a href="{{ route('progress') }}">Progress</a>

</nav>

<form method="POST" action="/logout">
@csrf
<button class="bg-white text-emerald-600 px-4 py-1 rounded-lg font-semibold hover:scale-105 transition">
Logout
</button>
</form>

</div>

</header>

<!-- MAIN -->

<div class="max-w-4xl mx-auto py-16 text-center space-y-10">

<h2 class="text-4xl font-bold text-gray-800">
🌿 Waktu Istirahat
</h2>

<p class="text-gray-500">
Tarik napas perlahan dan rilekskan pikiran sebelum kembali belajar.
</p>

<!-- CIRCULAR TIMER -->

<div class="flex justify-center">

<div class="timer-circle breathing" id="timerCircle">

<div class="timer-inner">

<span id="breakTimer">00:00</span>

</div>

</div>

</div>

<!-- TIPS -->

<div class="grid md:grid-cols-3 gap-6 mt-10">

<div class="bg-white p-5 rounded-xl shadow hover:scale-105 transition">
🧘<br>
Regangkan tubuh
</div>

<div class="bg-white p-5 rounded-xl shadow hover:scale-105 transition">
🌬<br>
Tarik napas dalam
</div>

<div class="bg-white p-5 rounded-xl shadow hover:scale-105 transition">
💧<br>
Minum air putih
</div>

</div>

<!-- BUTTON -->

<div class="mt-10">

<button onclick="startBreak()"
class="bg-emerald-500 text-white px-8 py-3 rounded-xl shadow hover:bg-emerald-600 hover:scale-105 transition">

Mulai Istirahat

</button>

<a href="{{ route('study.start') }}"
class="block mt-3 text-gray-600 hover:text-emerald-600">

Kembali Belajar

</a>

</div>

</div>

<!-- TIMER SCRIPT -->

<script>

/* ambil break time dari timer */

const params = new URLSearchParams(window.location.search);

let breakTime = params.get("time")
? parseInt(params.get("time"))
: 300;

let originalBreak = breakTime;

let interval = null;

function updateDisplay(){

let minutes = Math.floor(breakTime / 60);
let seconds = breakTime % 60;

document.getElementById("breakTimer").innerText =
minutes + ":" + (seconds < 10 ? "0" : "") + seconds;

let progress = (originalBreak - breakTime) / originalBreak * 360;

document.getElementById("timerCircle").style.background =
`conic-gradient(#10b981 ${progress}deg, #d1fae5 ${progress}deg)`;

}

function startBreak(){

if(interval) return;

interval = setInterval(function(){

if(breakTime > 0){

breakTime--;
updateDisplay();

}else{

clearInterval(interval);

alert("Istirahat selesai! Saatnya kembali fokus 🚀");

window.location.href = "{{ route('study.start') }}";

}

},1000);

}

updateDisplay();

</script>

</body>
</html>
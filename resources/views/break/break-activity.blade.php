<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Break Time - Healducat</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>

@keyframes leafMove{
0%{transform:translateY(0px);}
50%{transform:translateY(-20px);}
100%{transform:translateY(0px);}
}

.leaf{
animation:leafMove 6s ease-in-out infinite;
opacity:0.2;
}

@keyframes breathe{
0%{transform:scale(0.9);}
50%{transform:scale(1.1);}
100%{transform:scale(0.9);}
}

.breathing{
animation:breathe 4s ease-in-out infinite;
}

.timer-circle{
width:180px;
height:180px;
border-radius:50%;
background:conic-gradient(#10b981 0deg, #d1fae5 0deg);
display:flex;
align-items:center;
justify-content:center;
box-shadow:0 10px 30px rgba(0,0,0,0.1);
}

.timer-inner{
width:130px;
height:130px;
border-radius:50%;
background:white;
display:flex;
align-items:center;
justify-content:center;
font-size:28px;
font-weight:bold;
color:#059669;
}

/* tablet */
@media(min-width:768px){
.timer-circle{
width:220px;
height:220px;
}
.timer-inner{
width:170px;
height:170px;
font-size:36px;
}
}

</style>

</head>

<body class="bg-gradient-to-br from-green-100 via-emerald-100 to-green-200 min-h-screen overflow-x-hidden">

<!-- LEAF BG -->
<div class="absolute top-20 left-10 md:left-20 text-4xl md:text-6xl leaf">🍃</div>
<div class="absolute bottom-20 right-10 md:right-32 text-3xl md:text-5xl leaf">🍃</div>
<div class="absolute top-40 right-5 md:right-10 text-3xl md:text-4xl leaf">🍃</div>

<!-- NAVBAR -->
<header class="bg-gradient-to-r from-emerald-600 to-green-500 shadow-lg">

<div class="max-w-7xl mx-auto px-4 md:px-8 py-3 flex flex-wrap gap-3 justify-between items-center text-white">

<div class="flex items-center gap-2">
<span class="text-xl md:text-2xl animate-pulse">💚</span>
<h1 class="text-lg md:text-xl font-bold">Healducat</h1>
</div>

<nav class="flex flex-wrap gap-3 md:gap-6 text-sm md:text-base font-medium">
<a href="{{ route('dashboard') }}">Dashboard</a>
<a href="{{ route('tasks.index') }}">Tugas</a>
<a href="{{ route('study.start') }}">Timer</a>
<a href="{{ route('break.random') }}" class="border-b-2 border-white pb-1">Break</a>
<a href="{{ route('progress') }}">Progress</a>
</nav>

<form method="POST" action="/logout">
@csrf
<button class="bg-white text-emerald-600 px-3 py-1 rounded-lg text-sm font-semibold">
Logout
</button>
</form>

</div>

</header>

<!-- MAIN -->
<div class="max-w-4xl mx-auto px-4 md:px-8 py-10 md:py-16 text-center space-y-8">

<h2 class="text-2xl md:text-4xl font-bold text-gray-800">
🌿 Waktu Istirahat
</h2>

<p class="text-gray-500 text-sm md:text-base max-w-md mx-auto">
Tarik napas perlahan dan rilekskan pikiran sebelum kembali belajar.
</p>

<!-- TIMER -->
<div class="flex justify-center">

<div class="timer-circle breathing" id="timerCircle">
<div class="timer-inner">
<span id="breakTimer">00:00</span>
</div>
</div>

</div>

<!-- TIPS -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6 mt-6">

<div class="bg-white p-4 md:p-5 rounded-xl shadow hover:scale-105 transition text-sm md:text-base">
🧘<br>Regangkan tubuh
</div>

<div class="bg-white p-4 md:p-5 rounded-xl shadow hover:scale-105 transition text-sm md:text-base">
🌬<br>Tarik napas dalam
</div>

<div class="bg-white p-4 md:p-5 rounded-xl shadow hover:scale-105 transition text-sm md:text-base">
💧<br>Minum air putih
</div>

</div>

<!-- BUTTON -->
<div class="mt-6 flex flex-col items-center gap-3">

<button onclick="startBreak()"
class="bg-emerald-500 text-white px-6 md:px-8 py-3 rounded-xl shadow hover:bg-emerald-600 hover:scale-105 transition w-full sm:w-auto">
Mulai Istirahat
</button>

<a href="{{ route('study.start') }}"
class="text-gray-600 hover:text-emerald-600 text-sm">
Kembali Belajar
</a>

</div>

</div>

<script>

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
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Istirahat - Healducat</title>

<script src="https://cdn.tailwindcss.com"></script>

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

<a href="/dashboard" class="hover:opacity-80">Dashboard</a>
<a href="/tasks" class="hover:opacity-80">Tugas</a>
<a href="/study" class="hover:opacity-80">Timer</a>
<a href="/break" class="border-b-2 border-white pb-1">Istirahat</a>
<a href="#">Progress</a>

</nav>

<form method="POST" action="/logout">
@csrf
<button class="bg-white text-emerald-600 px-4 py-1 rounded-lg font-semibold hover:bg-gray-100">
Logout
</button>
</form>

</div>

</header>


<!-- MAIN -->
<div class="max-w-6xl mx-auto px-8 py-12">

<div class="bg-white rounded-3xl shadow-xl p-10 grid md:grid-cols-2 items-center gap-10">

<!-- LEFT -->
<div>

<h2 class="text-3xl font-bold text-gray-800 mb-3">
Saatnya Istirahat 🌿
</h2>

<p class="text-gray-500 mb-6">
Istirahat sejenak untuk menyegarkan pikiran sebelum kembali fokus belajar.
</p>

<h3 class="text-lg font-semibold text-gray-700 mb-4">
Tips Istirahat Sehat
</h3>

<ul class="space-y-3 text-gray-600">

<li class="flex items-center gap-2">
<span class="text-green-500 text-lg">✔</span>
Regangkan tubuh
</li>

<li class="flex items-center gap-2">
<span class="text-green-500 text-lg">✔</span>
Latihan pernapasan
</li>

<li class="flex items-center gap-2">
<span class="text-green-500 text-lg">✔</span>
Minum air putih
</li>

</ul>


<!-- TIMER -->
<div class="mt-8">

<div id="breakTimer" class="text-5xl font-bold text-emerald-600 mb-6">
5:00
</div>

<button onclick="startBreak()"
class="bg-emerald-500 text-white px-6 py-3 rounded-xl shadow hover:bg-emerald-600 transition">
Mulai Istirahat
</button>

<a href="/study"
class="ml-4 text-gray-500 hover:text-emerald-600 font-medium">
Kembali Belajar
</a>

</div>

</div>


<!-- RIGHT IMAGE -->
<div class="flex justify-center">

<img 
src="https://cdn-icons-png.flaticon.com/512/4327/4327496.png"
class="w-[260px] md:w-[300px]">

</div>

</div>

</div>


<!-- TIMER SCRIPT -->
<script>

let breakTime = 300;
let interval = null;

function updateDisplay(){

let minutes = Math.floor(breakTime / 60);
let seconds = breakTime % 60;

document.getElementById("breakTimer").innerText =
minutes + ":" + (seconds < 10 ? "0" : "") + seconds;

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

window.location.href = "/study";

}

},1000);

}

updateDisplay();

</script>

</body>
</html>
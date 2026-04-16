<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Focus Timer - Healducat</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>

/* animated background */

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


/* breathing animation */

@keyframes breathe{
0%{transform:scale(0.95);}
50%{transform:scale(1.05);}
100%{transform:scale(0.95);}
}

.breathing{
animation:breathe 4s ease-in-out infinite;
}


/* glow */

.glow{
box-shadow:0 0 35px rgba(16,185,129,0.6);
}


/* pulse ring */

@keyframes pulseRing{
0%{
transform:scale(1);
opacity:0.6;
}
100%{
transform:scale(1.4);
opacity:0;
}
}

.pulse-ring{
position:absolute;
width:320px;
height:320px;
border-radius:50%;
border:4px solid rgba(16,185,129,0.4);
animation:pulseRing 3s infinite;
}


/* falling leaves */

@keyframes falling{
0%{
transform:translateY(-50px) rotate(0deg);
opacity:0;
}
50%{opacity:0.6;}
100%{
transform:translateY(110vh) rotate(360deg);
opacity:0;
}
}

.leaf{
position:absolute;
font-size:24px;
animation:falling linear infinite;
}

</style>

</head>



<body class="bg-animate min-h-screen overflow-x-hidden">

<!-- FALLING LEAVES -->

<div class="leaf" style="left:10%; animation-duration:12s;">🍃</div>
<div class="leaf" style="left:25%; animation-duration:14s;">🍃</div>
<div class="leaf" style="left:40%; animation-duration:10s;">🍃</div>
<div class="leaf" style="left:60%; animation-duration:13s;">🍃</div>
<div class="leaf" style="left:80%; animation-duration:11s;">🍃</div>



<!-- NAVBAR -->

<header class="bg-gradient-to-r from-emerald-600 to-green-500 shadow-lg">

<div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center text-white">

<div class="flex items-center gap-2">
<span class="text-2xl animate-pulse">💚</span>
<h1 class="text-xl font-bold">Healducat</h1>
</div>

<nav class="flex gap-8 font-medium">

<a href="/dashboard">Dashboard</a>
<a href="/tasks">Tasks</a>

<a href="/moods" class="border-b-2 border-white pb-1">
Timer
</a>

<a href="/break">Break Time</a>
<a href="/progress">Progress</a>

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

<div class="max-w-4xl mx-auto px-8 py-16 text-center">

<h2 class="text-3xl font-bold text-gray-800 mb-2">
Focus Session
</h2>

<p class="text-gray-500 mb-10">
{{ $task->title ?? 'Study Session' }}
</p>



<!-- SET TIME -->

<div class="mb-10">

<label class="text-gray-600 text-sm">
Set Study Time (minutes)
</label>

<div class="mt-2 flex justify-center gap-3">

<input
type="number"
id="customTime"
class="border rounded-xl px-3 py-2 w-24 text-center shadow"
value="{{ $studyDuration ?? 25 }}"
min="1"
>

<button onclick="setTime()"
class="bg-emerald-500 text-white px-5 py-2 rounded-xl hover:bg-emerald-600 hover:scale-105 transition">

Set

</button>

</div>

</div>



<!-- TIMER -->

<div class="flex justify-center mb-12">

<div class="relative flex items-center justify-center">

<div class="pulse-ring"></div>

<div id="timerCircle"
class="w-72 h-72 rounded-full flex items-center justify-center breathing glow">

<div class="w-56 h-56 bg-white rounded-full flex items-center justify-center shadow-inner">

<span id="timer"
class="text-5xl font-bold text-emerald-600">

00:00

</span>

</div>

</div>

</div>

</div>



<!-- BUTTON -->

<div class="flex justify-center gap-5">

<button onclick="startTimer()"
class="bg-emerald-500 text-white px-7 py-3 rounded-xl hover:scale-105 transition shadow">

Start

</button>

<button onclick="pauseTimer()"
class="bg-yellow-400 text-white px-7 py-3 rounded-xl hover:scale-105 transition shadow">

Pause

</button>

<button onclick="resetTimer()"
class="bg-gray-400 text-white px-7 py-3 rounded-xl hover:scale-105 transition shadow">

Reset

</button>

</div>



<!-- QUOTE -->

<p id="quote"
class="mt-10 text-emerald-700 italic text-lg animate-pulse">
Stay focused. Small progress is still progress.
</p>


</div>



<!-- SCRIPT -->

<script>

let studyDuration = {{ $studyDuration ?? 25 }};
let duration = studyDuration * 60;
let time = duration;
let timerInterval = null;

const quotes = [

"Fokus kecil setiap hari menghasilkan hasil besar.",
"Stay focused and keep learning.",
"Disiplin hari ini, sukses besok.",
"Sedikit demi sedikit menjadi bukit.",
"Belajar hari ini adalah investasi masa depan."

];


function randomQuote(){

let random = Math.floor(Math.random()*quotes.length);
document.getElementById("quote").innerText = quotes[random];

}


function updateDisplay(){

let minutes = Math.floor(time/60);
let seconds = time%60;

document.getElementById("timer").innerText =
minutes + ":" + (seconds<10?"0":"") + seconds;

let progress = (duration-time)/duration*360;

document.getElementById("timerCircle").style.background =
`conic-gradient(#10b981 ${progress}deg,#d1fae5 ${progress}deg)`;

}


function setTime(){

let minutes = document.getElementById("customTime").value;

if(minutes <= 0){
alert("Masukkan waktu yang valid");
return;
}

studyDuration = minutes;
duration = minutes * 60;
time = duration;

updateDisplay();

}


function startTimer(){

if(timerInterval) return;

timerInterval = setInterval(function(){

if(time > 0){

time--;
updateDisplay();

}else{

clearInterval(timerInterval);
timerInterval = null;

/* SMART BREAK SYSTEM */

let breakTime = 300; // default 5 menit

if(studyDuration <= 25){
breakTime = 300;
}
else if(studyDuration <= 50){
breakTime = 480;
}
else if(studyDuration <= 90){
breakTime = 600;
}
else{
breakTime = 900;
}

alert("Session selesai 🎉");

/* kirim waktu break ke halaman break */

window.location.href="/break?time=" + breakTime;

}

},1000);

}


function pauseTimer(){

clearInterval(timerInterval);
timerInterval = null;

}


function resetTimer(){

clearInterval(timerInterval);
timerInterval = null;

time = duration;

updateDisplay();

}

randomQuote();
updateDisplay();

</script>

</body>
</html>
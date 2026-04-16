<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Focus Timer - Healducat</title>

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
<a href="/dashboard" class="hover:opacity-80">Dashboard</a>
<a href="/tasks" class="hover:opacity-80">Tasks</a>
<a href="/moods" class="border-b-2 border-white pb-1">Timer</a>
<a href="/break" class="hover:opacity-80">Break Time</a>
<a href="/progress" class="hover:opacity-80">Progress</a>
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
<div class="max-w-4xl mx-auto px-8 py-12 text-center">

<h2 class="text-2xl font-bold text-gray-700 mb-2">
Focus Session
</h2>

<p class="text-gray-500 mb-6">
{{ $task->title ?? 'Study Session' }}
</p>

<!-- CUSTOM TIME -->
<div class="mb-8">

<label class="text-gray-600 text-sm">
Set Study Time (minutes)
</label>

<div class="mt-2 flex justify-center gap-2">

<input
type="number"
id="customTime"
class="border rounded-lg px-3 py-2 w-24 text-center"
value="{{ $studyDuration ?? 25 }}"
min="1"
>

<button onclick="setTime()"
class="bg-emerald-500 text-white px-4 py-2 rounded-lg hover:bg-emerald-600">
Set
</button>

</div>

</div>

<!-- TIMER -->
<div class="flex justify-center mb-10">

<div class="w-64 h-64 rounded-full border-[12px] border-emerald-500 flex items-center justify-center bg-white shadow-lg">

<span id="timer" class="text-4xl font-bold text-emerald-600">
00:00
</span>

</div>

</div>

<!-- BUTTON -->
<div class="flex justify-center gap-4">

<button onclick="startTimer()"
class="bg-emerald-500 text-white px-6 py-2 rounded-lg hover:bg-emerald-600">
Start
</button>

<button onclick="pauseTimer()"
class="bg-yellow-400 text-white px-6 py-2 rounded-lg hover:bg-yellow-500">
Pause
</button>

<button onclick="resetTimer()"
class="bg-gray-400 text-white px-6 py-2 rounded-lg hover:bg-gray-500">
Reset
</button>

</div>

</div>

<!-- TIMER SCRIPT -->
<script>

let studyDuration = {{ $studyDuration ?? 25 }};
let time = studyDuration * 60;
let timerInterval = null;

function updateDisplay(){

let minutes = Math.floor(time / 60);
let seconds = time % 60;

document.getElementById("timer").innerText =
minutes + ":" + (seconds < 10 ? "0" : "") + seconds;

}

// SET CUSTOM TIME
function setTime(){

let minutes = document.getElementById("customTime").value;

if(minutes <= 0){
alert("Masukkan waktu yang valid");
return;
}

studyDuration = minutes;
time = minutes * 60;

resetTimer();

}

// START TIMER
function startTimer(){

if(timerInterval) return;

timerInterval = setInterval(function(){

if(time > 0){

time--;
updateDisplay();

}else{

clearInterval(timerInterval);
timerInterval = null;

alert("Session selesai 🎉");

window.location.href = "/break";

}

},1000);

}

// PAUSE
function pauseTimer(){

clearInterval(timerInterval);
timerInterval = null;

}

// RESET
function resetTimer(){

clearInterval(timerInterval);
timerInterval = null;

time = studyDuration * 60;

updateDisplay();

}

updateDisplay();

</script>

</body>
</html>
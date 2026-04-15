<!DOCTYPE html>
<html>
<head>
<title>Focus Session</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-emerald-100 to-green-200 min-h-screen flex items-center justify-center">

<div class="bg-white/80 backdrop-blur-lg p-10 rounded-3xl shadow-xl text-center w-[400px]">

<a href="/tasks" class="text-sm text-gray-500 mb-4 block">← Kembali ke Task</a>

<h2 class="text-2xl font-bold mb-2">
{{ $task->title }}
</h2>

<p class="text-gray-500 mb-6">
Fokus dan kerjakan tugasmu 🚀
</p>

<!-- TIMER -->
<div id="timer" class="text-5xl font-bold text-emerald-600 mb-6">
25:00
</div>

<!-- BUTTON -->
<div class="flex justify-center gap-4">

<button onclick="startTimer()" 
class="bg-emerald-500 text-white px-6 py-2 rounded-xl">
Start
</button>

<button onclick="resetTimer()" 
class="bg-gray-300 px-6 py-2 rounded-xl">
Reset
</button>
</div>
</div>
<script>
let time = 1500; // 25 menit
let interval;

function startTimer() {
    interval = setInterval(() => {

        if (time > 0) {
            time--;
            updateDisplay();
        } else {
            clearInterval(interval);

            // 🔥 AUTO COMPLETE TASK
            finishTask();

            alert("Task selesai! 🎉");
            window.location.href = "/tasks";
        }

    }, 1000);
}

function finishTask() {
    fetch("/tasks/{{ $task->id }}/finish", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Content-Type": "application/json"
        }
    });
}

function updateDisplay() {
    let minutes = Math.floor(time / 60);
    let seconds = time % 60;

    document.getElementById("timer").innerText =
        `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
}
</script>

</body>
</html>
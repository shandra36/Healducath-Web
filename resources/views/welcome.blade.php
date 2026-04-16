<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Healducat</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>
body{
background: linear-gradient(135deg, #d1fae5, #bbf7d0);
}
</style>

</head>

<body class="text-gray-800">

<!-- NAVBAR -->
<header class="flex justify-between items-center px-10 py-6 bg-white/60 backdrop-blur-md shadow-sm">

<!-- LOGO -->
<div class="flex items-center gap-3">
<img src="/images/healducat.jpeg" class="w-10 h-10">
<h1 class="text-xl font-bold text-emerald-700">
Healducat
</h1>
</div>

<!-- MENU -->
<nav class="hidden md:flex gap-8 text-gray-600 font-medium">

<a href="/dashboard" class="hover:text-emerald-600">Dashboard</a>
<a href="/tasks" class="hover:text-emerald-600">Tasks</a>
<a href="/study" class="hover:text-emerald-600">Timer</a>
<a href="/break" class="hover:text-emerald-600">Break Time</a>
<a href="#" class="hover:text-emerald-600">Progress</a>

</nav>

<!-- AUTH -->
<div class="flex gap-3">

@guest
<a href="/login" class="text-gray-600 hover:text-emerald-600">Login</a>

<a href="/register"
class="bg-emerald-500 text-white px-5 py-2 rounded-xl shadow hover:bg-emerald-600 transition">
Register
</a>
@endguest

@auth
<form method="POST" action="/logout">
@csrf
<button class="bg-red-500 text-white px-4 py-2 rounded-xl hover:bg-red-600">
Logout
</button>
</form>
@endauth

</div>

</header>

<!-- HERO -->
<section class="max-w-7xl mx-auto grid md:grid-cols-2 items-center px-10 mt-16">

<!-- LEFT -->
<div>

<h1 class="text-5xl font-bold leading-tight mb-6">
Boost Your Study Success <br>
<span class="text-emerald-600">with Healducat</span>
</h1>

<p class="text-gray-600 text-lg mb-8">
Sahabat belajar pintar anti-burnout. Fokus, sehat, dan produktif setiap hari 
</p>

<div class="flex gap-4">

<a href="/register"
class="bg-emerald-500 text-white px-6 py-3 rounded-xl shadow hover:scale-105 transition">
Get Started
</a>

<a href="#features"
class="border px-6 py-3 rounded-xl hover:border-emerald-500 hover:text-emerald-600 transition">
Learn More
</a>

</div>

</div>

<!-- RIGHT -->
<div class="flex justify-center mt-10 md:mt-0">
<img src="https://illustrations.popsy.co/green/studying.svg"
class="w-[420px]">
</div>

</section>

<!-- FEATURES -->
<section id="features" class="mt-24 px-10">

<h2 class="text-3xl font-bold text-center mb-12">
Fitur Utama Healducat 
</h2>

<div class="grid md:grid-cols-4 gap-8 max-w-6xl mx-auto">

<div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition">
<h3 class="text-lg font-semibold text-emerald-600 mb-2">📝 Tasks</h3>
<p class="text-gray-600 text-sm">
Kelola tugas & deadline dengan mudah
</p>
</div>

<div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition">
<h3 class="text-lg font-semibold text-emerald-600 mb-2">⏱ Timer</h3>
<p class="text-gray-600 text-sm">
Fokus belajar dengan sistem timer
</p>
</div>

<div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition">
<h3 class="text-lg font-semibold text-emerald-600 mb-2">🧘 Break</h3>
<p class="text-gray-600 text-sm">
Istirahat sehat biar gak burnout
</p>
</div>

<div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition">
<h3 class="text-lg font-semibold text-emerald-600 mb-2">📊 Progress</h3>
<p class="text-gray-600 text-sm">
Pantau perkembangan belajar kamu
</p>
</div>

</div>

</section>

<!-- CTA -->
<section class="text-center mt-24 mb-20">

<h2 class="text-3xl font-bold mb-4">
Mulai Belajar Lebih Produktif Hari Ini
</h2>

<p class="text-gray-600 mb-6">
Healducat bantu kamu fokus tanpa burnout 💚
</p>

<a href="/register"
class="bg-emerald-500 text-white px-8 py-4 rounded-xl shadow hover:scale-105 transition">
Mulai Sekarang
</a>

</section>

<!-- FOOTER -->
<footer class="text-center text-gray-400 pb-10">
© {{ date('Y') }} Healducat
</footer>

</body>
</html>
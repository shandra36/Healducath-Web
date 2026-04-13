<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Healducat</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>
body{
background:
radial-gradient(circle at 10% 20%, #d1fae5 0%, transparent 40%),
radial-gradient(circle at 90% 80%, #bbf7d0 0%, transparent 40%);
}
</style>

</head>

<body class="text-gray-800">

<!-- NAVBAR -->
<header class="w-full absolute top-0 z-50">
<div class="max-w-7xl mx-auto px-8 py-6 flex justify-between items-center">

<h1 class="text-2xl font-bold text-emerald-600">
Healducat
</h1>

<nav class="hidden md:flex gap-10 text-sm font-medium text-gray-600">
<a href="#features" class="hover:text-emerald-600">Features</a>
<a href="#how" class="hover:text-emerald-600">How it works</a>
</nav>

<div class="flex gap-4 items-center">

@guest
<a href="/login" class="text-gray-600 hover:text-emerald-600 text-sm font-medium">
Login
</a>

<a href="/register"
class="bg-emerald-500 text-white px-6 py-2 rounded-xl shadow-lg hover:bg-emerald-600 transition">
Register
</a>
@endguest

@auth
<a href="/dashboard"
class="bg-emerald-500 text-white px-6 py-2 rounded-xl shadow-lg hover:bg-emerald-600 transition">
Dashboard
</a>
@endauth

</div>

</div>
</header>

<!-- HERO -->
<section class="min-h-screen flex items-center justify-center px-6">

<div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-16 items-center">

<div>

<h1 class="text-5xl md:text-6xl font-bold leading-tight mb-6">
Focus Better<br>
<span class="text-emerald-600">
Study Healthier
</span>
</h1>

<p class="text-lg text-gray-600 mb-8">
Healducat membantu kamu belajar lebih fokus
tanpa mengorbankan kesehatan mental dan fisik.
Belajar jadi lebih produktif, terstruktur,
dan tetap sehat.
</p>

<div class="flex gap-4">

@auth
<a href="/dashboard"
class="bg-emerald-500 text-white px-8 py-4 rounded-xl font-semibold shadow-lg hover:scale-105 transition">
Start Studying
</a>
@endauth

@guest
<a href="/login"
class="bg-emerald-500 text-white px-8 py-4 rounded-xl font-semibold shadow-lg hover:scale-105 transition">
Start Studying
</a>
@endguest

<a href="#features"
class="border border-gray-300 px-8 py-4 rounded-xl hover:border-emerald-500 hover:text-emerald-600 transition">
Explore
</a>

</div>

</div>

<!-- MOCKUP -->
<div class="bg-white/70 backdrop-blur-xl p-10 rounded-3xl shadow-2xl border border-white">

<div class="text-sm text-gray-400 mb-2">
Current Session
</div>

<div class="text-4xl font-bold mb-6 text-emerald-600">
25:00
</div>

<div class="space-y-4">

<div class="bg-emerald-100 h-3 rounded-full">
<div class="bg-emerald-500 h-3 rounded-full w-2/3"></div>
</div>

<div class="flex justify-between text-sm text-gray-500">
<span>Focus</span>
<span>Break Soon</span>
</div>

</div>

</div>

</div>
</section>

<!-- FEATURES -->
<section id="features" class="py-28">

<div class="max-w-7xl mx-auto px-6">

<h2 class="text-4xl font-bold text-center mb-20">
Features
</h2>

<div class="grid md:grid-cols-3 gap-10">

<div class="bg-white p-10 rounded-2xl shadow-lg hover:shadow-2xl transition">
<div class="text-3xl mb-4">⏱</div>
<h3 class="text-xl font-semibold mb-2">Focus Timer</h3>
<p class="text-gray-600">
Belajar dengan sistem fokus seperti pomodoro agar lebih produktif.
</p>
</div>

<div class="bg-white p-10 rounded-2xl shadow-lg hover:shadow-2xl transition">
<div class="text-3xl mb-4">🧘</div>
<h3 class="text-xl font-semibold mb-2">Healthy Break</h3>
<p class="text-gray-600">
Pengingat untuk istirahat dan aktivitas ringan agar tubuh tetap sehat.
</p>
</div>

<div class="bg-white p-10 rounded-2xl shadow-lg hover:shadow-2xl transition">
<div class="text-3xl mb-4">📊</div>
<h3 class="text-xl font-semibold mb-2">Progress Tracking</h3>
<p class="text-gray-600">
Pantau perkembangan belajar kamu setiap hari.
</p>
</div>

</div>
</div>
</section>

<!-- HOW IT WORKS -->
<section id="how" class="py-28 bg-white">

<div class="max-w-6xl mx-auto px-6 text-center">

<h2 class="text-4xl font-bold mb-16">
How it Works
</h2>

<div class="grid md:grid-cols-3 gap-10">

<div>
<div class="text-4xl mb-4">1</div>
<h3 class="font-semibold text-lg mb-2">Start Session</h3>
<p class="text-gray-600">Mulai sesi belajar fokus.</p>
</div>

<div>
<div class="text-4xl mb-4">2</div>
<h3 class="font-semibold text-lg mb-2">Take Break</h3>
<p class="text-gray-600">Istirahat sehat saat timer selesai.</p>
</div>

<div>
<div class="text-4xl mb-4">3</div>
<h3 class="font-semibold text-lg mb-2">Track Progress</h3>
<p class="text-gray-600">Lihat perkembangan belajar kamu.</p>
</div>

</div>

</div>
</section>

<!-- CTA -->
<section class="py-28 text-center">

<h2 class="text-4xl font-bold mb-6">
Ready to Study Smarter?
</h2>

<p class="text-gray-600 mb-10">
Mulai perjalanan belajar sehatmu sekarang.
</p>

@auth
<a href="/dashboard"
class="bg-emerald-500 text-white px-10 py-4 rounded-xl shadow-xl hover:scale-105 transition">
Start Now
</a>
@endauth

@guest
<a href="/login"
class="bg-emerald-500 text-white px-10 py-4 rounded-xl shadow-xl hover:scale-105 transition">
Start Now
</a>
@endguest

</section>

<!-- FOOTER -->
<footer class="text-center text-gray-400 pb-10">
© {{ date('Y') }} Healducat
</footer>

</body>
</html>
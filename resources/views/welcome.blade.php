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
<header class="w-full fixed top-0 z-50 bg-white/70 backdrop-blur-md">
<div class="max-w-7xl mx-auto px-8 py-5 flex justify-between items-center">

<h1 class="text-xl font-bold text-gray-800">
Heal<span class="text-emerald-600">ducat</span>
</h1>

<div class="flex gap-4 items-center">

@guest
<a href="/login" class="text-gray-600 hover:text-emerald-600 text-sm font-medium">
Login
</a>

<a href="/register"
class="bg-emerald-500 text-white px-6 py-2 rounded-xl shadow hover:bg-emerald-600 transition">
Register
</a>
@endguest

@auth
<a href="/dashboard"
class="bg-emerald-500 text-white px-6 py-2 rounded-xl shadow hover:bg-emerald-600 transition">
Dashboard
</a>
@endauth

</div>

</div>
</header>

<!-- HERO -->
<section class="min-h-screen flex items-center justify-center px-6 pt-24">

<div class="max-w-4xl text-center">

<h1 class="text-5xl md:text-6xl font-bold leading-tight mb-6">
Belajar Lebih Fokus <br>
<span class="text-emerald-600">Tanpa Burnout</span>
</h1>

<p class="text-lg text-gray-600 mb-10 max-w-2xl mx-auto">
Healducat membantu kamu belajar dengan cara yang lebih sehat,
lebih terstruktur, dan tetap menjaga keseimbangan mental.
</p>

<div class="flex justify-center gap-4">

@auth
<a href="/dashboard"
class="bg-emerald-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg hover:scale-105 transition">
Start Studying 🚀
</a>
@endauth

@guest
<a href="/login"
class="bg-emerald-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg hover:scale-105 transition">
Start Studying 🚀
</a>

<a href="/register"
class="border border-gray-300 px-10 py-4 rounded-xl hover:border-emerald-500 hover:text-emerald-600 transition">
Register
</a>
@endguest

</div>

</div>

</section>

<!-- SIMPLE FEATURES -->
<section class="pb-20">

<div class="max-w-5xl mx-auto px-6 grid md:grid-cols-3 gap-8 text-center">

<div>
<div class="text-3xl mb-3">🎯</div>
<h3 class="font-semibold mb-2">Fokus Maksimal</h3>
<p class="text-gray-500 text-sm">Belajar tanpa gangguan</p>
</div>

<div>
<div class="text-3xl mb-3">🧘</div>
<h3 class="font-semibold mb-2">Istirahat Sehat</h3>
<p class="text-gray-500 text-sm">Tetap fresh & tidak burnout</p>
</div>

<div>
<div class="text-3xl mb-3">📊</div>
<h3 class="font-semibold mb-2">Pantau Progress</h3>
<p class="text-gray-500 text-sm">Lihat perkembanganmu</p>
</div>

</div>

</section>

<!-- FOOTER -->
<footer class="text-center text-gray-400 pb-10">
© {{ date('Y') }} Healducat
</footer>

</body>
</html>
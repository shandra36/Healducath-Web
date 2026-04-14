<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Healducat</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-emerald-50">

<div class="bg-white p-10 rounded-2xl shadow-xl w-full max-w-md">

<h2 class="text-2xl font-bold text-center text-emerald-600 mb-6">
Login Healducat
</h2>

<!-- ERROR -->
@if ($errors->any())
<div class="mb-4 text-red-500 text-sm">
    {{ $errors->first() }}
</div>
@endif

<form method="POST" action="/login">
@csrf

<div class="mb-4">
<label class="text-sm text-gray-600">Email</label>
<input type="email" name="email" required
class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-emerald-400">
</div>

<div class="mb-6">
<label class="text-sm text-gray-600">Password</label>
<input type="password" name="password" required
class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-emerald-400">
</div>

<button type="submit"
class="w-full bg-emerald-500 text-white py-2 rounded-lg hover:bg-emerald-600 transition">
Login
</button>

</form>

<div class="flex justify-between text-sm mt-6 text-gray-500">

<a href="/register" class="hover:text-emerald-600">
Register
</a>

<a href="/forgot-password" class="hover:text-emerald-600">
Forgot Password
</a>

</div>

</div>

</body>
</html>
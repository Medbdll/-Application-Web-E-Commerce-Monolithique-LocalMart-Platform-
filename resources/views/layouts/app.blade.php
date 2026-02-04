<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VORTEX | @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;700&family=Inter:wght@400;600&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="flex min-h-screen">
    <x-sidebar />
    <main class="flex-1 ml-64 p-8">
        @yield('content')
    </main>
</body>

</html>
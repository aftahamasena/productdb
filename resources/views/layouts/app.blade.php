<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MyApp')</title>
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-screen">

    <!-- Navbar -->
    @include('partials.navbar')

    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white">
            @include('partials.sidebar')
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8 bg-gray-100">
            @yield('content')
        </main>

    </div>
    <!-- Footer -->
    {{-- @include('partials.footer') --}}

</body>

</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <!-- Include Alpine.js (if not already included) -->
        <script src="//unpkg.com/alpinejs" defer></script>

       <title>@yield('title','Task Management System') </title>
    </head>
    <body class="flex flex-col min-h-screen">
        <header>
            @include('Layouts.navbar')
        </header>
        <!-- Showing This on each Page. -->
        <!-- @section('projectName')  
            <h1 class="text-xl text-center font-bold ml-32 bg-gray-200 py-4">Task Management System</h1>
        @show     -->
        <main class="flex-grow max-h-screen bg-gray-200 @stack('main-class')">
        @yield('main-content')
        </main>
    <footer>
        @include('Layouts.footer')
    </footer>
    <script>
        Livewire.on('loggedOut', function() {
            window.location.href = '/home';
        });
    </script>

    </body>
</html>
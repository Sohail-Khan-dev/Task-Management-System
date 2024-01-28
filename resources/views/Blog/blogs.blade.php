
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Tailwind CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.7/dist/tailwind.min.css" rel="stylesheet">
<!-- Alpine.js CDN for interactivity -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js" integrity="sha384-8ikX2LkoyWJyd7mCsmBc9Uo0R9iB7u4yZ6PYGzj07EmB2luqv6q/WJyz0vfl2owA" crossorigin="anonymous"></script>

</head>
<body>
    
<div x-data="{ open: false }" class="min-h-screen flex flex-col">
  <!-- Header -->
  <div class="bg-blue-900 text-white p-4 flex justify-between items-center">
    <!-- Logo and Title -->
    <div>
      <h1 class="text-xl font-bold">DEVS INC</h1>
      <p class="text-sm">Blog and Articles</p>
      <p class="font-light">Read, Learn, Evolve with insights in Tech.</p>
    </div>

    <!-- Menu Button -->
    <button @click="open = !open" class="focus:outline-none">
      <span x-show="!open">&#9776; <!-- Represents the menu icon --></span>
      <span x-show="open">&times; <!-- Represents the close icon --></span>
    </button>
  </div>

  <!-- Sidebar -->
  <div class="bg-blue-800 text-white w-64 p-6 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out" x-show="open" @click.away="open = false">
    <!-- Menu -->
    <nav>
      <a href="#" class="block py-2.5 px-4 rounded hover:bg-blue-700">Company</a>
      <a href="#" class="block py-2.5 px-4 rounded hover:bg-blue-700">Careers</a>
      <a href="#" class="block py-2.5 px-4 rounded hover:bg-blue-700">Blogs</a>
    </nav>
  </div>

  <!-- Overlay -->
  <div class="bg-black bg-opacity-50 hidden fixed inset-0 z-10" x-show="open"></div>

  <!-- Rest of the page content -->
  <div class="flex-grow p-4">
    <!-- Your content here -->
  </div>
</div>


</body>
</html>

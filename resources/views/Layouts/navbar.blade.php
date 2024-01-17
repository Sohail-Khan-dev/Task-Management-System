<!-- Navbar Container with Alpine.js for toggle functionality -->
<nav class="bg-blue-500 px-4 {{ auth()->check() ? 'py-1' : 'py-4' }} text-white" x-data="{ open: false }">
    <!-- Flex container for the navbar content -->
    <div class="flex items-center justify-between">
        <!-- Left Side: Navigation Links -->
        <div class="flex items-center">
            <!-- Navigation Links (Visible on all screen sizes) -->
            <a href="/" wire:navigate class="text-sm px-4 py-2 leading-none hover:text-blue-200">Home</a>
            <a href="/tasks" wire:navigate class="text-sm px-4 py-2 leading-none hover:text-blue-200">Tasks</a>
            <a href="/users" wire:navigate class="text-sm px-4 py-2 leading-none hover:text-blue-200">Users</a>
            <a href="/aboutus" wire:navigate class="text-sm px-4 py-2 leading-none hover:text-blue-200">About</a>
        </div>

        <!-- Right Side: Auth Buttons & Toggle Button -->
        @if(!auth()->check())
            <div class="flex items-center">
                <!-- Auth Buttons (Visible on all screen sizes, also in dropdown on small screens) -->
                <div :class="{'block': open, 'hidden': !open, 'md:block': true}" class="flex">
                    <a href="/login" wire:navigate class="text-sm px-4 py-2 leading-none border rounded hover:text-blue-500 hover:bg-white">Login</a>
                    <a href="/register" wire:navigate class="text-sm ml-2 px-4 py-2 leading-none border rounded hover:text-blue-500 hover:bg-white">Register</a>
                </div>
                
                <!-- Toggle Button (Visible only on small screens) -->
                <button @click="open = !open" class="md:hidden flex items-center px-3 py-2 border rounded hover:text-blue-200">
                    <svg x-show="!open" class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0zM0 9h20v2H0zM0 15h20v2H0z"></path></svg>
                    <svg x-show="open" class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Close</title><path d="M14.348 14.849a1.002 1.002 0 0 1-1.414 0L10 11.314l-2.934 2.935a1.002 1.002 0 0 1-1.414-1.414l2.935-2.934-2.935-2.935a1.002 1.002 0 0 1 1.414-1.414L10 8.686l2.934-2.935a1.002 1.002 0 1 1 1.414 1.414L11.414 10l2.934 2.935a1.002 1.002 0 0 1 0 1.414z"></path></svg>
                </button>
            @else
                 <!-- User Info and Logout -->
                 <div class="flex items-center space-y-1 flex-col">
                    <span class="text-sm font-medium">{{ auth()->user()->name }}</span>
                    <span class="text-xs bg-blue-700 px-2 py-1 rounded-full">{{ auth()->user()->role }}</span>
                    <a  href="/logout" wire:naviage class="text-sm px-1 py-1 leading-none border rounded hover:text-blue-500 hover:bg-white">Logout</a>
                </div>
             @endif
        </div>
       
    </div>
</nav>

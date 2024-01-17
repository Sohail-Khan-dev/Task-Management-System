<div class="pt-6 pb-48 ">
<h1 class="text-center font-bold text-2xl bg-gray-200 py-4">  Login </h1>
<form wire:submit.prevent="submit" class="max-w-lg mx-auto  px-6 py-8 bg-white shadow-md rounded-lg">
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
            Email
        </label>
        <input id="login" type="login" wire:model="email" placeholder="Email Or Username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('email') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
    </div>

    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            Password
        </label>
        <input id="password" type="password" wire:model="password" placeholder="Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
        @error('password') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
    </div>

    <div class="flex items-center justify-between">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Log in
        </button>
    </div>

    @if (session()->has('error'))
        <span class="text-red-500 text-xs italic">{{ session('error') }}</span>
    @endif
    <!-- Registration Link -->
    <div class="mt-4 text-center">
    <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 text-sm">
        New user ? Register here
    </a>
</div>
</form>

</div>

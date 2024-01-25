
<div class="py-8">
<h1 class="text-center font-bold text-2xl bg-gray-200 py-4">  
    @if($isEditRequest)
        Edit Record
    @else
        User Registration Form
    @endif 
</h1>
<form wire:submit.prevent="{{ $isEditRequest ? 'updateUser' : 'register' }}" class="max-w-lg mx-auto px-6 py-8 bg-white shadow-md rounded-lg">
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Name
        </label>
        <input id="name" type="text" wire:model="name" placeholder="Name" value="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('name') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
            Email Address
        </label>
        <input id="email" type="email" wire:model.change="email" placeholder="Email Address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('email') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            Username
        </label>
        <input id="username" type="text" wire:model.change ="username" placeholder="Username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('username') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
    </div>
    
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="role">
            Role
        </label>
        <select value="role" type="role" wire:model.change ="role" placeholder="role" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="guest">Guest</option>   
            <option value="admin">Admin</option>
            <option value="user">User</option>
            <option value="editor">Editor</option>
        </select>
        @error('role') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            Password
        </label>
        <input id="password" type="password" wire:model.change="password" placeholder="Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
        @error('password') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
    </div>

    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="verifypassword">
            Verify Password
        </label>
        <input id="verifypassword" type="password" wire:model.change="verifypassword" placeholder="Verify Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
        @error('verifypassword') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
    </div>

    <div class="flex items-center justify-between">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            {{$isEditRequest ? "Update" : "Register"}}
     
        </button>
    </div>
</form>
<!-- this is the end of registration form-->
 
</div>

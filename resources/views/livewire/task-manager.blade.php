<div>
    @if($isModalOpen)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50" id="my-modal">
       
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <a wire:click="closeModal" class="text-gray-700 text-3xl absolute right-2 top-3 -mt-5 hover:cursor-pointer ">&times;</a>
        
                <form wire:submit.prevent="{{$isEditMode ? 'update' : 'store'}}" class="space-y-4">
                    <!-- @csrf  This token is required when sending data in laravel --> 
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Title</label>
                        <input wire:model.change="title" type="text" placeholder="Title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }} </p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea wire:model.change="description" rows="3" placeholder="Description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                        @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }} </p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <select wire:model.change="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option value="todo">To Do</option>
                            <option value="inprogress">In Progress</option>
                            <option value="complete">Complete</option>
                        </select>
                        @error('status')<p class="text-red-500 text-xs mt-1">{{ $message }} </p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Assigned User</label>
                        <select wire:model="user_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option value="">Select User</option>
                            <!-- @if($users != null) -->
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            <!-- @endif -->
                        </select>
                        @error('user_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md w-20 shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                            {{ $isEditMode ? 'Update' : 'Save'}}</button>
                    </div>
                </form>
              
            </div>
        </div>
    @endif
    <!-- User Table -->
    <div class="mx-auto px-2 sm:px-8 max-w-fit pb-28">
    @php
        $userRole = auth()->user()->role; // Get the logged-in user's role
    @endphp
        <div class="py-4">
            @if($userRole == 'admin')
            <div class="flex mb-4">
                <button wire:click="createTask" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Add Task
                </button>
            </div>
            @endif
        <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative h-[450px] ">
            <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                <thead>
                    <tr class="text-left z-10">
                        <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 z-10">Title</th>
                        <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 z-10">Description</th>
                        <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 z-10">Status</th>
                        <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 z-10">Assigned User</th>
                        @if($userRole == 'editor' || $userRole == 'admin') 
                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <div wire:key="{{ $task->id }}"> 
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">
                                    <!-- <button wire:click="showTask" wire:navigate class="underline hover:cursor-pointer "> -->
                                    {{ strlen($task->title) > 10 ? substr($task->title,0,10).'...' : $task->title}} </td>
                                <td class="py-2 px-3 border-b border-gray-200">
                                    <button wire:click="showTask({{$task->id}})" wire:naviagate class="underline hover:cursor-pointer truncate max-w-xs"> {{$task->description}} </button> </td>
                                <td class="py-2 px-3 border-b border-gray-200">
                                    @if(strcmp($task->status,'todo')===0)
                                        <span class="bg-blue-200 font-bold justify-center text-blue-800 text-sm px-6 py-1 rounded-full opacity-80">To Do</span>
                                    @elseif( strcmp($task->status,'inprogress') === 0)
                                        <span class="bg-yellow-200 text-yellow-800 font-bold text-sm px-2 py-1 rounded-full opacity-80">In Progress</span>
                                    @elseif(strcmp($task->status,'complete') == 0)
                                        <span class="bg-green-200 font-bold text-sm text-green-800 px-3 py-1 rounded-full opacity-80">Complete</span>
                                    @endif
                                 </td>
                                 <td class="py-2 px-3 border-b border-gray-200 text-center" x-data="{showTooltip: false}">
                                @if($task->user)
                                    @php
                                        $names = explode(' ', $task->user->name);
                                        $initials = '';
                                        foreach ($names as $name) {
                                            $initials .= strtoupper($name[0]);
                                        }
                                    @endphp
                                    <button type="button" wire:click="searchUserTask({{$task->user}})" title="{{ $task->user->name }}">
                                        {{ $initials }}
                                    </button>

                                @else
                                        No User
                                @endif
                                 </td>
                                 @if($userRole == 'editor' || $userRole == 'admin')
                                    <td class="py-2 px-3 border-b border-gray-200">
                                    <button wire:click="edit({{$task->id}})" class="text-sm bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-4 rounded focus:outline-none focus:shadow-outline">Edit</button>
                                    @if($userRole == 'admin')  
                                        <button wire:click="delete({{$task->id}})" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                    @endif
                                    </td>
                                @endif
                            </tr>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if($showDataInModal)
    <div class="fixed inset-0 bg-gray-500 bg-opacity-70 overflow-y-auto h-full w-full z-50" id="my-modal">
        <div class="relative top-20 mx-auto my-auto p-5 border w-2/3  shadow-lg rounded-md bg-white">
            <a wire:click="hideTask" class="text-gray-700 text-3xl absolute right-2 top-3 -mt-5 hover:cursor-pointer ">&times;</a>

            <!-- Task Details Div -->
            <div >
                <h2 class="text-2xl font-bold border-b-2 border-blue-500 font-sans text-gray-800 mb-3">{{ $showtask->title }}</h2>
                <p class="text-gray-600 text-sm mb-4">{{ $showtask->description }}</p>
                <div class="inline-flex items-center px-2 py-1 rounded-full">
                    @if(strcmp($showtask->status,'todo')===0)
                            <span class="bg-blue-200 font-bold justify-center text-blue-800 text-sm px-6 py-1 rounded-full opacity-80">To Do</span>
                        @elseif( strcmp($showtask->status,'inprogress') === 0)
                            <span class="bg-yellow-200 text-yellow-800 font-bold text-sm px-2 py-1 rounded-full opacity-80">In Progress</span>
                        @elseif(strcmp($showtask->status,'complete') == 0)
                            <span class="bg-green-200 font-bold text-sm text-green-800 px-3 py-1 rounded-full opacity-80">Complete</span>
                        @endif
                </div>
            </div>
        </div>
    </div>
@endif
   
</div>
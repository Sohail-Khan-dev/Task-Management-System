<div  class="cursor-pointer w-full md:w-1/2 lg:w-1/3 p-5">
    <a href="http://twizard.io" rel="noopener noreferrer">
    <div class="rounded-lg shadow-md w-80 min-w-64 bg-gray-300">
        <img src="{{ $imageUrl }}" alt="{{ $title }}" class="rounded-xl">
        <div class="p-2 mt-6">
            <div class="flex justify-between items-center mb-6">
                <span class="text-xs text-gray-500 bg-gray-200 px-2 py-1 rounded">Blog | AI</span>
                <span class="text-xs text-gray-500">{{ $readTime }}</span>
            </div>
            <h3 class="text-lg font-semibold mb-6">{{ $title }}</h3>
            <a href="{{ $url }}" target='_blank' class="text-blue-500 hover:text-blue-600 transition duration-300">Read more →</a>
        </div>
    </div>
    </a>
</div>

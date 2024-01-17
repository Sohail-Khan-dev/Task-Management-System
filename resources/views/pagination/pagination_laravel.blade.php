<div class="flex justify-between items-center">
    <div class="text-gray-600 font-semibold bg-gray-100 rounded-md px-2" >
        Showing <span class="font-bold">{{ $paginator->firstItem() }}</span> to <span class="font-bold">{{ $paginator->lastItem() }}</span> of <span class="font-bold">{{ $paginator->total() }}</span> results
    </div>

    <div class="flex justify-center items-center space-x-2 ">
        @if ($paginator->onFirstPage())
            <button class="bg-gray-200 text-gray-900 font-semibold rounded-full w-8 h-8 flex items-center justify-center" disabled>
                <span class="sr-only">Previous</span>
                <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M14.707 15.707a1 1 0 01-1.414 0l-5.657-5.657a1 1 0 010-1.414l5.657-5.657a1 1 0 111.414 1.414L9.172 9.293l5.535 5.535a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="bg-gray-200 text-gray-900 font-semibold rounded-full w-8 h-8 flex items-center justify-center hover:bg-gray-300">
                <span class="sr-only">Previous</span>
                <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M14.707 15.707a1 1 0 01-1.414 0l-5.657-5.657a1 1 0 010-1.414l5.657-5.657a1 1 0 111.414 1.414L9.172 9.293l5.535 5.535a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
            </a>
        @endif
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <button class="bg-gray-200 text-gray-900 font-semibold rounded-full w-8 h-8 flex items-center justify-center" disabled>{{ $page }}</button>
                    @else
                        <a href="{{ $url }}" class="bg-gray-200 text-gray-900 font-semibold rounded-full w-8 h-8 flex items-center justify-center hover:bg-gray-300">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="bg-gray-200 text-gray-900 font-semibold rounded-full w-8 h-8 flex items-center justify-center hover:bg-gray-300">
                <span class="sr-only">Next</span>
                <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 4.293a1 1 0 011.414 0l5.657 5.657a1 1 0 010 1.414l-5.657 5.657a1 1 0 11-1.414-1.414L10.828 10l-5.535-5.535a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
        @else
            <button class="bg-gray-200 text-gray-900 font-semibold rounded-full w-8 h-8 flex items-center justify-center" disabled>
                <span class="sr-only">Next</span>
                <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 4.293a1 1 0 011.414 0l5.657 5.657a1 1 0 010 1.414l-5.657 5.657a1 1 0 11-1.414-1.414L10.828 10l-5.535-5.535a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            @endif
    </div>
</div>
@if ($paginator->hasPages())
    <div class="p-4 border-t border-gray-900 flex justify-between items-center text-xs text-gray-500">
        <span class="mr-3">Showing {{ $paginator->firstItem() }}-{{ $paginator->lastItem() }} of {{ $paginator->total() }} products</span>
        <div class="flex gap-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button disabled class="px-3 py-1 bg-gray-900 rounded text-gray-600 cursor-not-allowed">Prev</button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" 
                   class="px-3 py-1 bg-gray-900 rounded hover:text-white transition-colors duration-300"
                   rel="prev">Prev</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button class="px-3 py-1 bg-[#39FF14] text-black font-bold rounded">{{ $page }}</button>
                        @else
                            <a href="{{ $url }}" 
                               class="px-3 py-1 bg-gray-900 rounded hover:text-white transition-colors duration-300">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" 
                   class="px-3 py-1 bg-gray-900 rounded hover:text-white transition-colors duration-300"
                   rel="next">Next</a>
            @else
                <button disabled class="px-3 py-1 bg-gray-900 rounded text-gray-600 cursor-not-allowed">Next</button>
            @endif
        </div>
    </div>
@endif

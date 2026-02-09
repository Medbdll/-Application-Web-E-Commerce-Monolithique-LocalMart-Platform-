@if ($paginator->hasPages())
    <div class="p-4 border-t border-gray-900 flex justify-between items-center text-xs text-gray-500">
        <span>Showing {{ $paginator->firstItem() }}-{{ $paginator->lastItem() }} of {{ $paginator->total() }} products</span>
        <div class="flex gap-1">
            @if ($paginator->onFirstPage())
                <button disabled class="px-3 py-1 bg-gray-900 rounded text-gray-600 cursor-not-allowed">Prev</button>
            @else
                <button wire:click="previousPage" class="px-3 py-1 bg-gray-900 rounded hover:text-white">Prev</button>
            @endif

            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button class="px-3 py-1 bg-[#39FF14] text-black font-bold rounded">{{ $page }}</button>
                        @else
                            <button wire:click="gotoPage({{ $page }})" class="px-3 py-1 bg-gray-900 rounded hover:text-white">{{ $page }}</button>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <button wire:click="nextPage" class="px-3 py-1 bg-gray-900 rounded hover:text-white">Next</button>
            @else
                <button disabled class="px-3 py-1 bg-gray-900 rounded text-gray-600 cursor-not-allowed">Next</button>
            @endif
        </div>
    </div>
@endif

@php
    $currentPage = $paginator->currentPage();
    $lastPage = $paginator->lastPage();
    $start = max(1, $currentPage - 2);
    $end = min($lastPage, $currentPage + 2);
@endphp

{{-- First page and ellipsis --}}
@if ($start > 1)
    <a href="{{ $paginator->url(1) }}" 
       class="px-3 py-1 text-gray-400 hover:text-vortexGreen hover:bg-gray-800 text-xs font-sci-fi uppercase transition-all rounded">
        1
    </a>
    @if ($start > 2)
        <span class="px-3 py-1 text-gray-600 text-xs">...</span>
    @endif
@endif

{{-- Page numbers --}}
@for ($i = $start; $i <= $end; $i++)
    @if ($i == $currentPage)
        <span class="px-3 py-1 bg-vortexGreen text-black text-xs font-sci-fi uppercase rounded">
            {{ $i }}
        </span>
    @else
        <a href="{{ $paginator->url($i) }}" 
           class="px-3 py-1 text-gray-400 hover:text-vortexGreen hover:bg-gray-800 text-xs font-sci-fi uppercase transition-all rounded">
            {{ $i }}
        </a>
    @endif
@endfor

{{-- Last page and ellipsis --}}
@if ($end < $lastPage)
    @if ($end < $lastPage - 1)
        <span class="px-3 py-1 text-gray-600 text-xs">...</span>
    @endif
    <a href="{{ $paginator->url($lastPage) }}" 
       class="px-3 py-1 text-gray-400 hover:text-vortexGreen hover:bg-gray-800 text-xs font-sci-fi uppercase transition-all rounded">
        {{ $lastPage }}
    </a>
@endif

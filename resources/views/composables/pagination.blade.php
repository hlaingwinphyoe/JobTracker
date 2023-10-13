<!-- component -->
@if ($paginator->hasPages())
<div class="flex items-center justify-center py-5 lg:px-0 sm:px-6 px-4">    
    <div class="w-full flex items-center justify-between border-t-2 border-gray-200">
        @if ($paginator->onFirstPage())
        <div class="flex items-center pt-3 text-gray-400 pointer-events-none" disabled>
            <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.1665 4H12.8332" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M1.1665 4L4.49984 7.33333" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M1.1665 4.00002L4.49984 0.666687" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p class="text-sm ml-3 font-medium leading-none ">Previous</p>           
        </div>
        @else
        <div class="flex items-center pt-3 text-gray-600 hover:text-tertiary-500 cursor-pointer">
            <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.1665 4H12.8332" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M1.1665 4L4.49984 7.33333" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M1.1665 4.00002L4.49984 0.666687" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            
            <p class="text-sm ml-3 font-medium leading-none "><a href="{{ $paginator->previousPageUrl() }}">Previous</a></p>             
        </div>
        @endif
        @foreach ($elements as $element)
        <div class="sm:flex hidden">
            @if (is_string($element))
                <p disabled aria-disabled="true"><span>{{ $element }}</span></p>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="javascript:void(0)" class="text-sm font-medium leading-none cursor-pointer text-tertiary-500 border-t-2 border-tertiary-500 pt-3 mr-4 px-2">
                            {{ $page }}
                        </a>
                    @else
                        <a href="{{ $url }}" class="text-sm font-medium leading-none cursor-pointer text-gray-600 hover:text-tertiary-500 border-t-2 border-transparent hover:border-tertiary-500 pt-3 mr-4 px-2">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        </div>
        @endforeach

        @if ($paginator->hasMorePages())
        <div class="flex items-center pt-3 text-gray-600 hover:text-tertiary-500 cursor-pointer">
            <p class="text-sm font-medium leading-none mr-3"><a href="{{ $paginator->nextPageUrl() }}">Next</a></p>
            <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.1665 4H12.8332" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9.5 7.33333L12.8333 4" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9.5 0.666687L12.8333 4.00002" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        @else
        <div class="flex items-center pt-3 text-gray-400 pointer-events-none" disabled>
            <p class="text-sm font-medium leading-none mr-3">Next</p>
            <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.1665 4H12.8332" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9.5 7.33333L12.8333 4" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9.5 0.666687L12.8333 4.00002" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        @endif
    </div>
</div>
{{-- <p class="grey-text mT-10">Showing page <span class="fw-bold">{{ $paginator->currentPage() }}</span> of total <span class="fw-bold">{{ $paginator->lastPage() }}</span> page(s).</p> --}}
@endif
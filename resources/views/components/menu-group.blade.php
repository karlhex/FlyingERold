<div x-data="{ open: false }">
    <li>
        <div @click="open = ! open" class="bg-white hover:bg-blue-50 transition-colors duration-100 text-blue-800 flex items-end py-3 px-4 space-x-2 rounded-lg font-bold">
            @isset($itempic)
            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                {{ $itempic }}
            </svg>
            @endisset
            <div>
                <span class="flex-1" >
                    {{ $groupname  }}
                </span>
            </div>
            @if($counter)
                <span class="bg-red-500 text-white text-xs w-5 h-5 rounded-full inline-flex items-center justify-center">
                    {{ $counter }}
                </span>
            @endif
            <span class="flex justify-right">
            <svg class="ml-2 -mr-0.5 h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
            </span>
        </div>
        <div x-show="open"
             >
        <ul class="text-base pt-2 space-y-3">
            {{ $slot }}
        </ul>
        </div>
    </li>
</div>

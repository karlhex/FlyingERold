
          <li>
            <a href="{{ $route }}" class="{{ (url()->current() == $route) ? 'bg-blue-50' : 'bg-white' }} hover:bg-blue-50 transition-colors duration-100 text-blue-800 flex items-end py-3 px-4 space-x-2 rounded-lg font-bold">
            @isset($itempic)
              <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                {{ $itempic }}
              </svg>
            @endisset
              <span class="flex-1">
                {{ $itemname  }}
              </span>
            @if($counter)
              <span class="bg-red-500 text-white text-xs w-5 h-5 rounded-full inline-flex items-center justify-center">
                {{ $counter }}
              </span>
            @endif
            </a>
          </li>

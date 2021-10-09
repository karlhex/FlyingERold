          <li class='w-full'>
            <a href="{{ $route }}" class="{{ (url()->current() == $route) ? 'bg-blue-50' : 'bg-white' }} flex hover:bg-blue-100 transition-colors duration-100 text-blue-800 flex items-end py-1 px-2 space-x-1 rounded-lg font-bold">
              <span class="w-6 h-6 text-blue-600">
              </span>
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

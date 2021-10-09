  <div class="bg-blue-900 py-2 px-4 flex items-center justify-between lg:hidden text-blue-100">
    <button id="menuToggle">
      <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
      </svg>
    </button>
        <div class="flex-shrink-0 flex items-center">
            <a href="{{ route('dashboard') }}">
                <x-flying-mark class="block h-24 w-full justify-center flex" />
            </a>
        </div>
    <button
      class="flex flex-row items-center justify-center xl:justify-start space-x-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
      <span class="font-bold text-blue-100 text-xs">Abigail Wallace</span>
      <img src="images/user.jpg" alt="Abigail Wallace" class="w-10 h-10 rounded-full">
    </button>
  </div>

  {{-- sidebar --}}
  <div id="menu" class="bg-white w-54 xl:w-64 2xl:w-80 px-4 lg:px-6 xl:px-8 py-4 lg:py-6 sticky top-0 hidden lg:flex flex-col shadow-inner h-screen border-l-8 border-blue-900 z-10">

    {{--  menu and logo --}}
    <div class="flex-1 py-4">
        <div class="flex-shrink-0 flex items-center w-full">
            <a href="{{ route('dashboard') }}">
                <x-flying-mark class="h-24 w-auto items-center flex" />
            </a>
        </div>
      <nav class="md:mt-8 -mx-2">
        <ul class="text-base pt-2 space-y-3">
            <x-menu-item route="{{ route('dashboard') }}" itemname="{{ __('Dashboard') }}"  >
                <x-slot name="itempic">
                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                </x-slot>
            </x-menu-item>

            <x-menu-item route="{{ route('frame',['frame'=>'manage-employees']) }}" itemname="{{ __('EmployeeN') }}"  >
                <x-slot name="itempic">
                    <path d="M18,2H6C4.895,2,4,2.895,4,4v16c0,1.105,0.895,2,2,2h12c1.105,0,2-0.895,2-2V4C20,2.895,19.105,2,18,2z M12,6 c1.7,0,3,1.3,3,3s-1.3,3-3,3s-3-1.3-3-3S10.3,6,12,6z M17,18H7c0,0,0-0.585,0-1c0-1.571,2.512-3,5-3s5,1.429,5,3 C17,17.415,17,18,17,18z"></path>
                </x-slot>
            </x-menu-item>
            <x-menu-item route="{{ route('frame',['frame' => 'manage-contracts'] ) }}" itemname="{{ __('Contract') }}"  >
                <x-slot name="itempic">
                    <path d="M14,2H6C4.9,2,4,2.9,4,4v16c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V8L14,2z M16,18H8v-2h8V18z M16,14H8v-2h8V14z M13,9V3.5 L18.5,9H13z"></path>
                </x-slot>
            </x-menu-item>
            <x-menu-item route="{{ route('frame',[ 'frame' =>'manage-projects']) }}" itemname="{{ __('Project') }}"  >
                <x-slot name="itempic">
                    <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path>
                </x-slot>
            </x-menu-item>
            <x-menu-item route="{{ route('frame',[ 'frame' =>'manage-reimbursement']) }}" itemname="{{ __('Reimbursement') }}"  >
                <x-slot name="itempic">
                    <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path>
                </x-slot>
            </x-menu-item>
            <x-menu-item route="#" itemname="{{ __('Balance') }}"  >
                <x-slot name="itempic">
                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                </x-slot>
            </x-menu-item>


            <x-menu-group groupname="{{ __('Setting') }}" >
                <x-slot name='itempic'>
                    <path fill-rule="evenodd"
                          d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                          clip-rule="evenodd"></path>
                </x-slot>
                <x-sub-menu-item route="{{ route('frame',['frame' => 'manage-company']) }}" itemname="{{ __('Company') }}"  >
                </x-sub-menu-item>
                <x-sub-menu-item route="{{ route('frame',['frame' => 'manage-people']) }}" itemname="{{ __('Person') }}"  >
                </x-sub-menu-item>
                <x-sub-menu-item route="{{ route('frame', ['frame' => 'manage-option']) }}" itemname="{{ __('Option') }}"  >
                </x-sub-menu-item>
                <x-sub-menu-item route="{{ route('frame',['frame' => 'manage-sid']) }}" itemname="{{ __('Sid') }}"  >
                </x-sub-menu-item>
                <x-sub-menu-item route="{{ route('frame',['frame' => 'manage-product-info']) }}" itemname="{{ __('ProductInfo') }}"  >
                </x-sub-menu-item>

            </x-menu-group>

        </ul>
      </nav>
    </div>
    <!--/ menu and logo -->

    <!-- profile link -->
    <!--/ profile link -->

  </div>
  <!--/ sidebar -->

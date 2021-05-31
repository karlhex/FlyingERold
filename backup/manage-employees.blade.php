<div class="p-6">
    <div class='flex items-center justify-end px-4 py-3 text-right sm:px-6'>
        <x-jet-button wire:click="createShowModal">
            {{ __('Create') }}
        </x-jet-button>
    </div>

    <div class="flex flex-col">
        <div class="=my-2 overfow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-200 border">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __("employee.Name")  }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __("employee.Department")  }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __("employee.Role")  }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if ($data->count() )
                            @foreach ($data as $item)
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->name  }}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->department  }}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->role  }}</td>
                                    <td class="px-6 py-4 text-right text-sm">
                                        <x-jet-button wire:click="updateShowModal({{ $item->id }})">
                                            {{ __('Update')  }}
                                        </x-jet-button>
                                        <x-jet-danger-button wire:click="deleteShowModal({{ $item->id }})">
                                            {{ __('Delete')  }}
                                        </x-jet-danger-button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">No results found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{ $data->links() }}

    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible" maxWidth="2xl" >
        <x-slot name="title">
            {{ __('Save Page') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('employee.Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='name' />
                @error('name') <span class='error'> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="national_id" value="{{ __('employee.National_ID') }}" />
                <x-jet-input id="national_id" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='national_id' />
                @error('national_id') <span class='error'> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="title" value="{{ __('employee.Address') }}" />
                <x-jet-input id="address" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='address' />
                @error('address') <span class='error'> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4 grid grid-cols-3">
                <div>
                    <x-jet-label for="department" value="{{ __('employee.Department') }}" />
                    <x-jet-input id="department" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='department' />
                    @error('department') <span class='error'> {{ $message }} </span> @enderror
                </div>
                <div>
                    <x-jet-label for="role" value="{{ __('employee.Role') }}" />
                    <x-jet-input id="role" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='role' />
                    @error('role') <span class='error'> {{ $message }} </span> @enderror
                </div>
                <div>
                    <x-jet-label for="level" value="{{ __('employee.Level') }}" />
                    <x-jet-input id="level" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='level' />
                    @error('level') <span class='error'> {{ $message }} </span> @enderror
                </div>
            </div>
            <div class="mt-4 grid grid-cols-3">
                <div>
                    <x-jet-label for="phone" value="{{ __('employee.Phonoe') }}" />
                    <x-jet-input id="phone1" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='phone1' />
                    @error('phone1') <span class='error'> {{ $message }} </span> @enderror
                </div>
                <div>
                    <x-jet-label for="phone" value="{{ __('employee.Phone') }}" />
                    <x-jet-input id="phone2" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='phone2' />
                    @error('phone2') <span class='error'> {{ $message }} </span> @enderror
                </div>
                <div>
                    <x-jet-label for="phone" value="{{ __('employee.Phone') }}" />
                    <x-jet-input id="phone3" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='phone3' />
                    @error('phone3') <span class='error'> {{ $message }} </span> @enderror
                </div>
            </div>
            <div class="mt-4">
                <x-jet-label for="title" value="{{ __('employee.Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='email' />
                @error('email') <span class='error'> {{ $message }} </span> @enderror
            </div>
            <div class="mt-4 grid grid-cols-3">
                <div>
                    <x-jet-label for="title" value="{{ __('employee.Birthday') }}" />
                    <x-jet-input id="birthday" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='birthday' />
                    @error('birthday') <span class='error'> {{ $message }} </span> @enderror
                </div>
                <div>
                    <x-jet-label for="title" value="{{ __('employee.JoinDate') }}" />
                    <x-jet-input id="join_date" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='join_date' />
                    @error('join_date') <span class='error'> {{ $message }} </span> @enderror
                </div>
                <div>
                    <x-jet-label for="title" value="{{ __('employee.WorkDate') }}" />
                    <x-jet-input id="work_date" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='work_date' />
                    @error('work_date') <span class='error'> {{ $message }} </span> @enderror
                </div>
            </div>
            <div class="mt-4 grid grid-cols-2">
                <div>
                    <x-jet-label for="title" value="{{ __('employee.ContractPerson') }}" />
                    <x-jet-input id="contract_person" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='contract_person' />
                    @error('contract_person') <span class='error'> {{ $message }} </span> @enderror
                </div>
                <div>
                    <x-jet-label for="title" value="{{ __('employee.ContractPhone') }}" />
                    <x-jet-input id="contract_phone" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='contract_phone' />
                    @error('contract_phone') <span class='error'> {{ $message }} </span> @enderror
                </div>
            </div>
            <div class="mt-4 grid grid-cols-2">
                <div>
                    <x-jet-label for="title" value="{{ __('employee.Bank') }}" />
                    <x-jet-input id="bank" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='bank' />
                    @error('bank') <span class='error'> {{ $message }} </span> @enderror
                </div>
                <div>
                    <x-jet-label for="title" value="{{ __('employee.Account') }}" />
                    <x-jet-input id="account" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='account' />
                    @error('account') <span class='error'> {{ $message }} </span> @enderror
                </div>
            </div>
            <div class="mt-4 grid grid-cols-2">
                <div>
                    <x-jet-label for="title" value="{{ __('employee.SICity') }}" />
                    <x-jet-input id="si_city" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='si_city' />
                    @error('si_city') <span class='error'> {{ $message }} </span> @enderror
                </div>
                <div>
                    <x-jet-label for="title" value="{{ __('employee.SIAccount') }}" />
                    <x-jet-input id="si_account" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='si_account' />
                    @error('si_account') <span class='error'> {{ $message }} </span> @enderror
                </div>
            </div>
            <div class="mt-4 grid grid-cols-2">
                <div>
                    <x-jet-label for="title" value="{{ __('employee.OriginCity') }}" />
                    <x-jet-input id="origin_city" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='origin_city' />
                    @error('si_city') <span class='error'> {{ $message }} </span> @enderror
                </div>
                <div>
                    <x-jet-label for="title" value="{{ __('employee.ResidentCity') }}" />
                    <x-jet-input id="resident_city" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='resident_city' />
                    @error('si_account') <span class='error'> {{ $message }} </span> @enderror
                </div>
            </div>
            <div class="mt-4 grid grid-cols-2">
                <div>
                    <x-jet-label for="title" value="{{ __('employee.Ethic') }}" />
                    <x-jet-input id="ethic" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='ethic' />
                    @error('ethic') <span class='error'> {{ $message }} </span> @enderror
                </div>
                <div>
                    <x-jet-label for="title" value="{{ __('employee.PFAccount') }}" />
                    <x-jet-input id="pf_account" class="block mt-1 w-full" type="text" wire:model.debounce.800ms='pf_account' />
                    @error('pf_account') <span class='error'> {{ $message }} </span> @enderror
                </div>
            </div>
            {{--
    public $pf_account;
    public $ethic;
    public $usid;
            --}}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            @if ( !$modelId )
            <x-jet-button class="ml-2"
                          wire:click="create"
                          wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
            @else
            <x-jet-button class="ml-2"
                          wire:click="update"
                          wire:loading.attr="disabled">
                {{ __('Update') }}
            </x-jet-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Confirm Dialog --}}
    <x-jet-dialog-modal wire:model="confirmingPageDeletion">
        <x-slot name="title">
            {{ __('Delete Page') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingPageDeletion')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete Page') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

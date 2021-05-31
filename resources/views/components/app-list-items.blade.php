<div class="p-6">

    <div class="flex-1 flex flex-col">
        <div class="=my-2 overfow-x-scroll sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-200 border"  id="mytable">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            @foreach ($headers as $h)
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $h }}</th>
                            @endforeach

                            <th class="w-30 px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                @if ($editable)
                                <button wire:click="editListItem(0)" >
                                    <svg t="1621078444510" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4456" width="32" height="32"><path d="M512 74.666667C270.933333 74.666667 74.666667 270.933333 74.666667 512S270.933333 949.333333 512 949.333333 949.333333 753.066667 949.333333 512 753.066667 74.666667 512 74.666667z m0 810.666666c-204.8 0-373.333333-168.533333-373.333333-373.333333S307.2 138.666667 512 138.666667 885.333333 307.2 885.333333 512 716.8 885.333333 512 885.333333z" p-id="4457"></path><path d="M682.666667 480h-138.666667V341.333333c0-17.066667-14.933333-32-32-32s-32 14.933333-32 32v138.666667H341.333333c-17.066667 0-32 14.933333-32 32s14.933333 32 32 32h138.666667V682.666667c0 17.066667 14.933333 32 32 32s32-14.933333 32-32v-138.666667H682.666667c17.066667 0 32-14.933333 32-32s-14.933333-32-32-32z" p-id="4458"></path></svg>
                                </button>
                                @endif
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-green-200">


                            <td class="px-4 bg-gray-50 "> </td>

                            @foreach($filters as $f)
                                <td class="px-4 bg-gray-50 "><input class="bg-gray-100 font-medium  leading-4 text-gray-500 border-2 rounded" wire:model.defer='{{$f}}' /> </td>
                            @endforeach

                            <td class='w-30 px-6 py-4 text-sm bg-gray-50'>
                                <button wire:click="$refresh">
                                    <svg t="1621562586724" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3140" width="32" height="32"><path d="M825.6 117.333333H198.4C157.866667 117.333333 123.733333 151.466667 123.733333 192v4.266667c0 14.933333 6.4 32 17.066667 42.666666l256 302.933334v251.733333c0 12.8 6.4 23.466667 17.066667 27.733333l162.133333 81.066667 2.133333 2.133333c21.333333 8.533333 42.666667-6.4 42.666667-29.866666V541.866667l256-302.933334c27.733333-32 23.466667-78.933333-8.533333-104.533333-8.533333-10.666667-25.6-17.066667-42.666667-17.066667z" p-id="3141"></path></svg>
                                </button>
                            </td>
                        </tr>
                        @foreach ($items as $key => $item)
                            <tr class="hover:bg-green-200">

                                <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $key + 1  }}</td>

                                @foreach ($columns as $c )
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                        @if ($url != null and $urlcolumn == $c )
                                            <a
                                                class="px-6 py-4 text-sm whitespace-no-wrap text-indigo-600 hover:text-indigo-900"
                                                target="_blank:"
                                                href="{{ URL::to('/'.$url.'/'.$item->id) }}"
                                            >
                                                {{ $item->$c  }}
                                            </a>
                                        @else
                                            {{ $this->xlatListItem($c,$item) }}
                                        @endif
                                    </td>
                                @endforeach

                                <td class="w-30 px-6 py-4 text-sm whitespace-no-wrap">
                                    @if ($deletable)
                                    <button wire:click="deleteListItem({{ $item->id }})" >
                                        <svg t="1621078077113" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4218" width="32" height="32"><path d="M512 74.666667C270.933333 74.666667 74.666667 270.933333 74.666667 512S270.933333 949.333333 512 949.333333 949.333333 753.066667 949.333333 512 753.066667 74.666667 512 74.666667z m0 810.666666c-204.8 0-373.333333-168.533333-373.333333-373.333333S307.2 138.666667 512 138.666667 885.333333 307.2 885.333333 512 716.8 885.333333 512 885.333333z" p-id="4219" fill="#d81e06"></path><path d="M657.066667 360.533333c-12.8-12.8-32-12.8-44.8 0l-102.4 102.4-102.4-102.4c-12.8-12.8-32-12.8-44.8 0-12.8 12.8-12.8 32 0 44.8l102.4 102.4-102.4 102.4c-12.8 12.8-12.8 32 0 44.8 6.4 6.4 14.933333 8.533333 23.466666 8.533334s17.066667-2.133333 23.466667-8.533334l102.4-102.4 102.4 102.4c6.4 6.4 14.933333 8.533333 23.466667 8.533334s17.066667-2.133333 23.466666-8.533334c12.8-12.8 12.8-32 0-44.8l-106.666666-100.266666 102.4-102.4c12.8-12.8 12.8-34.133333 0-46.933334z" p-id="4220" fill="#d81e06"></path></svg>
                                    </button>
                                    @endif

                                    @if ($editable)
                                    <button wire:click="editListItem({{ $item->id }})" >
                                        <svg t="1621153748201" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4694" width="32" height="32"><path d="M853.333333 501.333333c-17.066667 0-32 14.933333-32 32v320c0 6.4-4.266667 10.666667-10.666666 10.666667H170.666667c-6.4 0-10.666667-4.266667-10.666667-10.666667V213.333333c0-6.4 4.266667-10.666667 10.666667-10.666666h320c17.066667 0 32-14.933333 32-32s-14.933333-32-32-32H170.666667c-40.533333 0-74.666667 34.133333-74.666667 74.666666v640c0 40.533333 34.133333 74.666667 74.666667 74.666667h640c40.533333 0 74.666667-34.133333 74.666666-74.666667V533.333333c0-17.066667-14.933333-32-32-32z" p-id="4695"></path><path d="M405.333333 484.266667l-32 125.866666c-2.133333 10.666667 0 23.466667 8.533334 29.866667 6.4 6.4 14.933333 8.533333 23.466666 8.533333h8.533334l125.866666-32c6.4-2.133333 10.666667-4.266667 14.933334-8.533333l300.8-300.8c38.4-38.4 38.4-102.4 0-140.8-38.4-38.4-102.4-38.4-140.8 0L413.866667 469.333333c-4.266667 4.266667-6.4 8.533333-8.533334 14.933334z m59.733334 23.466666L761.6 213.333333c12.8-12.8 36.266667-12.8 49.066667 0 12.8 12.8 12.8 36.266667 0 49.066667L516.266667 558.933333l-66.133334 17.066667 14.933334-68.266667z" p-id="4696"></path></svg>
                                    </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{ $items->links() }}

    {{-- Person Info & Edit Dialog --}}
    <x-jet-dialog-modal id='editListDialog' wire:model="editListDialog">
        <x-slot name="title">
            {{ __('Input Dialog') }}
        </x-slot>

        <x-slot name="content">

            {{ $input ?? '' }}

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('editListDialog')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-secondary-button wire:click="saveListItem" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Confirm Dialog --}}
    <x-jet-dialog-modal wire:model="confirmListDialog">
        <x-slot name="title">
            {{ __('Delete List Item') }}
        </x-slot>

        <x-slot name="content">
            {{ $message ?? '' }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmListDialog')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="confirmedDeletion" wire:loading.attr="disabled">
                {{ __('Delete Page') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

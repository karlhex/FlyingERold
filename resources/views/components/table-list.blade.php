@if ($label)
    <x-jet-label for="{{$name}}" value="{{ $label }}" />
@endif

<div class='border border-blue-200'>
    <div class="=my-2 overfow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <table class="min-w-full divide-y divide-gray-200 border border-blue-400">
                <thead>
                        @foreach ($headers as $h)
                            <th class="text-sm text-center bg-gray-200 whitespace-no-wrap border border-white">
                                {{ $h }}
                            </th>
                        @endforeach

                        @if ($editable)
                        <th class="w-40 bg-gray-200 text-left text-sm whitespace-no-wrap border border-white">
                            <button wire:click="editMultiListItem('{{$name}}',-1)" >
                                <svg t="1621078444510" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4456" width="32" height="32"><path d="M512 74.666667C270.933333 74.666667 74.666667 270.933333 74.666667 512S270.933333 949.333333 512 949.333333 949.333333 753.066667 949.333333 512 753.066667 74.666667 512 74.666667z m0 810.666666c-204.8 0-373.333333-168.533333-373.333333-373.333333S307.2 138.666667 512 138.666667 885.333333 307.2 885.333333 512 716.8 885.333333 512 885.333333z" p-id="4457"></path><path d="M682.666667 480h-138.666667V341.333333c0-17.066667-14.933333-32-32-32s-32 14.933333-32 32v138.666667H341.333333c-17.066667 0-32 14.933333-32 32s14.933333 32 32 32h138.666667V682.666667c0 17.066667 14.933333 32 32 32s32-14.933333 32-32v-138.666667H682.666667c17.066667 0 32-14.933333 32-32s-14.933333-32-32-32z" p-id="4458"></path></svg>
                            </button>
                        </th>
                        @endif
                </thead>
                <tbody class="bg-gray-100 divide-y divide-gray-200">
                    @if ($items)
                        @foreach ($items as $key => $item)
                            <tr>
                                @foreach ($columns as $i)
                                    <td class="text-sm whitespace-no-wrap border border-white p-2"> {{  $item[$i] }}</td>
                                @endforeach

                                @if ($editable)
                                <td class="w-40 text-left text-sm whitespace-no-wrap border border-white">
                                    <button wire:click="deleteMultiListItem('{{$name}}',{{$key}})" >
                                        <svg t="1621078077113" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4218" width="32" height="32"><path d="M512 74.666667C270.933333 74.666667 74.666667 270.933333 74.666667 512S270.933333 949.333333 512 949.333333 949.333333 753.066667 949.333333 512 753.066667 74.666667 512 74.666667z m0 810.666666c-204.8 0-373.333333-168.533333-373.333333-373.333333S307.2 138.666667 512 138.666667 885.333333 307.2 885.333333 512 716.8 885.333333 512 885.333333z" p-id="4219" fill="#d81e06"></path><path d="M657.066667 360.533333c-12.8-12.8-32-12.8-44.8 0l-102.4 102.4-102.4-102.4c-12.8-12.8-32-12.8-44.8 0-12.8 12.8-12.8 32 0 44.8l102.4 102.4-102.4 102.4c-12.8 12.8-12.8 32 0 44.8 6.4 6.4 14.933333 8.533333 23.466666 8.533334s17.066667-2.133333 23.466667-8.533334l102.4-102.4 102.4 102.4c6.4 6.4 14.933333 8.533333 23.466667 8.533334s17.066667-2.133333 23.466666-8.533334c12.8-12.8 12.8-32 0-44.8l-106.666666-100.266666 102.4-102.4c12.8-12.8 12.8-34.133333 0-46.933334z" p-id="4220" fill="#d81e06"></path></svg>
                                    </button>
                                    <button wire:click="moveupMultiListItem('{{$name}}',{{$key}})" >
                                        <svg t="1620999351436" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3312" width="32" height="32"><path d="M512 74.666667C270.933333 74.666667 74.666667 270.933333 74.666667 512S270.933333 949.333333 512 949.333333 949.333333 753.066667 949.333333 512 753.066667 74.666667 512 74.666667z m0 810.666666c-204.8 0-373.333333-168.533333-373.333333-373.333333S307.2 138.666667 512 138.666667 885.333333 307.2 885.333333 512 716.8 885.333333 512 885.333333z" p-id="3313"></path><path d="M533.333333 307.2c-12.8-10.666667-32-10.666667-44.8 0l-181.333333 170.666667c-12.8 12.8-12.8 32-2.133333 44.8s32 12.8 44.8 2.133333l128-119.466667v277.333334c0 17.066667 14.933333 32 32 32s32-14.933333 32-32V405.333333l128 119.466667c6.4 6.4 14.933333 8.533333 21.333333 8.533333 8.533333 0 17.066667-4.266667 23.466667-10.666666 12.8-12.8 10.666667-34.133333-2.133334-44.8l-179.2-170.666667z" p-id="3314"></path></svg>
                                    </button>
                                    <button wire:click="movedownMultiListItem('{{$name}}',{{$key}})" >
                                        <svg t="1620999774867" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3788" width="32" height="32"><path d="M512 74.666667C270.933333 74.666667 74.666667 270.933333 74.666667 512S270.933333 949.333333 512 949.333333 949.333333 753.066667 949.333333 512 753.066667 74.666667 512 74.666667z m0 810.666666c-204.8 0-373.333333-168.533333-373.333333-373.333333S307.2 138.666667 512 138.666667 885.333333 307.2 885.333333 512 716.8 885.333333 512 885.333333z" p-id="3789"></path><path d="M672 499.2l-128 119.466667V341.333333c0-17.066667-14.933333-32-32-32s-32 14.933333-32 32v277.333334l-128-119.466667c-12.8-12.8-34.133333-10.666667-44.8 2.133333-12.8 12.8-10.666667 34.133333 2.133333 44.8l181.333334 170.666667c6.4 6.4 14.933333 8.533333 21.333333 8.533333s14.933333-2.133333 21.333333-8.533333l181.333334-170.666667c12.8-12.8 12.8-32 2.133333-44.8-12.8-12.8-32-14.933333-44.8-2.133333z" p-id="3790"></path></svg>
                                    </button>
                                    <button wire:click="editMultiListItem('{{$name}}',{{$key}})" >
                                        <svg t="1621153748201" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4694" width="32" height="32"><path d="M853.333333 501.333333c-17.066667 0-32 14.933333-32 32v320c0 6.4-4.266667 10.666667-10.666666 10.666667H170.666667c-6.4 0-10.666667-4.266667-10.666667-10.666667V213.333333c0-6.4 4.266667-10.666667 10.666667-10.666666h320c17.066667 0 32-14.933333 32-32s-14.933333-32-32-32H170.666667c-40.533333 0-74.666667 34.133333-74.666667 74.666666v640c0 40.533333 34.133333 74.666667 74.666667 74.666667h640c40.533333 0 74.666667-34.133333 74.666666-74.666667V533.333333c0-17.066667-14.933333-32-32-32z" p-id="4695"></path><path d="M405.333333 484.266667l-32 125.866666c-2.133333 10.666667 0 23.466667 8.533334 29.866667 6.4 6.4 14.933333 8.533333 23.466666 8.533333h8.533334l125.866666-32c6.4-2.133333 10.666667-4.266667 14.933334-8.533333l300.8-300.8c38.4-38.4 38.4-102.4 0-140.8-38.4-38.4-102.4-38.4-140.8 0L413.866667 469.333333c-4.266667 4.266667-6.4 8.533333-8.533334 14.933334z m59.733334 23.466666L761.6 213.333333c12.8-12.8 36.266667-12.8 49.066667 0 12.8 12.8 12.8 36.266667 0 49.066667L516.266667 558.933333l-66.133334 17.066667 14.933334-68.266667z" p-id="4696"></path></svg>
                                    </button>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>

        </div>
    </div>
</div>

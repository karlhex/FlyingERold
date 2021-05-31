@if ($label)
    <x-jet-label for="{{$name}}" value="{{ $label }}" />
@endif

<div class='bg-blue-300 px-2 py-2'>
    <div class="=my-2 overfow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <table class="min-w-full divide-y divide-gray-200 border">
                <thead>
                        @foreach ($columns as $column)
                            <th class="text-sm text-center bg-gray-300 whitespace-no-wrap border border-white">
                                {{ __($column) }}
                            </th>
                        @endforeach

                        <th class="w-10 bg-gray-300 text-left text-sm whitespace-no-wrap border border-white">
                        </th>
                </thead>
                <tbody class="bg-gray-200 divide-y divide-gray-200">
                            <tr>
                                @foreach ($columns as $i)
                                    <td class="text-sm whitespace-no-wrap border border-white"> {{  $item[$i] }}</td>
                                @endforeach
                                <td>
                                    <button wire:click="$emitSelf('selectListItem','{{$name}}')" >
                                        <svg t="1620875205636" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1533" width="30" height="30"><path d="M849.066667 644.778667l64.32 35.754666-397.482667 226.794667L111.530667 680.533333l64.789333-35.754666 339.562667 188.672L849.066667 644.778667z m0-170.666667l64.32 35.754667-397.482667 226.794666L111.530667 509.866667l64.789333-35.754667 339.562667 188.672L849.066667 474.112zM515.904 110.506667L922.517333 339.2l-406.613333 228.714667L109.290667 339.2l406.613333-228.714667z m0 73.429333L239.829333 339.2l276.074667 155.264 276.053333-155.264-276.053333-155.285333z" fill="#1677FF" p-id="1534"></path></svg>
                                    </button>
                                </td>
                            </tr>

                </tbody>
            </table>

        </div>
    </div>
</div>

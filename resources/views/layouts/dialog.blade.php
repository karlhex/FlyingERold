<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg">
               @livewire($dialog, ['xid' => $id])
            </div>
        </div>
    </div>
</x-app-layout>

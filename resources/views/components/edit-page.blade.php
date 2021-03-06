<div class='p-6 bg-white shadow flex-col'>
    <div class='flex w-full justify-end'>
    @if ( session("message") )
        <p> {{ session("message") }} </p>
    @endif
        <button wire:click="returnToParent()" >
                <svg t="1623051165962" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="5830" width="32" height="32"><path d="M486.592 494.528l-45.226667 45.269333-171.989333-171.882666 171.946667-172.032 45.269333 45.226666-86.826667 86.869334h195.413334c122.88 0 222.826667 97.962667 226.069333 220.032l0.085333 6.122666c0 124.885333-101.248 226.133333-226.133333 226.133334H199.466667v-64H595.2a162.133333 162.133333 0 1 0 0-324.266667l-211.2-0.021333 102.592 102.549333z" p-id="5831" fill="#1296db"></path></svg>
        </button>
    </div>

    {{ $slot  }}

</div>

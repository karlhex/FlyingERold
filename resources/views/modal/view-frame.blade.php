    <x-viewer-frame name='viewframe' wire:model="viewPDF">
    <div id="divPdfViewPanel2" style="margin: 5px;">
        <iframe class='w-full h-screen' src="{{$viewPDFUrl}}" ></iframe>
    </div>
    </x-viewer-frame>

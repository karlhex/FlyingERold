<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <script type="text/javascript" src="{{ URL::asset('js/pdfjs/pdf.js') }}"></script>

        @bukStyles(true)

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    </head>
    <body class="font-sans antialiased">
        <div class="flex flex-col w-screen lg:flex-row font-semibold text-blue-900 text-base subpixel-antialiased">
            @livewire('sidebar')
            <!-- Page Content -->
                <div class="flex-col max-w-screen-2xl w-full bg-blue-50 py-4 lg:py-8 px-4 lg:px-6 xl:px-8 overflow-hidden">

                    @livewire('topbar')

                    {{ $slot }}

                </div>
        </div>


    @stack('modals')

    @livewireScripts
    @bukScripts(true)

    </body>

    @stack('scripts')
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @filamentStyles

</head>

<body>

    <div class="grid md:grid-cols-6 h-screen overflow-hidden">
        <div>
            <x-mysoftcare.sidebar.content />
        </div>
        <div class="col-span-5 overflow-x-auto bg-gray-100">
            <div>
                @livewire('navigation-menu')

                <div class="py-7 px-6">
                    @if (isset($breadcrumb))
                        <div>
                            {{ $breadcrumb }}
                        </div>
                    @endif

                    @if (isset($welcome))
                        <div>
                            {{ $welcome }}
                        </div>
                    @endif

                    {{ $slot }}
                </div>
            </div>

        </div>
    </div>

    @livewire('notifications')
    @filamentScripts

    <script>
        window.addEventListener('print', event => window.open(event.detail));
    </script>
</body>

</html>

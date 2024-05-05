<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mysoftcare</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @filamentStyles

</head>

<body class="h-screen overflow-hidden">

    <div class="grid md:grid-cols-6 h-full">
        <div class="md:block hidden h-full">
            <x-mysoftcare.sidebar.content />
        </div>
        <div class="md:col-span-5 sm:col-span-6 overflow-y-auto bg-gray-100">
            <div>
                @livewire('navigation-menu')

                <div class="px-6">
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
                    <br>
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

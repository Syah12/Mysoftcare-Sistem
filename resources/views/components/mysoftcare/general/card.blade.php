@props(['logo' => false])

<div class="h-screen grid md:grid-cols-2 flex justify-center items-center overflow-hidden">

    <div class="md:block hidden">
        <img src="{{ asset('img/bg.jpg') }}" alt="">
    </div>

    {{-- <div class="md:block hidden bg-blue-400 h-full">
    </div> --}}

    <div class="w-full md:px-40 sm:px-4">
        <div class="pb-6">
            {{ $logo }}
        </div>
        <div class="w-full">
            {{ $slot }}
        </div>
    </div>
</div>

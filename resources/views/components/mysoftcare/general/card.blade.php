@props(['logo' => false])

<div class="min-h-screen flex flex-col justify-center items-center">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md px-6 py-4 overflow-hidden">
        {{ $slot }}
    </div>
</div>

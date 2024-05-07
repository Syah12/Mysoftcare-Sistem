<x-admin-layout>

    <x-slot name="welcome">
        <h2 class="font-semibold text-2xl pt-6 pb-6">
            Selamat datang ke <span class="text-blue-400">Mysoftcare</span>, {{ Auth::user()->name }}.
        </h2>

        <x-mysoftcare.general.breadcrumbs>
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('dashboard') }}" name="Papan Utama" />
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('intern.index') }}" name="Senarai Pelajar LI" icon  />
            <x-mysoftcare.general.breadcrumbs-item name="Kemaskini Maklumat Pelajar LI" icon disabled  />
        </x-mysoftcare.general.breadcrumbs>
    </x-slot>

    <div class="pt-6">
        <livewire:intern.forms.intern-form :intern="$intern" />
    </div>

</x-admin-layout>

<x-admin-layout>
    <x-slot name="welcome">
        <x-mysoftcare.general.breadcrumbs>
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('dashboard') }}" name="Papan Utama" />
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('agency.index') }}" name="Senarai Agensi" icon  />
            <x-mysoftcare.general.breadcrumbs-item name="Kemaskini Maklumat Agensi" icon disabled  />
        </x-mysoftcare.general.breadcrumbs>
        <h2 class="font-semibold text-2xl pt-6">
            Selamat datang, {{ Auth::user()->name }}.
        </h2>
        <p class="text-sm">Paparan dikemaskini pada {{ now()->format('d/m/Y') }}</p>
    </x-slot>

    <div class="pt-6">
        <livewire:agency.forms.agency-form :agency="$agency" />
    </div>

</x-admin-layout>

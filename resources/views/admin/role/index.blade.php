<x-admin-layout>
    <x-slot name="welcome">
        <x-mysoftcare.general.breadcrumbs>
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('dashboard') }}" name="Papan Utama" />
            <x-mysoftcare.general.breadcrumbs-item name="Senarai Peranan" icon disabled />
        </x-mysoftcare.general.breadcrumbs>
        <h2 class="font-semibold text-2xl pt-6">
            Selamat datang, {{ Auth::user()->name }}.
        </h2>
        <p class="text-sm">Paparan dikemaskini pada {{ now()->format('d/m/Y') }}</p>
    </x-slot>

    <div class="pt-6">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id culpa adipisci totam inventore reiciendis impedit
        ut corporis unde recusandae. Quisquam adipisci temporibus perferendis ab doloremque obcaecati, qui maiores fugit
        architecto.
    </div>
</x-admin-layout>

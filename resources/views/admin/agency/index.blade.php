<x-admin-layout>

    <x-slot name="welcome">
        <h2 class="font-semibold text-2xl pt-6 pb-6">
            Selamat datang ke <span class="text-blue-400">Mysoftcare</span>, {{ Auth::user()->name }}.
        </h2>

        <x-mysoftcare.general.breadcrumbs>
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('dashboard') }}" name="Papan Utama" />
            <x-mysoftcare.general.breadcrumbs-item name="Senarai Agensi" icon disabled />
        </x-mysoftcare.general.breadcrumbs>
    </x-slot>

    <div class="pt-6">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id culpa adipisci totam inventore reiciendis impedit
        ut corporis unde recusandae. Quisquam adipisci temporibus perferendis ab doloremque obcaecati, qui maiores fugit
        architecto.
    </div>
</x-admin-layout>

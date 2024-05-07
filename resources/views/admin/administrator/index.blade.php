<x-admin-layout>

    <x-slot name="welcome">
        <h2 class="font-semibold text-2xl pt-6 pb-6">
            Selamat datang ke <span class="text-blue-400">Mysoftcare</span>, {{ Auth::user()->name }}.
        </h2>

        <x-mysoftcare.general.breadcrumbs>
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('dashboard') }}" name="Papan Utama" />
            <x-mysoftcare.general.breadcrumbs-item name="Senarai Pentadbir" icon disabled />
        </x-mysoftcare.general.breadcrumbs>
    </x-slot>

    <div class="pt-4">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat magni laudantium unde deleniti non, numquam ea
        commodi maiores expedita deserunt reiciendis distinctio hic ipsum excepturi illo iusto aliquam nam amet!
        {{-- <livewire:employee.tables.employee-table /> --}}
    </div>
</x-admin-layout>

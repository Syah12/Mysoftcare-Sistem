<div class="bg-white p-4 rounded-lg shadow-sm mb-6">
    <div class="grid md:grid-cols-2 gap-4 items-center">
        <div>
            <div class="text-blue-400 font-medium text-xl">
                Status Bekerja Syarikat
            </div>
            <div class="text-gray-700 text-sm">
                Maklumkan kepada pekerja syarikat dibuka atau ditutup pada ({{ $now->format('d/m/Y') }})
            </div>
        </div>
        <div class="flex md:flex-row-reverse">
            @if ($companyStatusMysoftcare->isNotEmpty())
                @foreach ($companyStatusMysoftcare as $item)
                    <x-mysoftcare.general.primary-button name="Kemaskini" wireClick="edit({{ $item->id }})" />
                @endforeach
            @else
                <x-mysoftcare.general.primary-button name="Tambah" wireClick="create" />
            @endif

            <livewire:company-status.modals.form-modal />
            <x-filament-actions::modals />
        </div>
    </div>

</div>

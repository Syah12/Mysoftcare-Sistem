<div class="bg-white p-4 rounded-lg shadow-md mb-6">
    <div class="flex justify-between items-center">
        <div>
            <div class="text-blue-400 font-medium text-xl">
                Status Bekerja Syarikat
            </div>
            <div class="text-gray-700 text-sm">
                Maklumkan kepada pekerja syarikat dibuka atau ditutup pada ({{ $now->format('d/m/Y') }})
            </div>
        </div>
        <div>
            @if ($companyStatusMysoftcare->isNotEmpty())
                @foreach ($companyStatusMysoftcare as $item)
                    <button wire:click="edit({{ $item->id }})"
                        class="bg-blue-500 text-white py-2 px-4 rounded-lg">Kemaskini</button>
                @endforeach
            @else
                <button wire:click="create" class="bg-blue-500 text-white py-2 px-4 rounded-lg">Tambah</button>
            @endif

            <livewire:company-status.modals.form-modal />
            <x-filament-actions::modals />
        </div>
    </div>

</div>

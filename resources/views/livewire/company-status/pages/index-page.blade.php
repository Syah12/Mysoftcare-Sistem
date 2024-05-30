<div class="bg-white p-4 rounded-lg  border border-gray-200">
    <div class="flex justify-between items-center">
        <div class="inline-flex items-center gap-6">
            <div>
                <img src="{{ asset('img/megaphone (1).png') }}" class="w-16" alt="">
            </div>
            <div>
                <div class="font-semibold text-xl">
                    Status Bekerja Syarikat
                </div>
                <div class="text-gray-500 text-sm">
                    Status bekerja pada hari ini
                </div>
            </div>
        </div>
        <div>
            @if ($companyStatusMysoftcare->isNotEmpty())
                @foreach ($companyStatusMysoftcare as $item)
                    <x-mysoftcare.general.primary-button name="Kemaskini" wireClick="edit({{ $item->id }})" class="bg-blue-500 text-white hover:bg-blue-700" />
                @endforeach
            @else
                <x-mysoftcare.general.primary-button name="Tambah" wireClick="create" class="bg-blue-500 text-white hover:bg-blue-700" />
            @endif

            <livewire:company-status.modals.form-modal />
            <x-filament-actions::modals />
        </div>
    </div>

</div>

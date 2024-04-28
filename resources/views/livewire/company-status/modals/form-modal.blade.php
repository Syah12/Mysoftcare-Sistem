<x-filament::modal id="company-status-form-modal"
    {{-- slide-over --}}
    sticky-header
    sticky-footer
    width="2xl">
    <x-slot name="heading">{{ $companyStatus?->exists ? 'Kemaskini' : 'Tambah' }} Status Bekerja Syarikat</x-slot>
    <livewire:company-status.forms.company-status-form :companyStatus="$companyStatus" :key="$companyStatus?->id" />
</x-filament::modal>

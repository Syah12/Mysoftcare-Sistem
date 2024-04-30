<x-filament::modal id="calendar-form-modal" {{-- slide-over --}} sticky-header sticky-footer width="2xl">
    <x-slot name="heading">{{ true ? 'Kemaskini' : 'Tambah' }} Event {{-- todo: rename Event --}}</x-slot>
    <livewire:calendar.forms.calendar-form :$eventId :$startDate :$endDate wire:key="{{ $eventId }}" />
</x-filament::modal>

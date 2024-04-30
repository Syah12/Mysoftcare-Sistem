<x-filament::modal id="calendar-event-form-modal" {{-- slide-over --}} sticky-header sticky-footer width="2xl">
    <x-slot name="heading">{{ true ? 'Kemaskini' : 'Tambah' }} Event {{-- todo: rename Event --}}</x-slot>
    <livewire:calendar-events.forms.calendar-event-form :$eventId :$startDate :$endDate wire:key="{{ $eventId }}" />
</x-filament::modal>

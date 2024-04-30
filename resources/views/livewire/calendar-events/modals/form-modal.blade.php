<x-filament::modal id="calendar-event-form-modal" {{-- slide-over --}} sticky-header sticky-footer width="2xl">
    <x-slot name="heading">{{ $calendarEvent?->exists ? 'Kemaskini' : 'Tambah' }} Acara</x-slot>
    {{-- <x-slot name="heading">{{ $calendarEvent?->exists ? 'Kemaskini' : 'Tambah' }} Acara</x-slot> --}}
    <livewire:calendar-events.forms.calendar-event-form :$calendarEvent :$startDate :$endDate wire:key="{{ $eventId }}" />
</x-filament::modal>

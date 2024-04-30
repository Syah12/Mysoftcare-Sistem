<div>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <div wire:ignore id='calendar'></div>

    <script>
        document.addEventListener('livewire:initialized', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                // initialView: 'timeGridWeek',
                timeZone: 'Asia/Kuala_Lumpur',
                editable: true,
                selectable: true,
                events: @json($events),
                select: function(data) {
                    Livewire.dispatch('show', {
                        eventId: null,
                        startDate: data.start,
                        endDate: data.end,
                    });
                },
                eventDrop: function(data) {
                    @this.updateEvent(
                        data.event.id,
                        data.event.title,
                        data.event.start,
                        data.event.end).then(function() {
                        alert('moved event');
                    })
                },
                eventClick: function(data) {
                    Livewire.dispatch('show', {
                        eventId: data.event.id
                    });
                }
            });
            calendar.render();
        });
    </script>
</div>

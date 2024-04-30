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
                    var event_name = prompt('Event Name:');
                    if (!event_name) {
                        return;
                    }
                    @this.newEvent(event_name, data.start, data.end)
                        .then(
                            function(id) {
                                calendar.addEvent({
                                    id: id,
                                    title: event_name,
                                    start: data.startStr,
                                    end: data.endStr,
                                });
                                calendar.unselect();
                            });
                },
                eventDrop: function(data) {
                    console.log(data.event.id)
                    @this.updateEvent(
                        data.event.id,
                        data.event.title,
                        data.event.start,
                        data.event.end
                    ).then(function() {
                        alert('moved event');
                    })
                },
            });
            calendar.render();
        });
    </script>
</div>

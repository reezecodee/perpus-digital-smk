document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: '/events',
        eventContent: function(info) {
            let eventColor = '';
            if (info.event.extendedProps.type === 'Kuning') {
                eventColor = '#ffd859';
            } else if (info.event.extendedProps.type === 'Merah') {
                eventColor = '#db1919';
            } else if (info.event.extendedProps.type === 'Biru') {
                eventColor = '#3f83f8';
            }

            return {
                html: `<div title="${info.event.title}" class="overflow-hidden" style="background-color: ${eventColor};">${info.event.title}</div>`
            };
        }
    });

    calendar.render();
});
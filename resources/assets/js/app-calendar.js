'use strict';

document.addEventListener('DOMContentLoaded', function () {
  const calendarEl = document.getElementById('calendar');

  function fetchEvents(successCallback) {
    $.ajax({
      url: "/api/events/{{ $ruangan->id }}}",
      type: 'GET',
      success: function(result) {
        var events = result.map(function(event) {
          return {
            'title': event.title,
            'start': event.start,
            'end': event.end
          };
        });
        // Ensure successCallback is indeed a function before calling it
        if (typeof successCallback === 'function') {
          successCallback(events);
        }
      },
      error: function(error) {
        console.log(error);
      }
    });
  }

  let calendar = new Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    // Pass the fetchEvents function as the events source
    events: function (successCallback) {
      fetchEvents(successCallback);
    },
    plugins: [dayGridPlugin, interactionPlugin, listPlugin, timegridPlugin],
    editable: true,
    dragScroll: true,
    dayMaxEvents: 2,
    eventResizableFromStart: true,
    headerToolbar: {
      start: 'prev,next, title',
      end: 'today,dayGridMonth,listDay'
    },
  });

  calendar.render();
});

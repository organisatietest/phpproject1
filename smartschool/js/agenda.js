$(document).ready(function() {
	
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		var calendar = $('#calendar').fullCalendar({
			editable: true,
                        selectable: true,
                        selectHelper: true,
                        events: "http://localhost/smartschool/smartschool/events.php",
                        select: function(start, end, allDay) {
                         var title = prompt('Event Title:');
                         if (title) {
                         start = $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss");
                         end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");
                         $.ajax({
                         url: 'http://localhost/smartschool/smartschool/add_events.php',
                         data: 'title='+ title+'&start='+ start +'&end='+ end ,
                         type: "POST",
                         success: function(json) {
                         alert('Input geslaagd!');
                         }
                         });
                         calendar.fullCalendar('renderEvent',
                         {
                         title: title,
                         start: start,
                         end: end,
                         allDay: allDay
                         },
                         true // make the event "stick"
                         );
                         }
                         calendar.fullCalendar('unselect');
                        },
                        editable: true,
                        eventDrop: function(event, delta) {
                         start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
                         end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
                         $.ajax({
                         url: 'http://localhost/smartschool/smartschool/update_events.php',
                         data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
                         type: "POST",
                         success: function(json) {
                         alert("Update geslaagd!");
                         }
                         });
                        },
                        eventResize: function(event) {
                         start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
                         end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
                         $.ajax({
                         url: 'http://localhost/smartschool/smartschool/update_events.php',
                         data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
                         type: "POST",
                         success: function(json) {
                         alert("Update geslaagd");
                         }
                         });

                        },
                        eventClick: function(event) {

                                if (confirm("Wil je dit event echt verwijderen?")) {
                                        $.ajax({
                                        url: 'http://localhost/smartschool/smartschool/delete_events.php',
                                        data: 'id=' + event.id,
                                        type: "POST",
                                        success: function(json){
                                                alert("Delete geslaagd!");
                                                location.reload();
                                            }
                                        });
                                }

                        }
			
		});
		
	});

 
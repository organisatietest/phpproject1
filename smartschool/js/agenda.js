$(document).ready(function() {
	
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		var calendar = $('#calendar').fullCalendar({
			editable: true,
                        theme: true,
                        selectable: true,
                        selectHelper: true,
                        events: "http://localhost/smartschool/smartschool/events.php",
                        
                        //INPUT nieuwe event
                        
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
                             calendar.fullCalendar('refetchEvents');    //bug opgelost view=OK
                            //alert('Input geslaagd!');
                         },
                            error: function(){
                                alert('error');
                            }                    
                         });
                         }
                         calendar.fullCalendar('unselect');
                        },
                        

                        //VERPLAATSEN
                        
                        eventDrop: function(event, delta) {
                        
                        start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
                        end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");

                         $.ajax({
                         url: 'http://localhost/smartschool/smartschool/update_events.php',
                         data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
                         type: "POST",
                         success: function(json) {
                             
                         //alert("Verplaatsen geslaagd!");
                         },
                         error: function(){
                         alert('error');
                         }
                         });
                        },
                        
                        //RESIZEN-UPDATEN
                        
                        eventResize: function(event) {
                        
                        start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
                        end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
                        
                        $.ajax({
                         url: 'http://localhost/smartschool/smartschool/update_events.php',
                         data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
                         type: "POST",
                         success: function(json) {
                             //alert("Update geslaagd");
                         },
                         
                         error: function(){
                         alert('error');
                          }
                         });

                        },
                        
                        //DELETEN
                        
                        eventClick: function(event) {

                                if (confirm("Wil je dit event echt verwijderen?")) {
                                        $.ajax({
                                        url: 'http://localhost/smartschool/smartschool/delete_events.php',
                                        data: 'id=' + event.id,
                                        type: "POST",
                                        success: function(json){
                                                
                                                calendar.fullCalendar('refetchEvents');     //view OK
                                                //location.reload();                        //view NOK
                                                //alert("Delete geslaagd!");
                                            },
                                             error: function(){
                                                alert('error');
                                                }
                                        });
                                }

                        }
			
		});
		
	});
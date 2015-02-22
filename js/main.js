//declare variables.
var readUrl   = 'scheduler/read',
    createUrl = 'scheduler/create',
    updateUrl = 'scheduler/edit',
    delUrl    = 'scheduler/delete',
    delHref,
    delId,
    updateHref,
    updateId,
    pathname = window.location.pathname.split('/')[3];

$(document).ready(function() { 
	if (pathname) {	read(pathname);	}
	//else read();


    /******** jQuery UI Dialog/Modal ********/
    //message Dialog
    $( '#msgDialog' ).dialog({
        autoOpen: false,
        buttons: {
            'Ok': function() {
                $( this ).dialog( 'close' );
            }
        }
    }); //end message Dialog


    //delete Dialog
    $( '#delDialog' ).dialog({
        autoOpen: false,
        buttons: {
            'Yes': function() {
                $( '#ajaxLoader' ).fadeIn( 'slow' );
                $( this ).dialog( 'close' );

                $.ajax({
                    url: delHref,
                    success: function( response ) {
                        $( '#ajaxLoader' ).fadeOut( 'slow' );

                        $( '#msgDialog > p' ).html( response );
                        $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );

                        $( 'div#' + delId + ' li' ).parent()
                        .fadeOut( 'slow', function() {
                            $( this ).remove();
                        });
                    } //end success
                });
 
            },
            'No': function() {
                $( this ).dialog( 'close' );
            } 
        } //end delDialog buttons
 
    }); //end delete Dialog


    //configure validation for Update Modal Dialog
    $( '#editForm' ).validate({
        rules: {
            title: { required: true },
            description: { required: true },
            date: { required: true },
            time: { required: true },
            duration: { required: true, number: true }
        }
    });

    //Update Form Modal
    $( '#updateModal ').dialog({
        autoOpen: false,
        title: 'Modify an Appointment',
        minWidth: 450,
        minHeight: 200,
        modal: true,
        open: function() {
            $( '#editForm' ).validate().resetForm();
        },
        buttons: {
            'Update': function() {
                if ( $( '#editForm' ).valid() ) {
                    $( '#ajaxLoader' ).fadeIn( 'slow' );
                    $( this ).dialog( 'close' );
                    
                    $.ajax({
                        url: updateHref,
                        type: 'POST',
                        data : $( '#editForm' ).serialize(),
                        success: function(response){
                            $( '#msgDialog > p' ).html( response );
                            $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                            
                            $( '#ajaxLoader' ).fadeOut( 'slow' );

                            $( '#editForm input' ).val( '' );
                            $( '#editForm textarea' ).val( '' );
                            
                            //refresh list of users by reading it
                            readAppointments();
                        },
                        error: function(error){
                            $( '#ajaxLoader' ).fadeOut( 'slow' );
                            alert( 'Server Error' );
                        }
                    });
                }
            },
            Cancel: function() {
                $( this ).dialog( 'close' );
            }
        }
    }); //end Update Form Modal


    //configure validation for Add Modal Dialog
    $( '#addForm' ).validate({
        rules: {
            title: { required: true },
            description: { required: true },
            date: { required: true },
            time: { required: true },
            duration: { required: true, number: true }
        }
    });
    
    //Create Form Modal
    $( '#addModal' ).dialog({
        autoOpen: false,
        title: 'Create a new Appointment',
        minWidth: 450,
        minHeight: 200,
        modal: true,
        open: function() {
            $( '#addForm' ).validate().resetForm();
        },
        buttons: {
            'Create': function() {
                if ( $( '#addForm' ).valid() ) {
                    $( '#ajaxLoader' ).fadeIn( 'slow' );
                    $( this ).dialog( 'close' );

                    $.ajax({
                        url: createUrl,
                        type: 'POST',
                        data : $( '#addForm' ).serialize(),
                        success: function(response){
                            $( '#msgDialog > p' ).html( response );
                            $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                            
                            $( '#ajaxLoader' ).fadeOut( 'slow' );
                            
                            $( '#addForm input' ).val( '' );
                            $( '#addForm textarea' ).val( '' );
                            
                            //refresh list of users by reading it
                            readAppointments();
                        },
                        error: function(error){
                            $( '#ajaxLoader' ).fadeOut( 'slow' );
                            alert( 'Server error' );
                        }
                    }); //end AJAX
                    
                } //end if
            },
            Cancel: function() {
                $( this ).dialog( 'close' );
            }
        }, //end buttons
    }); //end Create Form Modal
    /******** end of jQuery UI Dialog/Modal ********/


    /******** Button Events ********/
    //edit button click
    $( '.appointmentsList' ).delegate( 'a.editButton', 'click', function() {
        updateHref = $( this ).attr( 'href' );
        updateId = $( this ).parents( '.appointmentItem' ).attr( 'id' );

        $( '#ajaxLoader' ).fadeIn( 'slow' );
        $.ajax({
            url: 'scheduler/getById/' + updateId,
            dataType: 'json',
            success: function( response ) {
                $( '#titleEdit' ).val( response.title );
                $( '#descriptionEdit' ).val( response.description );
                $( '#dateEdit' ).val( response.date );
                $( '#timeEdit' ).val( response.time );
                $( '#durationEdit' ).val( response.duration );
                $( '#colorEdit' ).colorpicker({ color: response.color_hex });
 
                $( '#ajaxLoader' ).fadeOut( 'slow' );
 
                $( '#id' ).val( updateId );
 
                $( '#updateModal' ).dialog( 'open' );
            }
        });
 
        return false;
    }); //end edit button click
    
    //delete button click
    $( '.appointmentsList' ).delegate( 'a.deleteButton', 'click', function() {
        delHref = $( this ).attr( 'href' );
        delId = $( this ).parents( '.appointmentItem' ).attr( 'id' );
 
        $( '#delDialog' ).dialog( 'open' );
 
        return false;
 
    }); //end delete button click

    //add button click
    $( '#createButton' ).on( 'click', function() {
        $( '#addForm input' ).val( '' );
        $( '#addForm textarea' ).val( '' );
        $( '#addModal' ).dialog( 'open' );
        return false
    }); //end create button click
    /******** end of Button Events ********/
    
    
    
    /******** jQuery Widgets ********/
    //datepickers
    $( '#dateAdd' ).datepicker({ minDate: 0, dateFormat: 'yy-mm-dd' });
    $( '#dateEdit' ).datepicker({ minDate: 0, dateFormat: 'yy-mm-dd' });
    
    //timepickers
    $( '#timeAdd' ).timepicker({ 'scrollDefault': 'now', 'timeFormat': 'H:i:s' });
    $( '#timeEdit' ).timepicker({ 'scrollDefault': 'now', 'timeFormat': 'H:i:s' });
    
    //colorpicker
    $( '#colorAdd' ).colorpicker({ defaultPalette: 'web', color: '#ffffff' });
    $( '#colorEdit' ).colorpicker({ defaultPalette: 'web' });
    /******** end of jQuery Widgets ********/


}); 
/******** end of jQuery document.ready ********/



/******** JavaScript Functions ********/
//function to fill in buildings, rooms, schedules table
function read(pathname) {
    $( '#ajaxLoader' ).fadeIn( 'slow' );
	
    if (pathname) {
        readUrl = 'read';
        updateUrl = 'edit';
        delUrl = 'delete';
    }

    $.ajax({
        url: readUrl + '/' + pathname,
        dataType: 'json',
        success: function( response ) {
            for( var i in response ) {
                response[ i ].updateLink = updateUrl + '/' + response[ i ].id;
                response[ i ].deleteLink = delUrl + '/' + response[ i ].id;
            }
            //ROOMS
			if (pathname == 'rooms') {
				$( '.roomsList' ).html( '' );
                $( '#roomsTemplate' ).render( response ).appendTo( '.roomsList' );
			}
			
			//BLDGS
			if(pathname == 'buildings') {
				$( '.buildingsList' ).html( '' );
				$( '#buildingsTemplate' ).render( response ).appendTo( '.buildingsList' );
			}
			
            $( '#ajaxLoader' ).fadeOut( 'slow' );
        },
		error: function (xhr, ajaxOptions, thrownError) {
			console.log(xhr);
			console.log(thrownError);
		}
		
    });
} // end read
/******** end of JavaScript Functions ********/
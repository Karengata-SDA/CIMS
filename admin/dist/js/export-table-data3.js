/*Export Table Init*/

"use strict"; 

$(document).ready(function() {
	$('#example3').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]
	} );
} );
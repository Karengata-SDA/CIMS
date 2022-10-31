/*Export Table Init*/

"use strict"; 

$(document).ready(function() {
	$('#example2').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]
	} );
} );
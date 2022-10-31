<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$connect = mysqli_connect("localhost", "karengat_cims", "#karengata#@cms#", "karengat_cims");
$tab_query = "SELECT * FROM `property` WHERE `category_id` = '1' AND `make` = 'Apartment'";
$tab_result = mysqli_query($connect, $tab_query);
$tab_menu = '';
$tab_content = '';
$i = 0;
while($row = mysqli_fetch_array($tab_result))
{
                
        if($i == 0)
        {
         $tab_menu .= '
          <li class="active"><a href="#'.$row["id"].'" data-toggle="tab">'.$row["name"].'</a></li>
         ';
         
         $tab_content .= '
          <div id="'.$row["id"].'" class="tab-pane fade in active">
              <table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th >#</th>
							<th >Image</th>
							<th >First Name</th>
                                                        <th >Middle Name</th>
							<th >Last Name</th>
							<th >Gender</th>
							<th >ID Number</th>
							<th >Phone</th>
							<th >Apartment</th>
							<th >Status</th>
							<th >Action</th>
						</tr>
					</thead>
				</table>
         ';
        }
        else
        {
         $tab_menu .= '
           <li><a href="#'.$row["id"].'" data-toggle="tab">'.$row["name"].'</a></li>
         ';
         
         $tab_content .= '
          <div id="'.$row["id"].'" class="tab-pane fade">
              <table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th >#</th>
							<th >Image</th>
							<th >First Name</th>
                                                        <th >Middle Name</th>
							<th >Last Name</th>
							<th >Gender</th>
							<th >ID Number</th>
							<th >Phone</th>
							<th >Apartment</th>
							<th >Status</th>
							<th >Action</th>
						</tr>
					</thead>
				</table>
         ';
        }
        
         
        //$product_query = "SELECT * FROM property WHERE `sub_category_id` = '".$row["id"]."'";
        //$product_result = mysqli_query($connect, $product_query);
        //while($sub_row = mysqli_fetch_array($product_result))
        //{
        // $tab_content .= '
        // <div class="col-md-3" style="margin-bottom:36px;">
        //  <img src="uploads/'.$sub_row["image"].'" class="img-responsive img-thumbnail" />
        //  <h4>'.$sub_row["name"].'</h4>
        // </div>
        //
        // ';
        //}
        $tab_content .= '<div style="clear:both"></div></div>';
 $i++;
}
?>

<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Create Dynamic Tab by using Bootstrap in PHP Mysql</title>
  <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script-->
  <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /-->
  <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script-->
  
  
  
  
   <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" />

  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>
		<style>
			body
			{
				margin:0;
				padding:0;
				background-color:#f1f1f1;
			}
			.box
			{
				width:1270px;
				padding:20px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:25px;
			}
		</style>
 </head>
 <body>
  <div class="container">
   <h2 align="center">Create Dynamic Tab by using Bootstrap in PHP Mysql</a></h2>
   <br />
   <ul class="nav nav-tabs">
   <?php
   echo $tab_menu;
   ?>
   </ul>
   <div class="tab-content">
   <br />
   <?php
   echo $tab_content;
   ?>
   </div>
  </div>
 </body>
</html>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Add User");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#user_uploaded_image').html('');
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch_profiles.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],
		     dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf', 'copy', 'colvis'
   ],
  "lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
				});



	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var firstName = $('#firstname').val();
		var lastName = $('#lastname').val();
		var gender = $('#gender').val();
		var member_no = $('#member_no').val();
		var phone = $('#phone').val();
		var entry_mode = $('#entry_mode').val();
		var comments_remarks = $('#comments_remarks').val();

		var extension = $('#user_image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#user_image').val('');
				return false;
			}
		}	
		if(firstName != '' && lastName != '')
		{
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});
	
	$(document).on('click', '.update', function(){
		var user_id = $(this).attr("id");
		$.ajax({
			url:"fetch_profile.php",
			method:"POST",
			data:{user_id:user_id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#firstname').val(data.firstname);
				$('#lastname').val(data.lastname);
				$('#gender').val(data.gender);
				$('#member_no').val(data.member_no);
				$('#phone').val(data.phone);
				$('#entry_mode').val(data.entry_mode);
				$('#comments_remarks').val(data.comments_remarks);
				$('.modal-title').text("Edit User");
				$('#user_id').val(user_id);
				$('#user_uploaded_image').html(data.user_image);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var user_id = $(this).attr("id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{user_id:user_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	
	
});
</script>

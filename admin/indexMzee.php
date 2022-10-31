<!DOCTYPE html>
<html>
<head>
	<title>PHP/MySQLi CRUD Operation using Bootstrap/Modal</title>
	<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script-->
	
		<script src="extra/jquery.min.js"></script>
	<link rel="stylesheet" href="extra//bootstrap.min.css" />
	<script src="extra//bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div style="height:50px;"></div>
	<div class="well" style="margin:auto; padding:auto; width:80%;">
	<span style="font-size:25px; color:blue"><center><strong>PHP/MySQLi CRUD Operation using Bootstrap</strong></center></span>	
		<span class="pull-left"><a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></span>
		<div style="height:50px;"></div>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<th>#</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th >Mem#</th>
				<th>Gender</th>
			    <th>Phone</th>
				<th>Entry Mode</th>
				<th>Status</th>
				<th>Action </th>
			</thead>
			<tbody>
			<?php
				include('conn.php');
				
				$query=mysqli_query($conn,"select * from `people`");
				while($row=mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo $row['firstname']; ?></td>
						<td><?php echo $row["id"]; ?></td> 
                        <td><?php echo $row["firstname"]; ?></td>
                        <td><?php echo $row["lastname"]; ?></td>
                        <td><?php echo $row["member_no"]; ?></td>
                        <td><?php echo $row["gender"]; ?></td>
                        <td><?php echo $row["phone"]; ?></td> 
                        <td><?php echo $row["entry_mode"]; ?></td>
                        <td><?php echo $row["comments_remarks"]; ?></td>

						<!--td>
							<a href="#edit<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a> || 
							<a href="#del<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
							<?php include('button.php'); ?>
						</td-->
						              <td>
                                    	<a name="edit" value="Edit" href="#edit<?php echo $row['id']; ?>" class="pr-10 edit_data" data-toggle="tooltip" title="edit" >
                                    		<i class="fa fa-pencil"></i>
                                    	</a>
                                    	<a  name="view" value="view" id="<?php echo $row["id"]; ?>" class="text-inverse view_data" title="view" data-toggle="tooltip">
                                    		<i class="fa  fa-eye"></i>
                                    	</a>
                                    	&nbsp;&nbsp;
                                    	<a  name="view" value="view" href="#del<?php echo $row['id']; ?>" class="text-inverse view_data" title="send SMS" data-toggle="tooltip">
                                    		<i class="fa  fa-envelope"></i>
                                    	</a>
                                    </td>
					</tr>
					<?php
				}
			
			?>
			</tbody>
		</table>
	</div>
	<?php include('add_modal.php'); ?>
</div>
</body>
</html>
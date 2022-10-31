<?php
include('db.php');
//include('function.php');
function upload_image()
{
	if(isset($_FILES["user_image"]))
	{
		$extension = explode('.', $_FILES['user_image']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload/' . $new_name;
		move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($user_id)
{
	include('db.php');
	$statement = $connection->prepare("SELECT image FROM people WHERE id = '$user_id'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["image"];
	}
}

function get_total_all_records()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM people");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}


if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $connection->prepare("
			INSERT INTO people (firstname, lastname, gender, member_no, phone, entry_mode, comments_remarks, image) 
			VALUES (:firstname, :lastname, :gender, :member_no, :phone, :entry_mode, :comments_remarks, :image)
		");
		$result = $statement->execute(
			array(
				':firstname'	=>	$_POST["firstname"],
				':lastname'	=>	$_POST["lastname"],
				':gender'	=>	$_POST["gender"],
				':member_no'	=>	$_POST["member_no"],
				':phone'	=>	$_POST["phone"],
				':entry_mode'	=>	$_POST["entry_mode"],
				':comments_remarks'	=>	$_POST["comments_remarks"],

				':image'		=>	$image
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		$statement = $connection->prepare(
			"UPDATE people
			SET firstname = :firstname, lastname = :lastname, gender = :gender, member_no = :member_no, phone = :phone, entry_mode = :entry_mode, comments_remarks = :comments_remarks, image = :image  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':firstname'	=>	$_POST["firstname"],
				':lastname'	=>	$_POST["lastname"],
				':gender'		=>	$_POST["gender"],
				':member_no'	=>	$_POST["member_no"],
				':phone'	=>	$_POST["phone"],
				':entry_mode'	=>	$_POST["entry_mode"],
				':comments_remarks'	=>	$_POST["comments_remarks"],
				':image'		=>	$image,
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>
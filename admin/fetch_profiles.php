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
        //$statement = $connection->prepare("SELECT people.firstname, people.middlename, people.lastname, people.gender, people.idno, people.phone, people.entry_mode, people.comments_remarks, people.id FROM people JOIN tblbrands ON property.id=people.id");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}



$query = '';
$output = array();
//$query .= "SELECT * FROM people ";

$query .= "SELECT * FROM people INNER JOIN property ON property.id = people.address  ";

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE people.firstname LIKE "%'.$_POST["search"]["value"].'%" ';
        $query .= 'OR people.middlename LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR people.lastname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR people.gender LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR people.idno LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR people.phone LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR people.entry_mode LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR people.comments_remarks LIKE "%'.$_POST["search"]["value"].'%" ';

}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY people.id ASC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$image = '';
	if($row["image"] != '')
	{
		$image = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />';
	}
	else
	{
		$image = '';
	}
	$sub_array = array();
	$sub_array[] = $row["id"];
	$sub_array[] = $image;
	$sub_array[] = $row["firstname"];
        $sub_array[] = $row["middlename"];
	$sub_array[] = $row["lastname"];
	$sub_array[] = $row["gender"];
	$sub_array[] = $row["idno"];
	$sub_array[] = $row["phone"];
        
        $sub_array[] = $row["name"];
        $sub_array[] = $row["make"];
        
        
        
        /*
        $nyumbaid = $row["address"];
        $jengoid = $row["residence"];

        $query2 = "SELECT * FROM `property` WHERE `id` = '$nyumbaid'"; //`name` = '$nyumbaid' AND 


        //$rowHse = mysqli_fetch_array(mysqli_query($conn, $sql4)); 

        $statement2 = $connection->prepare($query2);
	$statement2->execute();
	$result2 = $statement2->fetchAll();
	
	foreach($result2 as $row2)
	{
		$aprtnm = $row2['make'];
                $hseno = $row2['name'];

                $sub_array[] = $aprtnm;
                //$sub_array[] = $hseno;
	}
         */
        
       // $nyumbaid = $row["address"];
        //$jengoid = $row["residence"];

        
        
        //$statement = $connection->prepare("SELECT image FROM people WHERE id = '$user_id'");
	//$statement->execute();
        //$result = $statement->fetchAll();
        
        //$PCT = "SELECT * FROM `property` WHERE `id` = '$nyumbaid'";
        //$queryPCT = mysql_query($connection, $PCT);// or die("Error, Contact the web admin it@jibumobi.com!!");
        //$rowPCT = mysql_fetch_array($queryPCT);
        //
        //extract($rowPCT);
        //
        //$make;
        //$name;
        
        //$stmt = $pdo->query("SELECT * FROM `property` WHERE `id` = '$nyumbaid'");
        //while ($row2 = $stmt->fetch()) 
        //{
        //    //echo $row['make']."<br />\n";
        //    $sub_array[] = $row2['make'];
        //}
        /*
        $stmt = $connection->query("SELECT * FROM `property` WHERE `id` = '$nyumbaid'");
        while ($row2 = $stmt->fetch(PDO::FETCH_NUM)) 
        {
         // print "Name: <p>{$row2[0] $row[1]}</p>";
          //$sub_array[] = $row2[0];
        }
        */ 
        
        //$sub_array[] = "Keren";
	//$sub_array[] = $row["entry_mode"];
	$sub_array[] = $row["status"];
	//$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>';

	$sub_array[] = '<i type="button" name="update" id="'.$row["id"].'" class="fa fa-pencil txt-warning update" style="color:#0000ff;">&nbsp;&nbsp;<i type="button" name="delete" id="'.$row["id"].'" class="fa fa-trash txt-warning delete" style="color:#ff0000;">';
	//$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
//'<a data-toggle="modal" href="#userModal"?id='+data[0]+'"><i class="fa fa-pencil txt-warning"></a>'

	$data[] = $sub_array;
}
$output = array(
	"draw"			=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"			=>	$data
);
echo json_encode($output);
?>
<?php  
 $connect = mysqli_connect("localhost", "root", "", "karengata_cims");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $firstname = mysqli_real_escape_string($connect, $_POST["firstname"]);  
      $lastname = mysqli_real_escape_string($connect, $_POST["lastname"]);  
      $gender = mysqli_real_escape_string($connect, $_POST["gender"]);  
      $phone = mysqli_real_escape_string($connect, $_POST["phone"]);  
      $member_no = mysqli_real_escape_string($connect, $_POST["member_no"]);
      $entry_mode = mysqli_real_escape_string($connect, $_POST["entry_mode"]);
      $comments_remarks = mysqli_real_escape_string($connect, $_POST["comments_remarks"]);

      if($_POST["userdetail_id"] != '')  
      {  
           $query = "  
           UPDATE userdetails   
           SET firstname='$firstname',   
           lastname='$lastname',   
           gender='$gender',   
           phone = '$phone',
           member_no = '$member_no',   
           entry_mode = '$entry_mode',
           comments_remarks = '$comments_remarks'   
           WHERE id='".$_POST["userdetail_id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO userdetails(firstname, lastname, gender, phone, member_no, entry_mode, comments_remarks)  
           VALUES('$firstname', '$lastname', '$gender', '$phone', '$member_no', '$entry_mode', '$comments_remarks');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM userdetails ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th >Member No.</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Entry Mode</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Action</th> 
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["id"] . '</td>
                          <td>' . $row["firstname"] . '</td>
                          <td>' . $row["lastname"] . '</td>
                          <td>' . $row["member_no"] . '</td>
                          <td>' . $row["gender"] . '</td>
                          <td>' . $row["phone"] . '</td>
                          <td>' . $row["entry_mode"] . '</td>  
                          <td>' . $row["comments_remarks"] . '</td>
                          <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>
 
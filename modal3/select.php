
  <?php  
 if(isset($_POST["userdetail_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "karengata_cims");  
      $query = "SELECT * FROM userdetails WHERE id = '".$_POST["userdetail_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td ><label>First Name</label></td>  
                     <td >'.$row["firstname"].'</td>  
                </tr>  
                <tr>  
                     <td ><label>Last Name</label></td>  
                     <td >'.$row["lastname"].'</td>  
                </tr>  
                <tr>  
                     <td ><label>Member Number</label></td>  
                     <td >'.$row["member_no"].'</td>  
                </tr>  
                <tr>  
                     <td ><label>Gender</label></td>  
                     <td >'.$row["gender"].'</td>  
                </tr>
                <tr>  
                     <td ><label>Phone Number</label></td>  
                     <td >'.$row["phone"].'</td>  
                </tr>  
                <tr>  
                     <td ><label>Entry Mode</label></td>  
                     <td >'.$row["entry_mode"].'</td>  
                </tr>  
                <tr>  
                     <td ><label>Comments Remarks</label></td>  
                     <td >'.$row["comments_remarks"].'</td>  
                </tr>  
                <tr>  
                     <td ><label>Member Number</label></td>  
                     <td >'.$row["member_no"].' </td>  
                </tr>  
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>
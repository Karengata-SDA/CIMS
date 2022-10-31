  <?php  
 $connect = mysqli_connect("localhost", "root", "", "karengata_cims");  
 #$query = "SELECT * FROM tbl_employee ORDER BY id DESC"; 
 $query = "SELECT * FROM userdetails ORDER BY id DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | PHP Ajax Update MySQL Data Through Bootstrap Modal</title>  
           <script src="extra/jquery.min.js"></script>  
           <link rel="stylesheet" href="extra/bootstrap.min.css" />  
           <script src="extra/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <!--div class="container" style="width:700px;"--> 
           <div class="container" style="width:100%;"> 
                <h3 align="center">PHP Ajax Update MySQL Data Through Bootstrap Modal</h3>  
                <br />  
                <div class="table-responsive">  
                     <div align="right">  
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>  
                     </div>  
                     <br />  
                     <div id="userdetail_table">  
                          <table class="table table-bordered">  
                               <tr>  
                                    <!--th width="70%">Employee Name</th>  
                                    <th width="15%">Edit</th>  
                                    <th width="15%">View</th-->  
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
                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
                               <tr>  
                                    <td><?php echo $row["id"]; ?></td> 
                                    <td><?php echo $row["firstname"]; ?></td>
                                    <td><?php echo $row["lastname"]; ?></td> 
                                    <td><?php echo $row["member_no"]; ?></td> 
                                    <td><?php echo $row["gender"]; ?></td>
                                    <td><?php echo $row["phone"]; ?></td>
                                    <td><?php echo $row["entry_mode"]; ?></td> 
                                    <td><?php echo $row["comments_remarks"]; ?></td>
                                      
                                    <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  
                                    <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>  
                               </tr>  
                               <?php  
                               }  
                               ?>  
                          </table>  
                     </div>  
                </div>  
           </div>  
      </body>  
 </html>  
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Employee Details</h4>  
                </div>  
                <div class="modal-body" id="user_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">PHP Ajax Update MySQL Data Through Bootstrap Modal</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>First Name</label>  
                          <input type="text" name="firstname" id="firstname" class="form-control" />  
                          <br />  
                          <label>Last Name</label>  
                          <textarea name="lastname" id="lastname" class="form-control"></textarea>  
                          <br /> 
                          <label>Member Number</label>  
                          <textarea name="member_no" id="member_no" class="form-control"></textarea>  
                          <br />  
                          <label>Select Gender</label>  
                          <select name="gender" id="gender" class="form-control">  
                               <option value="Male">Male</option>  
                               <option value="Female">Female</option>  
                          </select>  
                          <br />  
                          <label>Phone</label>  
                          <input type="text" name="phone" id="phone" class="form-control" />  
                          <br />  
                          <label>Entry Mode</label>  
                          <input type="text" name="entry_mode" id="entry_mode" class="form-control" />  
                          <br /> 
                          <label>Status </label>  
                          <input type="text" name="comments_remarks" id="comments_remarks" class="form-control" />  
                          <br />  
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
                dataType:"json",  
                success:function(data){  
                     $('#firstname').val(data.firstname);  
                     $('#lastname').val(data.lastname); 
                     $('#member_no').val(data.member_no);  
                     $('#gender').val(data.gender);  
                     $('#phone').val(data.phone);  
                     $('#entry_mode').val(data.entry_mode);
                     $('#comments_remarks').val(data.comments_remarks);  
                     $('#employee_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#firstname').val() == "")  
           {  
                alert("First Name is required");  
           }  
           else if($('#lastname').val() == '')  
           {  
                alert("Last Name is required");  
           }  
           else if($('#member_no').val() == '')  
           {  
                alert("Member Number is required");  
           }  
           else if($('#gender').val() == '')  
           {  
                alert(" is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#userdetail_table').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#user_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script>
 

fetch.php

 
  <?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "karengata_cims");  
 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM userdetails WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 
<table id="footable-1"  data-toggle="table" data-sortable="true" data-buttons-class='default btn-sm btn-outline' data-pagination="true" data-search="true" class="table table-hover  display  pb-30" data-tablesaw-mode="columntoggle"  cellspacing="0" >




																<thead>
																	<tr>
																		<th>#</th>
																		<th>First Name</th>
																		<th>Last Name</th>
																		<th >Mem#</th>
																		<th>Gender</th>
																		<th>Phone</th>
																		
																		<th>Entry Mode</th>
																		<th>Status</th>
																		<th>Action </th>
																		

																	</tr>
																</thead>
																<tfoot>
																	<tr>
																		<th>#</th>
																		<th>First Name</th>
																		<th>Last Name</th>
																		<th>Member No.</th>
																		<th>Gender</th>
																		<th>Phone</th>
																		
																		<th>Entry Mode</th>
																		<th>Status</th>
																		<th>Action </th>
																		

																	</tr>
																</tfoot>
												
  																<?php
																	include('conn.php');
																	
																	$query=mysqli_query($conn,"select * from `people` ");
																	while($row=mysqli_fetch_array($query)){
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
						                                    <!--td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td-->  
						                                    <!--td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td--> 

						                                    <td>
																<a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>

																<a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-trash-o txt-danger"></i></a>
																&nbsp;&nbsp;
						                                    	
																
															</td> 
															<?php include('button.php'); ?>


						   <!--td>
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
                                    </td-->
						                               </tr>  
						                               <?php  
						                               }  
						                               ?> 
  													
													
												
											</table>

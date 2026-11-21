<?php
session_start();
 $con=mysqli_connect('localhost', 'root', '', 'multi_user');
?>	
<html>
<head>
</head>	
<body id="contianer">
<div id="bod">																						
							<form name="per_info" enctype="multipart/form-data" method="POST">			
							<?php
							$username=$_GET["username"];
							$sql="SELECT * FROM user where username='$username'";
	                        $result = mysqli_query($con, $sql);
							$row1 = mysqli_fetch_array($result);
							 ?>		
							 <br>								
										<center>
								<div class="modal-content" style="margin-top : 5px; width : 750px; height: 600px; align :center;">
										<div class="modal-header">
											<div class="modal-title"><h3>Activate or De-Activate user account</h3></div>
										</div>
										<div class="modal-body">													
											<?php 
			echo"<table align='center' width='500px' height='370px'>";
			echo"<tr>";
			echo"<td><b>FirstName:</b></td>";
			echo'<td>';
			echo $row1['FirstName']."</td></tr>";
			echo"<td><b>MiddleName:</b></td>";
			echo'<td>';
			echo $row1['MiddleName']."</td></tr>";			
			echo"<td><b>LastName:</b></td>";
			echo'<td>';
			echo $row1['LastName']."</td></tr>";
			echo"<td><b>username:</b></td>";									
			echo'<td>';
			echo $row1['username']."</td></tr>";		
			echo"<td><b>MobileNumber:</b></td>";									
			echo'<td>';
			echo $row1['MobileNumber']."</td></tr>";						
			echo"<td><b>Password:</b></td>";
			echo'<td>';
			echo $row1['Password']."</td></tr>";								
			echo"<td><b>type:</b></td>";									
			echo'<td>';
			echo $row1['type']."</td></tr>";
			echo"<td><b>Status:</b></td>";									
			echo'<td>';
			echo $row1['Status']."</td></tr>";			
			echo"</table>";
												
											?><div id="" style="overflow:scroll; height:400px;">
											<?php echo '</div>';?>
											<?php 
								$run="SELECT * FROM user where username='$username'";
	                            $row = mysqli_query($con, $run);	
								$mail=$row['username'];
												//$subject="wolaita sodo CDEP School";
								$status=$row['status'];
											?>
										</div>																	
										<div class="modal-footer">
										<?php 
										$Active="Active";
										$deactive="De-Active";
										if($status==$Active){										
										echo'<input type="submit" name="deactive" value="De-Activate" class="btn btn-danger">';
										}
										else if($status==$deactive){
										echo'	<input type="submit" name="active" value="Activate" class="btn btn-success">';
										}	
										else{
										echo '<input type="submit" name="active" value="Activate" class="btn btn-success">';
										}
										?>
										<input type="submit" name="cancel" value="Cancel" class="btn default">	
										</div>
										</form>
									</div>									
								</center>
<?php 
						if(isset($_POST['active'])){									
								    $dt = "Active";
								    mysqli_query("update user set status = '$dt'  where username='$username'")or die(mysqli_error());
									//mysql_query("update customers set Customer_ID = '$dt'  where User_type = '$username'")or die(mysql_error());
									$message = "Dear $username your Account has been Activated. Please don't replay!!!!!";
									//mail($mail, $subject, $message, "From: "."gutema@gmail.com");
									echo"<script>alert('This Account has been Activated')</script>";
									//echo "<script>windows: location='managerpage.php?da='</script>";
							}
						else if(isset($_POST['deactive'])){
						            $dt = "De-Active";
									mysqli_query("update user set status = '$dt'  where username='$username'")or die(mysqli_error());
									$message = "Dear $id $id your Account has been De-Activated. Please don't replay!!!!!";
									//mail($mail, $subject, $message, "From: "."gutema@gmail.com");
									echo"<script>alert('This Account has been De-Activated')</script>";
									echo "<script>windows: location='AdminPage.php?da='</script>";
							}
						else if(isset($_POST['cancel'])){											
									echo "<script>windows: location='Menu.php?da='</script>";
							}		
							?>
		 </div></body>
		 </html>
<?php 
 $con=mysqli_connect('localhost', 'root', '', 'multi_user');
 if(isset($_POST['apply'])){
$FullName=($_POST['name']);
$Age=($_POST['age']);
$PhoneNO=($_POST['pno']);
$Address=($_POST['address']);
$HomeTown=($_POST['hometown']);
$YearofGrat=($_POST['yeargr']);
$Experience=($_POST['experience']);
$Sex=($_POST['sex']);
$target_file = $_FILES['fileToUpload']['name'];
$target = "images/".basename($target_file);
$q=mysqli_query($con,"insert into apply(FullName, Age, PhoneNO, Address, HomeTown, YearofGrat, Experience, Sex, UploadFile) values('$FullName', '$Age', '$PhoneNO', '$Address', '$HomeTown', '$YearofGrat', '$Experience', '$Sex', '$target_file')");
if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target)) {
  		 echo"Registered Successfully!";
		 echo' <meta content="2"registration.php" http-equiv="refresh" />';
	
  	}else{
  		$msg = "Failed to register Please Try Again";
  	}
}
  ?>
<?php
session_start();
$con=mysqli_connect('localhost', 'root', '', 'multi_user');
?>
<html>
<head>
<title>WSSBMS</title>
<link rel="stylesheet" href="registration.css" type="text/css">
<script>
        function validateForm() {
            var x = document.forms["myForm"]["name"].value;
            var age = document.forms["myForm"]["age"].value;	
            var phone number = document.forms["myForm"]["pno"].value;
            var address = document.forms["myForm"]["address"].value;
            var hometown = document.forms["myForm"]["hometown"].value;
            var year of graguation = document.forms["myForm"]["yeargr"].value;
			var experience = document.forms["myForm"]["experience"].value;
            var sex = document.forms["myForm"]["sex"].value;
            var fileToUpload = document.forms["myForm"]["fileToUpload"].value;
            if (x == "") {
                alert("Please enter Your Full Name.");
                return false;
                } 
            if (age == null || age == "") {
                alert("Please enter your age.");
                return false;
            }
            if (age.min<18 || age.max>99) {
            alert(""Age must be number and between 18 and 99.");
                return false;
            }   			
            if (phone number == null || phone number == "") {
                alert("Please enter your phone number.");
                return false;
                } 
		    if (phone number.length<10) {
                alert("Phone number should be minimum 10 digits.");
                return false;
            }
            if (address == null || address == "") {
                alert("Please enter the address.");
                return false;
            } 				
            if (hometown == null || hometown == "") {
                alert("Please enter your hometown.");
                return false;
                } 
            if (year of graguation == null || year of graguation == "") {
                alert("Please enter the year of graguation.");
                return false;
            }
            if (experience == null || experience == "") {
                alert("Please enter experience.");
                return false;
                } 
            if (sex == null || sex == "") {
                alert("Please select sex.");
                return false;
            }
			 if (fileToUpload == null || fileToUpload == "") {
                alert("Please upload a file.");
                return false;
            }
        } 
</script>
</head>
<body>
<img src="logo.JPG" width="100%" height="100">
<div class="menu">
<ul>
   <li><a href="Menu.php">Home</a></li>
   <li><a>Services</a>
     <ul>
	    <li><a href="vacancy.php">Vacancy</a></li>
	    <li><a href="registration.php">Apply</a></li>
	    <li><a href="result.php">Result</a></li>
	 </ul>
    </li>
     <li><a>About Us</a>
     <ul>
	    <li><a href="abtbr.php">Bureau</a></li>
	    <li><a href="abttm.php">Team</a></li>
	 </ul>
    </li>
   <li><a href="contact.php">Contact Us</a></li>
   <li><a href="help.php">Help</a></li>
   </ul>
   </div>
<div class="register">
<h1> Job Apply Form </h1>
<form method="POST" name="myForm" id="register" action="registration.php" enctype="multipart/form-data" onsubmit="return validateForm()">
<label> Full Name:</label><br>
<input type="text" name="name" id="name" value="" pattern="[a-zA-Z\s]{3,100}" required="Please Enter Above 3 char" placeholder="Enter U R Full Name" title=" Please enter valid first name above 3 character"><br><br>
<label> Age:</label><br>
<input type="number" name="age" id="num" value="" min="18" max="60" required="Please Enter Above 18" placeholder="Enter U R Age" title=" Please enter valid age must be between 18 and 60"><br><br>
<label> Phone Number:</label><br>
<input type="tel" name="pno" id="num"  pattern="^\d{10}$" required="Please Enter 10 digits" placeholder="Enter U R Phone Number" title="Please enter valid phone number must be 10 digits"><br><br>
<label> Address:</label><br>
<input type="text" name="address" id="name" value="" pattern="[a-zA-Z\s]{3,100}" required="Please Enter Above 3 char" placeholder="Enter U R Address" ><br><br>
<label> Home Town:</label><br>
<input type="text" name="hometown" id="name" value="" pattern="[a-zA-Z\s]{3,100}" required="Please Enter Above 3 char" placeholder="Enter U R Home Town" ><br><br>
<label> Year of Graduation:</label><br>
<input type="number" name="yeargr" id="num" value="" min="1990" max="2019" required="Please Enter the number b/n 1990 and 2019" placeholder="Enter Year of Graduation" ><br><br>
<label> Experience:</label><br>
<input type="text" name="experience" id="name" value="" pattern="[a-zA-Z\s]{3,100}" required="Please Enter capital letter Above 3 char" placeholder="Enter Experience" ><br><br>
<label> Sex:</label><br>
<select required x-moz-errormessage="Select Your sex" id="name" name="sex" size="1">
<option value=""></option>
<option>Male</option>
<option>Female</option>
</select><br><br>
<label> Upload:</label><br>
<input type="file" name="fileToUpload" id="input" accept="images/" value="" required="Please upload the file" >
<input type="hidden" name="size" value="1000000"/><br><br>

<input type="submit" value="Submit" id="sub" name="apply">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" value="Cancel" id="sub"><br>
<?php 
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
	
  	}else{
  		$msg = "Failed to register Please Try Again";
  	}
}
  ?>
</form>
</div>
</body>

</html>

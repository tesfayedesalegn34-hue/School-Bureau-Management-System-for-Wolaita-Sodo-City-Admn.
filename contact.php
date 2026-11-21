<?php
session_start();
?>
<html>
<head>
<title>contact</title>
<link rel="stylesheet" href="" type="text/css">
<style>
body{
    background:url(bkimg.jpeg) no-repeat;
	background-size:100% 700px;
	background-size:cover;
	font-family:Arial;
	color:white;	
}
ul{
	margin:0px;
	padding:0px;
	list-style:none;
}
ul li {
	float:left;
	width:200px;
	height:40px;
	background-color:black;
	opacity:.8;
	line-height:40px;
	text-align:center;
	font-size:20px;
	margin-right:1px;
}
ul li a{
	text-decoration:none;
	color:white;
	display:block;
}
ul li a:hover{
	background-color:green;
}
ul li ul li {
	display:none;
}
ul li:hover ul li {
	display:block;
}
.menu{
	margin-left:150px;
}
#con{
	margin-left:650px;
	margin-top:100px;
</style>
</head>
<body>
<img src="logo.JPG" id="logo" width="100%"; height="100";>
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
   <div id="con">
       <img src="contact.jpg" width="300" height="60">
                   <table width="300" border="" cellpadding="0" cellspacing="0" >
                                  <tbody>
                                    <tr>
                                    <tr><td ><img src="tel.png" width="100" height="50"></td></tr>
                                    <tr><td > Phone 0911554034 </td></tr>
                                    <tr><td ><img src="emil.jpg" width="100" height="50"></td></tr>
                                      <tr><td >Sbms@gmail.com </td></tr>
                                    
                                  </tbody>
                                </table>
  </div>  
   </body>
   </html>
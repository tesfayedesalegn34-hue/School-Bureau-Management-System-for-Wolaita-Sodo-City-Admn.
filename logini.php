<?php
include("conn.php");
session_start();
?>
    
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Start Page</title>
<!--slide show-->
	<link href="themes/8/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/8/js-image-slider.js" type="text/javascript"></script>
    <link href="themes/8/tooltip.css" rel="stylesheet" type="text/css" />
    <script src="themes/8/tooltip.js" type="text/javascript"></script>
    <link href="generic.css" rel="stylesheet" type="text/css" />
   <!--End of slide show-->
      <link rel="icon" type="images/jpg" href="logo.png" />
    <link href="ddmenu.css" rel="stylesheet" type="text/css" />
    <script src="ddmenu.js" type="text/javascript"></script>
<link href="styles.css" rel="stylesheet" type="text/css" media="screen"/>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


</head>
<body style='background: url(yy4.jpg) repeat; width: 99%;'>
<div id="art-page-background-glare">
        <div id="art-page-background-glare-image"></div>
<div id="outer">
<div id="one"> 
<div id="holder">
  <div id="station">
  <div id="logo_text"> <image src="images/logo.png"width="900"/></div>
  </div>
   
  <div id="topss" >
 <nav id="ddmenu">
    
    <ul>
        <li class="no-sub">
           <a class="top-heading" a href="index.php">Home</a>
        </li>
		
		
		
        <li class="no-sub">
		<a class="top-heading" a href="ContactUs.php">Contact us</a>
		</li>
		
        <li class="no-sub">
            <a class="top-heading" a href="logini.php">Login</a>
        </li>
    </ul>
</nav>

</div>
<br />
<div id="slides">
<?php
//SESSION_START();
$conn=mysql_connect("localhost","root","");
mysql_select_db("tcms",$conn);
if (isset($_POST['Login'])){ 
	    $username=$_POST['un'];
	    $password=$_POST['pw'];
	    $sql ="SELECT * FROM account WHERE user_name='$username' AND password='$password'";
	    $result = mysql_query($sql); 
		//$rowCheck = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		if($row['type']=='admin'){ 
		$_SESSION['user_name']['password'] = $result['password'];
         echo "<script>window.location='adminhome.php';</script>";
		}			 		
		else {
		
		echo'<br>';
       echo' <p class="wrong" style="color:red;" >Invalid Username or/and Password!</p>';                                
		   echo' <meta content="5;logini.php" http-equiv="refresh" />';	
		}
		}
    mysql_close($conn);
?>
                   <form  action="logini.php" method="post" name="form" onSubmit="return validate()"target=_self >
				   
				

      <td valign="top">
<br>
<br>
	
<div style="width:420px; height:350px; margin:0 auto; position:relative; border:2px solid rgba(0,0,0,0); -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:25px; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:20px; color:#000000;">

 <div style="background-color:#336699;border-radius:5px;font-family:Arial, Helvetica, sans-serif; color:#000000; padding:5px; height:22px;"> 
 
 
       <div style="background-color:#336699;border-radius:5px;font-family:Arial, Helvetica, sans-serif; color:#000000; padding:5px; height:22px;"> 
 <div style="float:left;" ><strong><font color="white" size="2px"> LOGIN PAGE</font></strong></div>
 <div style="float:right; margin-right:20px; background-color:#cccccc; width:25px;  text-align:center; border-radius:10px; height:12px;">
 <a href="index.php" title="Close"><img src="images/clos.png"></a></div>
 
 </div>
                        <p align="center"><img src="login.jpg" width="201" height="140"/></p> 
                       
                        <label><p align="center">Username:&nbsp;&nbsp;</label>  <input type="text" name="un" size="15" placeholder="Name"/><span id="firstnameerror" class="error" ></span> <br />
                        <label><p align="center">Password :&nbsp;&nbsp;</label><input type="password" name="pw"  size="15" placeholder="**********" /><span id="passworderror" class="error" ></span></span><br />
                        <div align="center">
                        <p><input type="submit" value="Login" name="Login" Onclick="return check(this.form);"/>
                        <input name="reset" type="Reset" value="Cancel" />
						
                        
                        </div>
                  </form>   
    </div>
        <!-- row end -->
  </div>
    
    
      <div id="footer" >
  <p class="footer-text">Copyright &copy; All Rights Reserved</p>

</div></div></div>
</body>
</html>




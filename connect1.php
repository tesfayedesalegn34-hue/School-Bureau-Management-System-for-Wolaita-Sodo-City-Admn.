<?php
$conn=mysql_connect("localhost","root","");//create connection
if(!$conn)
{
echo"Error in Connection".mysql_error();
}
else
{
$db=mysql_select_db("multi_user",$conn);//to select from the db
	if(!$db)
	{
	echo"Error in Database selection".mysql_error();
	}
}
?>
<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['type']);
session_destroy();
header("Location:Menu.php");
exit;
?>
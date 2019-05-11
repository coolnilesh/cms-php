<?php
include "db.php";
?>
<?php
session_start();


$_SESSION['user_id']=null;
$_SESSION['username']=null;

$_SESSION['email']=null;
$_SESSION['user_role']=null;
 header("location:../index.php");
?>
 
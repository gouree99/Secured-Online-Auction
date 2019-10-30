<?php
//session_start();
$u_id=$_GET['u_id'];
$connection=mysqli_connect('localhost', 'shalva', 'Shalva03', 'gouri');
$query="DELETE FROM user where u_id=$u_id";
$result=mysqli_query($connection,$query);
header('Location:admin.php');
?>
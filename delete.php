<?php
//session_start();
$p_id=$_GET['p_id'];
$connection=mysqli_connect('localhost', 'shalva', 'Shalva03', 'gouri');
$query="DELETE FROM product where p_id=$p_id";
$result=mysqli_query($connection,$query);
header('Location:seller_delete.php');
?>
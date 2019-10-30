<?php
session_start();
if (isset($_SESSION['id']))
{
    $u_id = $_SESSION['id'];
}
else
{
    header('Location:encrypt.html');
}
$p_id=$_GET['p_id'];
$buyer_id=$_GET['buyer_id'];
$connection=mysqli_connect('localhost', 'shalva', 'Shalva03', 'gouri');
$query="UPDATE product SET status='0' where p_id='$p_id' and buyer_id=$buyer_id";
$result=mysqli_query($connection,$query);
$query1="UPDATE buyer SET active='sold' where p_id='$p_id' and u_id=$buyer_id";
$result1=mysqli_query($connection,$query1);
header("Location:seller_index.php");
?>
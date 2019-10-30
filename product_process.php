<?php
session_start();
$bid_price=$_POST['bid_price'];
$p_id=$_GET['p_id'];
$u_id=$_SESSION['id'];
$connection=mysqli_connect('localhost', 'shalva', 'Shalva03', 'gouri');
$query="SELECT expected_price, max_price from product where p_id=$p_id";
$result=mysqli_query($connection,$query);
$data_price=mysqli_fetch_assoc($result);
$exp_price=$data_price['expected_price'];
$max_price=$data_price['max_price'];
if($bid_price>$exp_price)
{
    $query1="INSERT INTO buyer(u_id,p_id,bid_amt,active) values('$u_id','$p_id','$bid_price','Bid')";
    $result1=mysqli_query($connection,$query1);
}
if($bid_price>$max_price)
{
    $query2="UPDATE product SET max_price='$bid_price',buyer_id='$u_id' where p_id='$p_id'";
    $result2=mysqli_query($connection,$query2);
}
elseif ($bid_price<$exp_price)
{
    echo "<H1>YOUR BID PRICE IS LESS THAN EXPECTED PRICE</H1>";
}
header("Location:buyer.php");
?>
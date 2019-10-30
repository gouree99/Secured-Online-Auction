<?php
 $connection=mysqli_connect('localhost', 'shalva', 'Shalva03', 'gouri');
 if($connection)
 {
     echo "Database online"."<br>";
 }
$query="SELECT * FROM image";
$result=mysqli_query($connection,$query);
$data=mysqli_fetch_row($result);
print($data[0]);
?>
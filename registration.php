<?php
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $phone=$_POST['phone'];
    $choice=$_POST['choice'];
    $flag=0;
    $connection = mysqli_connect('localhost', 'shalva', 'Shalva03', 'gouri');
    if($connection)
    {
        echo "database online"."<br>";
    }
    else 
    {
        die("database not online" . mysqli_error($connection));
    }
    $query_buyer= "INSERT INTO user(email,password,first_name,last_name,phone,role) VALUES('$email','$password','$firstname','$lastname','$phone','$choice')";
    $result = mysqli_query($connection,$query_buyer);

    if ($result) 
    {
        header("Location:login.html");
    } 
    else 
    {
        die("Unsuccessful" . mysqli_error($connection));
    }
 
}
?>
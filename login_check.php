<?php
if(isset($_POST['login']))
    {   
        if(!isset($_SESSION['id']))
        {
          header("Location:encrypt.html");
        }
        session_start();
        $email=$_POST['email'];
        $password=$_POST['password'];
        echo "data sent".'<br>';

        $connection=mysqli_connect('localhost', 'shalva', 'Shalva03', 'gouri');
        if($connection)
        {
            echo "Database online"."<br>";
        }
       $query="SELECT role from user where email='$email' and Password='$password'";
       $query_id="SELECT u_id,first_name,role from user where email='$email' and Password='$password'";
       $result=mysqli_query($connection,$query);
       $result_id=mysqli_query($connection,$query_id);
       $data=mysqli_fetch_row($result);
       $id_data=mysqli_fetch_assoc($result_id);   
       $id=$id_data['u_id'];
       $role=$id_data['role'];
       $name=$id_data['first_name'];
       $_SESSION['id']=$id;
       $_SESSION['role']=$role;
       if($data[0]=="seller")
       {
           header('Location:seller_index.php');
       }
       if($data[0]=="admin")
       {
           header('Location:admin.php');
       }
       if($data[0]=="buyer")
       {
           header('Location:buyer.php');
       }
    }

?>
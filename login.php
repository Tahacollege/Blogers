<?php
require "db.php";
$msg="";
if($_SERVER['REQUEST_METHOD']=="POST"){
    $email=$_POST['email'];
    $name=strtoupper($_POST['name']);
    $password=$_POST['password'];
    $sql="SELECT email,password FROM users WHERE email='$email' AND password='$password';";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        session_start();
        $_SESSION['login']=true;
        $_SESSION['name']=$name;
        $msg="Welcome $name";
        header("location:index.php?message=$msg");
    }
else{
    $msg="Username Or Password Is invalid ";
        header("location:index.php?message=$msg");
}
}
?>
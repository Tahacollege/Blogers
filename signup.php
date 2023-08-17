<?php
require "db.php";
$msg="";
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=strtoupper($_POST['uname']);
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $instaid=$_POST['instaid'];
    $linkdinid=$_POST['linkdinid'];
    if($cpassword==$password){
        $sql="INSERT INTO users VALUES ('$email','$password','$name','$instaid','$linkdinid')";
        $result=mysqli_query($conn,$sql);
        session_start();
        $_SESSION['login']=true;
        $_SESSION['name']=$name;
        if($result){
            $msg="Welcome $name";
            header("location:index.php?message=$msg");
        }
    }
    else{
        $msg="Password Do Not Match Try Again";
            header("location:index.php?message=$msg");
    }
    
}
?>
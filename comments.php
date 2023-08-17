<?php
require "db.php";
session_start();
$name=$_SESSION['name'];
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
if($_SERVER['REQUEST_METHOD']=="POST"){
$comment=$_POST['comment'];

$sql="INSERT INTO comments VALUES($id,'$name','$comment')";
$result=mysqli_query($conn,$sql);
if($result){
    $msg="Your Comment Have Been Posted";
    header("location:deatils.php?message='$msg'&id='$id'");
}
}
?>
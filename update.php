<?php
require "db.php";
session_start();
$username=$_SESSION['name'];
if(isset($_GET['editid'])){
    $id=$_GET['editid'];
    $heading=$_POST['heading'];
    $content=$_POST['content'];
    $category=$_POST['category'];
    $file=$_FILES['file']['name'];
    $filefound=$file;
    $position="upload/".$filefound;
    move_uploaded_file($_FILES['file']['tmp_name'],$position);
    $sql="UPDATE posts SET heading='$heading' , file='$file' ,content='$content', category='$category' WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        if($result){
            
            header("location:deatils.php?id=$id");
        }
    }
}
else{
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $email=$_POST['email'];
        $instaid=$_POST['instaid'];
        $linkdinId=$_POST['linkdinid'];
        $password=$_POST['password'];
        $name=$_POST['name'];
        $sql="UPDATE users SET name='$name' , instaid='$instaid' ,linkdinid='$linkdinID', password='$password', email='$email' WHERE name='$username'";
        $result=mysqli_query($conn,$sql);
        if($result){
            header("location:profile.php");
        }
    }
}
?>
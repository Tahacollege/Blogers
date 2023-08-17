<?php
require "db.php";
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=$_SESSION['name'];
    $heading=$_POST['heading'];
    $content=$_POST['content'];
    $category=$_POST['category'];
    $file=$_FILES['file']['name'];
    $filefound=$file;
    $position="upload/".$filefound;
    move_uploaded_file($_FILES['file']['tmp_name'],$position);
    $sql="INSERT INTO posts (name,heading,file,content,category)VALUES('$name','$heading','$file','$content','$category')";    
    $result=mysqli_query($conn,$sql);
    if($result){
        $msg="Your Blog have Been Posted";
        header("location:index.php?message=$msg");
    }
}
?>
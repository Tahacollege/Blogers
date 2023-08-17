<?php
require "db.php";
require "nav.php";
echo '
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blogers</title>
    <link type="text/css" href="indexupdate.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    </head>
  <body>';
  if(isset($_GET['message'])){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>'.$_GET['message'].'</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
echo '<br>';
$sql="SELECT * FROM posts";
$result=mysqli_query($conn,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $name=$row['name'];
        $heading=$row['heading'];
        $file="./upload/".$row['file'];
        $content=$row['content'];
        $pre=substr($content,0,550);
        $category=$row['category'];
        $cat=strtoupper($category);
        $id=$row['id'];
  echo '<a href="deatils.php?id='.$id.'" id="a"><div class="card mb-3 mx-3" id="indexblogs" >
  <div class="row g-0">
    <div class="col-md-4">
      <img src='.$file.' class="img-fluid rounded-circle" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <u><h3 class="card-title" style="font-weight: 900;">'.$heading.'</h5></u>
        <h5 class="card-title" style="font-weight: 900;">By:- '.$name.'</h5>
        <p class="card-text">'.$pre.'......</p><br>
        <center><p class="card-text text-bg-primary p-3"><small class="text-body-dark">'.$cat.'</small></p></center>
      </div>
    </div>
  </div>
</div></a><hr>';
    }
}

    echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
';
?>
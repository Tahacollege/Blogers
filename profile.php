<?php
require "db.php";
require "nav.php";
$username=$_SESSION['name'];
$sql="SELECT * FROM posts WHERE name='$username'";
  $result=mysqli_query($conn,$sql);
  if($result){
    $num=mysqli_num_rows($result);
  }
$sql="SELECT * FROM users WHERE name='$username'";
$result=mysqli_query($conn,$sql);
if($result){
    
    while($row=mysqli_fetch_assoc($result)){
        $email=$row['email'];
        $instaid=$row['instaid'];
        $linkdinId=$row['linkdinid'];
        $password=$row['password'];
        $name=$row['name'];
echo '
<div class="modal fade" id="updatemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="update.php" method="POST">
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label" >Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="inputEmail3" name="email" value="'.$email.'">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label" >Username</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" name="name" value="'.$name.'">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">InstaID</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputPassword3" name="instaid" value="'.$instaid.'">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">LinkdinID</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputPassword3" name="linkdinid" value="'.$linkdinId.'">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputPassword3" name="password" value="'.$password.'">
        </div>
      </div>
      <center><button type="submit" class="btn btn-primary">LogIN</button></center>
    </form>
      </div>
     
    </div>
  </div>
</div>';
}
}


echo '<!doctype html>
<html lang="en">
  <head>
  <link type="text/css" href="profilepage.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>';
  

  $sql="SELECT * FROM users WHERE name='$username'";
  $result=mysqli_query($conn,$sql);
  if($result){
   
      while($row=mysqli_fetch_assoc($result)){
          $email=$row['email'];
          $istaid=$row['instaid'];
          $linkdinId=$row['linkdinid'];
          $password=$row['password'];
  echo '<center><div class="col-sm-6 mb-3 mb-sm-0" id="profile">
    <div class="card" id="transparent">
      <div class="card-body">
        <h5 class="card-title">Name:- '.$username.'</h5>
        <h5 class="card-title">Posts:- '.$num.'</h5>
        <p class="card-text">Email:- '.$email.'</p>
        <p class="card-text">Password:- '.$password.'</p>
        <div class="card text-center" >
  <div class="card-body" id="transparent">
    <p class="card-text">If You Liked This Post Plese Follow Me On Following Social Media Accounts</p>
    <a class="navbar-brand mx-5" href="'.$istaid.'">
  <img src="./images/instagramlogo.jpg"  id="bottom" width="90" height="90" class="d-inline-block align-text-top"></a>
  <a class="navbar-brand mx-5" href="'.$linkdinId.'">
  <img src="./images/linked.jpg" id="bottom"  width="90" height="90" class="d-inline-block align-text-top mx-5"></a>
  </div>
</div>
<button type="button" class="btn btn-info mx-3" data-bs-toggle="modal" data-bs-target="#updatemodal">Edit</button>
</center>
        

      </div>
    </div>
  </div>
</div>


';
      }
    }
  $sql="SELECT * FROM posts WHERE name='$username'";
  $result=mysqli_query($conn,$sql);
  if($result){
    $num=mysqli_num_rows($result);
    while($row=mysqli_fetch_assoc($result)){
        $heading=$row['heading'];
        $file="./upload/".$row['file'];
        $content=$row['content'];
        $pre=substr($content,0,550);
        $category=$row['category'];
        $cat=strtoupper($category);
        $id=$row['id'];
  

  echo '<div class="card mb-3"  id="transparent">
  <div class="row g-0">
    <div class="col-md-4">
    <a href="deatils.php?id='.$id.'" id="a"><br><img src='.$file.' class="img-fluid rounded-circle" height="400px"></a>
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <a href="deatils.php?id='.$id.'" id="a"><center><u><b><h5 class="card-title fs-2">'.$heading.'</h5></u></b></center></a>
        <p class="card-text fs-4">'.$pre.'.....</p>
        <center><b><p class="card-text">'.$cat.'</small></b></p></center><br><br>
       <center><a href="post.php?editid='.$id.'"><button class="btn btn-secondary" style="width:600px;">Edit</button></a></center>
      </div>
    </div>
  </div>
</div><hr>';
    }
  }

  
    echo '<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
';
?>
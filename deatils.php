<?php
require "db.php";
require "nav.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
echo '
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link type="text/css" href="detailsup.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>';
  if(isset($_GET['message'])){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>'.$_GET['message'].'</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  $sql="SELECT * FROM posts WHERE id=$id";
  $result=mysqli_query($conn,$sql);
  if($result){
    while($row=mysqli_fetch_assoc($result)){
        $name=strtoupper($row['name']);
        $heading=$row['heading'];
        $file="./upload/".$row['file'];
        $content=$row['content'];
        $category=$row['category'];
        $cat=strtoupper($category);
  echo '<br><div class="card mb-3" id="trans">
  <img src='.$file.' class="card-img-top" alt="...">
  <div class="card-body">
    <br><u><center><h5 class="card-title fs-1">'.$heading.'</h5></center></u><br>
    <p class="card-text fs-3 fst-italic font-monospace">'.$content.'</p><hr>
   
  </div>
</div>';
    }
    if(isset($_SESSION['login'])=="true"){
      echo '<center><h1 style="color: white;background-color:black;width:300px;border-radius:25px">Comment</h1></center>
      <div class="container" id="comment">
        <div class="mb-3">
        <form action="comments.php?id='.$id.'" method="post">
        </div>
        <div class="form-group">
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Comment:</label>
            <textarea class="form-control" placeholder="Enter Your Comment Here" name="comment"></textarea>
          </div>
        </div>
          <button type="submit" class="btn btn-success">Post Comment</button><hr>
        </form>
        </div>
        ';

    }
    echo '<center><h1 class="text-center" style="color: white;background-color:black;width:300px;border-radius:25px;"> Comments</h1></center>';
    $sql="SELECT * FROM comments WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $name=$row['name'];
        $comment=$row['comment'];
        echo '<div class="row align-items-md-stretch ">
        <div class="col-md-10">
          <div class="h-8 p-5 text-bg-light rounded-3">
          
          <div class="d-flex my-3">
    <div class="flex-shrink-0">
      <img src="images/user.png" class="rounded-pill my-3" width="80px" alt="...">
    </div>
    <div class="ms-3">
    <h5 class="mt-4 ">'.$name.'</h5>
      <p>'.$comment.'</p>
    </div>
  </div>
  </div>
  </div>
  </div><hr>';
    }
   
    echo '<div class="card text-center" >
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">BY:- '.$name.'</h5>';
    $sql="SELECT instaid, linkdinid FROM users WHERE name='$name'";
    $result=mysqli_query($conn,$sql);
    if($result){
      while($row=mysqli_fetch_assoc($result)){
        $instaid=$row['instaid'];
        $linkdinid=$row['linkdinid'];
    echo '<p class="card-text">If You Liked This Post Plese Follow Me On Following Social Media Accounts</p>
    <a class="navbar-brand mx-5" href="'.$instaid.'">
  <img src="./images/instagramlogo.jpg"  id="bottom" width="90" height="90" class="d-inline-block align-text-top"></a>
  <a class="navbar-brand mx-5" href="'.$linkdinid.'">
  <img src="./images/linked.jpg" id="bottom"  width="90" height="90" class="d-inline-block align-text-top mx-5"></a>
  

  </div>
  <div class="card-footer text-b
  ody-secondary">
    2 days ago
  </div>
</div>';
      }
    }
}
    echo '
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    </body>
</html>
';
?>
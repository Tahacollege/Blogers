<?php
require "db.php";
require "nav.php";
if(isset($_GET['editid'])){
$id=$_GET['editid'];
$sql="SELECT * FROM posts WHERE id=$id";
$result=mysqli_query($conn,$sql);

if($result){
while($row=mysqli_fetch_assoc($result)){
  $heading=$row['heading'];
  $content=$row['content'];
  $category=$row['category'];
  $file=$row['file'];
    echo '
<!doctype html>
<html lang="en">
  <head>
  <script>

  </script>
  <link type="text/css" href="post.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
  <center>
  <div class="container-fluid" id="div">
 
  <form action="update.php?editid='.$id.'" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label topics" >Heading</label>
  <input type="text" name="heading"  id="div" class="form-control" id="exampleFormControlInput1" value="'.$heading.'">
</div>
<div>
  
  <input class="form-control  form-control-lg" name="file" id="formFileLg" id="div" accept=".png, .jpg" type="file">
</div><br>
<select name="category" >
<option>'.$category.'</option>
<option value="fashion">Fashion</option>
<option value="sports">sports</option>
<option value="Online Gaming">Online Gaming</option>
<option value="Technology">Technology</option>
<option value="Automobiles">Automobiles</option>
<option value="Economy">Economy</option>
<option value="Politics">Politics</option>
<option value="Science">Science</option>
<option value="Nature">Nature</option>
<option value="Movies&Series">Movies&Series</option>
</select>
<div class="mb-3" >
  <label for="exampleFormControlTextarea1" class="form-label topics" >Content</label>
  <textarea class="form-control" id="div"  name="content" id="exampleFormControlTextarea1"  rows="20" >'.$content.'</textarea><br>
  <button type="submit" class="btn btn-primary" id="btn">Submit</button>
</div>
  </form>

</div>
</center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    </body>
</html>
';
}
}
}else{
  echo '
  <!doctype html>
  <html lang="en">
    <head>
    <script>
  
    </script>
    <link type="text/css" href="post.css" rel="stylesheet">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Bootstrap demo</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
    <center>
    <div class="container-fluid" id="div">
   
    <form action="blogs.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label topics" >Heading</label>
    <input type="text" name="heading"  id="div" class="form-control" id="exampleFormControlInput1">
  </div>
  <div>
    
    <input class="form-control  form-control-lg" name="file" id="formFileLg" id="div" accept=".png, .jpg" type="file">
  </div><br>
  <select name="category" >
  <option>Select Category</option>
  <option value="fashion">Fashion</option>
  <option value="sports">sports</option>
  <option value="Online Gaming">Online Gaming</option>
  <option value="Technology">Technology</option>
  <option value="Automobiles">Automobiles</option>
  <option value="Economy">Economy</option>
  <option value="Politics">Politics</option>
  <option value="Science">Science</option>
  <option value="Nature">Nature</option>
  <option value="Movies&Series">Movies&Series</option>
  </select>
  <div class="mb-3" >
    <label for="exampleFormControlTextarea1" class="form-label topics" >Content</label>
    <textarea class="form-control" id="div"  name="content" id="exampleFormControlTextarea1"  rows="20" ></textarea><br>
    <button type="submit" class="btn btn-primary" id="btn">Submit</button>
  </div>
    </form>
  
  </div>
  </center>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
      </body>
  </html>
  ';
}


?>
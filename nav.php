
<?php
session_start();
echo '

    <nav class="navbar navbar-expand-lg " >
  <div class="container-fluid">
  <a class="navbar-brand mx-5" href="index.php">
  <img src="./images/Screenshot_20230815_133557_Chrome.png"  width="35" height="35" class="d-inline-block align-text-top">
  <b class="fs-4"><i>Blogers</i></b>
</a>';
if(isset($_SESSION['login'])==true){
echo '<a href="post.php"><button type="button" class="btn btn-success rounded-5">New Post</button></a>';
}
    echo '<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button type="button" class="btn btn-success" type="submit">Search</button>';
        if(isset($_SESSION['login'])==true){
            echo '
            <a class="navbar-brand mx-2" href="profile.php">
  <img src="./images/user.png"  width="35" height="30" class="d-inline-block align-text-top">
  <b class="fs-4"><i>'.$_SESSION['name'].'</i></b>
</a>
            <a href="logout.php"><button type="button" class="btn btn-danger mx-3" >LogOUT</button></a>';
        }
        else{
        echo '<button type="button" class="btn btn-info mx-3" data-bs-toggle="modal" data-bs-target="#loginmodal">LogIN</button>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#signupmodal">SignUP</button>';
        }
      echo '</form>
      
    </div>
  </div>
</nav>
<!-- Button trigger modal -->


<!-- Login Modal -->
<div class="modal fade" id="loginmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="login.php" method="POST">
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label" >Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="inputEmail3" name="email">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label" >Username</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" name="name">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputPassword3" name="password">
        </div>
      </div>
      
      
      
      <center><button type="submit" class="btn btn-primary">LogIN</button></center>
    </form>
      </div>
     
    </div>
  </div>
</div>


<div class="modal fade" id="signupmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Signup</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="signup.php" method="POST">
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label" >Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="inputEmail3" name="email">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputPassword3" name="uname">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label" >Insta ID</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" name="instaid">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label" >linkdin ID</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" name="linkdinid">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputPassword3" name="password">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputPassword3" name="cpassword">
        </div>
      </div>
      <center><button type="submit" class="btn btn-primary">Sign UP</button></center>
    </form>
      </div>
     
    </div>
  </div>
</div>
';
?>
<?php
require('connection.php');
require('functions.php');
$error='';
if(isset($_POST["submit"])){
$name=safe_chesey($con,$_POST['name']);
$password=safe_chesey($con,$_POST['password']);
$res="SELECT * from `teachers` where `teachers`.`name`='$name' and `teachers`.`password`='$password'";
$result = $con->query($res);
$row=mysqli_fetch_assoc(mysqli_query($con,$res));
$count=mysqli_num_rows($result);
if($count>0){
  $status="yes";
  $id=$row['id'];
    $_SESSION['TEACHER_LOGIN']=$status;
    $_SESSION['TEACHER_USERNAME']=$name;
    $_SESSION['TEACHER_ID']=$id;
    $error="welcome".$name;
  echo  "<script>window.location.href='index.php'</script>";
}else{
    $error="Invalid Details";
    // echo  "<script>window.location.href='login.php'</script>";
    
}
}

?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
  <meta width="device-width, initial-scale= -1">
    <meta charset="utf-8">
    <title>Attend Login</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/718be1b4c6.js" crossorigin="anonymous"></script>
  </head>


<body class="bg-default">
  <!-- Navbar -->

  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Welcome!</h1>
              <p class="text-lead text-white">The Bhavans presents a whole new platform for teachers to track thier students and attendance.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-3"><small>Visit Me !</small></div>
              <div class="btn-wrapper text-center">
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><i class="fab fa-linkedin-in"></i></span>
                  <span class="btn-inner--text">Linkdn</span>
                </a>
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><i class="fas fa-globe-asia"></i></span>
                  <span class="btn-inner--text">Website</span>
                </a>
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Login with credentials</small>
              </div>
              <form role="form" method="POST" action="login.php">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="name" placeholder="username" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" name="password" placeholder="Password" type="password">
                  </div>
                </div>

                <span class="text-lead" style="color:red;"></span>

                <div class="custom-control custom-control-alternative custom-checkbox">
                  <!-- <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label> -->
                </div>
                <div class="text-center">
                  <input type="submit" name="submit" class="btn btn-primary my-4" value="login">
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="#" class="text-light"><small>Forgot password?</small></a>
            </div>
            <p> <?php echo $error ?></p>
            <div class="col-6 text-right">
              <a href="#" class="text-light"><small>Create new account</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            � 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">Bhavans Applications</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">Bhavans Applications</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/nagamouni/attend/blob/main/LICENSE" class="nav-link" target="_blank">MIT License</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

</body>
</html>
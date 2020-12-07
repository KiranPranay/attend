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
  </head>
  <body>
    <div class="wrapper">
      <div class="title">
Login Form</div>
<form action="" method="post">
        <div class="field">
          <input type="text" name="name" required>
          <label>Name</label>
        </div>
<div class="field">
          <input type="password" name="password" required>
          <label>Password</label>
        </div>
<div class="content">
          <div class="checkbox">
            <input type="checkbox" id="remember-me">
            <label for="remember-me">Remember me</label>
          </div>
<div class="pass-link">
<a href="logout.php">Forgot password?</a></div>
</div>
<p> <?php echo $error ?></p>
<div class="field">
          <input type="submit" name="submit" value="Login">
        </div>
<div class="signup-link">
Not a member? <a href="#">Signup now</a></div>
</form>
</div>
</body>
</html>

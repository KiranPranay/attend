<?php
session_start();
require('connection.php');
require('functions.php');
if(isset($_SESSION['TEACHER_LOGIN']) && $_SESSION['TEACHER_LOGIN']!=''){

}else {
  echo "<script>window.location.href='login.php'</script>";
}
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Attend Login</title>
    <link rel="stylesheet" href="css/login.css">
    
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-lGuUqJUPXJEMgQX/RRaM6mZkK6ono5i5bHuBME4qOCo=" crossorigin="anonymous"></script> -->
  </head>
  <body>
    <div class="wrapper" style="width:80% !important">
      <div class="title">
Welcome <?php echo $_SESSION['TEACHER_USERNAME']; ?></div>
<form action="attendance_sheet.php" method="post">
<?php
$id=$_SESSION['TEACHER_ID'];
$res="SELECT * from `teachers` where `teachers`.`id`='$id'";
$row=mysqli_fetch_assoc(mysqli_query($con,$res));
?>
<div class="field">
<h5>Name</h5> <p><?php echo $row['name'] ?>
</div>
<div class="field">
<h5>email</h5> <p><?php echo $row['email'] ?>
</div>
<div class="field">
<h5>mobile</h5> <p><?php echo $row['mobile'] ?>
</div>
        <div class="field">
        <H5>class :</H5>
                     <select id="class" onchange="get_sub()"  name="class">
                    <option  value="">Select</option>
                    <?php 
                    $res=mysqli_query($con,"SELECT * from `classes`");
                    while($row=mysqli_fetch_assoc($res)){
                                        ?>
                    <option  value="<?php echo $row['id'] ?>"><?php echo $row['class'] ?></option>
                    <?php } ?>
                    </select>
        </div>
        <div class="field">
        <H5>subject :</H5>
                     <select id="sub_id"  name="subject">
                    <option  value="">Select</option>
                    </select>
        </div>

<div class="content">
          
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
<script src="assests\js\jQuery.js"></script>
<script>
function get_sub(){
  var class_id=jQuery('#class').val();
  jQuery.ajax({
    url:'get_sub.php',
    type:'post',
    data:'class='+class_id,
    success:function(result){
      jQuery('#sub_id').html(result);
      // console.log(result);
    }
  });
// alert(class_id);
}
    </script>
</body>
</html>

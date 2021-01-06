<?php
session_start();
require('connection.php');
require('functions.php');
if(isset($_SESSION['TEACHER_LOGIN']) && $_SESSION['TEACHER_LOGIN']!=''){

}else {
  echo "<script>window.location.href='loginrecord.php'</script>";
}
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Attend Login</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/718be1b4c6.js" crossorigin="anonymous"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-lGuUqJUPXJEMgQX/RRaM6mZkK6ono5i5bHuBME4qOCo=" crossorigin="anonymous"></script> -->
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
                            <p class="text-lead text-white">The Bhavans presents a whole new platform for teachers to
                                track thier students and attendance.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <?php 
              $id=$_SESSION['TEACHER_ID'];
$res="SELECT * from `teachers` where `teachers`.`id`='$id'";
$row=mysqli_fetch_assoc(mysqli_query($con,$res));
?>
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header bg-transparent pb-5">

                            <p>
                                <bold>Name : </bold><?php echo $row['name'] ?>
                            </p>
                            <p>email : <?php echo $row['email'] ?></p>
                            <p>mobile : <?php echo $row['mobile'] ?></p>
                            <a href="logout.php" class="btn btn-success btn-submit"><i class="fas fa-sign-out-alt"></i>
                                logout here</a>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <small>Select Your Class</small>
                            </div>
                            <form role="form" method="POST" action="exel.php">

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <!-- <input class="form-control" name="name" placeholder="username" type="text"> -->
                                        <select id="class" class="classl" onchange="get_sub()" name="class">
                                            <option value="">Select</option>
                                            <?php 
                    $res=mysqli_query($con,"SELECT * from `classes`");
                    while($row=mysqli_fetch_assoc($res)){
                                        ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['class'] ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <!-- <input class="form-control" name="password" placeholder="Password" type="password"> -->
                                        <select id="sub_id" class="classl" name="subject">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                </div>

                                <span class="text-lead" style="color:red;"></span>

                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                                    <label class="custom-control-label" for=" customCheckLogin">
                                        <span class="text-muted">Remember me</span>
                                    </label>
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
                            <a href="https://github.com/nagamouni/attend/blob/main/LICENSE" class="nav-link"
                                target="_blank">MIT License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="assests\js\jQuery.js"></script>
    <script>
    function get_sub() {
        var class_id = jQuery('#class').val();
        jQuery.ajax({
            url: 'get_sub.php',
            type: 'post',
            data: 'class=' + class_id,
            success: function(result) {
                jQuery('#sub_id').html(result);
                // console.log(result);
            }
        });
        // alert(class_id);
    }
    </script>

</body>

</html>
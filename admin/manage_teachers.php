<?php
require('top.inc.php');
if(isset($_GET['id']) && $_GET['id']!=''){
    $id=safe_chesey($con,$_GET['id']);
    $res=mysqli_query($con,"SELECT * from `teachers` where id='$id' ");
    $check=mysqli_num_rows($res);
    if($check>0){
$row=mysqli_fetch_assoc($res);
$id=$row['id'];
$name=$row['name'];
$email=$row['email'];
$mobile=$row['mobile'];
$password=$row['password'];
    }else{
        echo "<script>window.location.href='teacher_master.php'</script>";
        die();
    }
}
if(isset($_POST['submit'])){
    $id=safe_chesey($con,$_GET['id']);
    $name=safe_chesey($con,$_POST['name']);
    $email=safe_chesey($con,$_POST['email']);
    $mobile=safe_chesey($con,$_POST['mobile']);
    $password=safe_chesey($con,$_POST['password']);
        $res=mysqli_query($con,"SELECT * from `teachers` where `teachers`.`name`='$name'");
        $check=mysqli_num_rows($res);
        if($check>0){
            if(isset($_GET['id']) && $_GET['id']!=''){
                $getData=mysqli_fetch_assoc($res);
                if($id==$getData['id']){
    
                }
                else{
                    $msg="teacher already exists, please check again";
                }
            }else{
            $msg="teacher already exists, please check again";
            }
        }
        if($msg==''){
        if(isset($_GET['id']) && $_GET['id']!=''){
            mysqli_query($con, "UPDATE `teachers` SET `name`='$name',`email`='$email',`mobile`='$mobile',`password`='$password' WHERE `teachers`.`id`=$id");
        }else{
            mysqli_query($con,"INSERT INTO `teachers` (`name`,`email`,`mobile`,`password`,`status` ) VALUES ('$name','$email','$mobile','$password',1)");
        }
        echo "<script>window.location.href='teacher_master.php'</script>";
        // echo "INSERT INTO `teachers` (`name`,`email`,`mobile`,`password`,`status` ) VALUES ('$name','$email','$mobile','$password',1)";
        die();
    }
    

}
?>
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tables</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--6">
<div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Light table</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
<form role="form" method="POST" action="manage_teachers.php?id=<?php echo $id ?>" >
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Name" name='name' value="<?php echo $name ?>" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    
                    <input class="form-control" name='email' value="<?php echo $email ?>" placeholder="Email" >
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    
                    <input class="form-control" name='mobile' value="<?php echo $mobile ?>" placeholder="Mobile" >
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    
                    <input class="form-control" name='password' value="<?php echo $password ?>" placeholder="Password" >
                  </div>
                </div>
                <div class="text-center">
                  <input type="submit" name="submit" class="btn btn-primary my-4" value="Submit">
                </div>
                <span><?php echo $msg ?></span>
                
              </form>
              </div>
          </div>
        </div>
      </div>
</div>
<?php
require('footer.inc.php');

?>
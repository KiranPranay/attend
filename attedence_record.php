<?php
session_start();
require('top.inc.php');
foreach($_POST as $key => $value){
$roll=$key;
$status=$value;
$date=date("Y-m-d");
$sub=$_SESSION['SUBJECT'];
$clsname=$_SESSION['CLASS'];
$check=mysqli_query($con,"SELECT `attendance-record`.`subject`, `attendance-record`.`time`, `attendance-record`.`roll` from `attendance-record` where `attendance-record`.`subject`='$sub' and `attendance-record`.`time`='$date' and  `attendance-record`.`roll`='$roll'");
if(mysqli_num_rows($check)>0){
    mysqli_query($con,"UPDATE `attendance-record` SET `attendance-record`.`status`='$status' where `attendance-record`.`roll`='$roll' and `attendance-record`.`subject`='$sub'");
}else{
mysqli_query($con,"INSERT into `attendance-record` (`roll`,`status`,`time`,`subject`) VALUES ('$roll','$status','$date','$sub')");
}
$class=$_SESSION['CLASS'];

}

?>
  <body>
      <header class="header">
          <div>
        <h2 class="h-h1">
            ATTENDENCE
        </h2>
    </div>
        <div class="h-img">
        <img  src="assests/pics/logo.png" height="50px" >
    </div>
      </header>
      <br>
      <div class="mainbox">
          <div class="sbox1">
              <ul>
                  <li>
                    <img src="assests/pics/details.png" height="40px">
                  </li>
            <li>
                <h3>
                    DETAILS
                </h3>
            </li>
                </ul>
          </div>
          <div class="sbox2">
              <ul>
                  <li>
                     <b> Date:</b> <?php echo $date ?>
                  </li>
                  <li>
                     <b>Subject :</b>
                     <?php 
                     $subname=mysqli_fetch_assoc(mysqli_query($con,"SELECT `subjects`.`sub` FROM `subjects` where `subjects`.`id`='$sub'"));
                     echo $subname['sub'];
                     ?>
                  </li>
                  <li>
                     <b>Teacher :</b> <?php echo $_SESSION['TEACHER_USERNAME'];?>
                </li>
                <li>
                     <b>class :</b>
                     <?php 
                     $classname=mysqli_fetch_assoc(mysqli_query($con,"SELECT `classes`.`class` FROM `classes` where `classes`.`id`='$clsname'"));
                     echo $classname['class'];
                     ?>
                </li>
              </ul>
              <a href="logout.php" class="logout" ><i class="fas fa-sign-out-alt"></i> Logout Here</a>
          </div>
      </div>
      <main>
          <div class="down-btn">
      <a   href="export.php"  class="btn btn-primary btn-lg "  tabindex="-1" role="button">Download</a>
</div>
          
          <table id="attendtable" class="table">

              <tr class="tr1">
                  <th width="10%">
                      Roll No
                  </th>
                  <th width="10%">
                   Name
                </th>
                <th width="10%">
                    P/A
                </th>
                <th width="70%">
                    History
                </th>
              </tr>
              <?php

              $res=mysqli_query($con,"SELECT `attendance-record`.`status`,`students`.`class`,`attendance-record`.`subject`,`attendance-record`.`time`,`students`.`name`,`attendance-record`.`roll`,`students`.`roll`  from `attendance-record`, `students` where `class`='$class' and `subject`='$sub' and `time`='$date' and `attendance-record`.`roll`=`students`.`roll`");
              while($row=mysqli_fetch_assoc($res)){
              ?>
              <tr >
                  <td style="border-bottom: solid 1px black; width:10%;" width="10%">
                      <?php
                      $studdroll=$row['roll'];
                      echo $studdroll ?>
                  </td>
                  <td style="border-bottom: solid 1px black; width:10%;" width="10%">
                  <?php echo $row['name']; ?>
                </td>
                <td style="border-bottom: solid 1px black; width:10%;" width="10%">
                
                <?php if($row['status']==1){
                    ?>
                    
                    <p class="psa" style="color: green"><i class="fas fa-user-graduate"></i></p>
                    <?php
                }
                if($row['status']==0){
                    ?>
                    <p class="psa" style="color:red"><i class="fas fa-user-graduate"></i></p>
                     <?php } ?>
                    
                </td>
                <td style="border-bottom: solid 1px black; width:70%;" width="70%">
                <?php
                
                $getsub=mysqli_query($con,"SELECT `subjects`.`id` FROM `subjects`,`attendance-record` where `class`='$class' and `subjects`.`id`=`attendance-record`.`subject` and `attendance-record`.`time`='$date' and `attendance-record`.`roll`='$studdroll'");
                while($getsubidarr=mysqli_fetch_assoc($getsub)){
                    $subid=$getsubidarr['id'];
                    $dhonga=mysqli_query($con,"SELECT `attendance-record`.`status`,`subjects`.`sub` FROM `attendance-record`,`subjects` where `attendance-record`.`roll`='$studdroll' and `attendance-record`.`subject`='$subid' and `attendance-record`.`subject`=`subjects`.`id` and `attendance-record`.`time`='$date'");
                    
                    $getstat=mysqli_fetch_assoc($dhonga);
                    if($getstat['status']==1){
                        $color="green";
                    }
                    if($getstat['status']==0){
                        $color="red";
                    }
                    echo '<p class="p-a"style="color: '.$color.'">'.$getstat['sub']."</p>";   
                }
                ?>
                </td>
              </tr>
              
              <?php } ?>
          </table>
          

      </main>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
  </body>
</html>
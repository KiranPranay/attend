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
$date=date("Y-m-d");
$sub=$_SESSION['SUBJECT'];
$clsname=$_SESSION['CLASS'];
$class=$_SESSION['CLASS'];
?>
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
                    
                    <p class="psa" style="color: green">Present</p>
                    <?php
                }
                if($row['status']==0){
                    ?>
                    <p class="psa" style="color:red">Absent</i></p>
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
          <script>
    // document.getElementById('downloadexel').addEventListener('click', function(){
        var table2excel = new Table2Excel();
        table2excel.export(document.querySelectorAll("#attendtable"));
    // });
    </script>
          </body>
          </html>
<?php
session_start();
session_start();
require('connection.php');
require('functions.php');


$class=$_SESSION['CLASS'];
$date=date("Y-m-d");
$sub=$_SESSION['SUBJECT'];
$clsname=$_SESSION['CLASS'];

?>

          
          <table id="getexel" >

              <tr >
                  <th >
                      Roll No
                  </th>
                  <th >
                   Name
                </th>
                <th >
                    P/A
                </th>
           
              </tr>
              <?php

              $res=mysqli_query($con,"SELECT `attendance-record`.`status`,`students`.`class`,`attendance-record`.`subject`,`attendance-record`.`time`,`students`.`name`,`attendance-record`.`roll`,`students`.`roll`  from `attendance-record`, `students` where `class`='$class' and `subject`='$sub' and `time`='$date' and `attendance-record`.`roll`=`students`.`roll`");
              while($row=mysqli_fetch_assoc($res)){
              ?>
              <tr >
                  <td >
                      <?php
                      $studdroll=$row['roll'];
                      echo $studdroll ?>
                  </td>
                  <td >
                  <?php echo $row['name']; ?>
                </td>
                <td >
                
                <?php if($row['status']==1){
                    echo "PRESENT";
                }
                if($row['status']==0){
                    echo "ABSENT"; }?>
                    
                </td>
                
              </tr>
              
              <?php } ?>
          </table>

<?php 
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=repot.xls');
?>
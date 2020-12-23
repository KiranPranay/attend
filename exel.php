<?php
session_start();
require('top.inc.php');

foreach($_POST as $key => $value){
    $roll=$key;
    $status=$value;
    $date=date("Y-m-d");
    
    $clsname=$_SESSION['CLASS'];
    $check=mysqli_query($con,"SELECT `attendance-record`.`subject`, `attendance-record`.`time`, `attendance-record`.`roll` from `attendance-record` where `attendance-record`.`subject`='$sub' and `attendance-record`.`time`='$date' and  `attendance-record`.`roll`='$roll'");
    if(mysqli_num_rows($check)>0){
        mysqli_query($con,"UPDATE `attendance-record` SET `attendance-record`.`status`='$status' where `attendance-record`.`roll`='$roll' and `attendance-record`.`subject`='$sub'");
    }else{
    mysqli_query($con,"INSERT into `attendance-record` (`roll`,`status`,`time`,`subject`) VALUES ('$roll','$status','$date','$sub')");
    }
}
$month = '';

if(isset($_GET['month'])){
    $month = $_GET['month'];
    // $to = $_GET['to'];
}
    $class=$_SESSION['CLASS'];
    $sub=$_SESSION['SUBJECT'];
?>
  <body class="body-sty" >
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
      <div class="mainbox" >
          <div class="sbox1">
              <ul>
                  <li>
                  <i class="fas fa-university clg"></i>
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
                     <b> Date: </b> <?php echo date("Y-m-d"); ?>
                  </li>
                  
                  <li>
                  <b>Subject :</b>
                     <?php 
                     $subname=mysqli_fetch_assoc(mysqli_query($con,"SELECT `subjects`.`sub` FROM `subjects` where `subjects`.`id`='$subject'"));
                     echo $subname['sub'];
                     ?>
                  </li>
                  <li>
                    <b> Teacher : </b> <?php echo $_SESSION['TEACHER_USERNAME'] ?>
                </li>
                <li>
                <b>class :</b>
                     <?php 
                     $classname=mysqli_fetch_assoc(mysqli_query($con,"SELECT `classes`.`class` FROM `classes` where `classes`.`id`='$class'"));
                     echo $classname['class'];
                     ?>
                </li>
              </ul>
              <span class="logoutbt">
              <a href="logout.php" class="logout" ><i class="fas fa-sign-out-alt"></i> Logout Here</a>
</span>
          </div>
          
      </div>
      
 
<form method="get" >
    <div class="dropdown">
      <label class="dropbtn">Select Month</label>
      <select class="dropdown-content" name="month">
        <option value="1">January </aoption>
        <option value="#">Febuary</option>
        <option value="#">March </option>
        <option value="#">April </option>
        <option value="#">May </option>
        <option value="#">June </option>
        <option value="#">July </option>
        <option value="#">August </option>
        <option value="#">September </option>
        <option value="#">October </option>
        <option value="#">November </option>
        <option value="#">December </option>
      </select>
    </div>
    <input type="submit">
    </form>
<div style="float:right;  margin-right: 73px;
  margin-top: 10px;">
<button onclick="window.location.href='export.php'" class="dropbtn">Download today</button>
</div>
    
</div>
      <main>
          <form method="post" action="attedence_record.php">
          <table class="table">
          <?php
                // $res="SELECT * from `students` where `students`.`class`='$class'";
                // $row=mysqli_fetch_assoc(mysqli_query($con,$res));
                // while($row){
                ?>
              <tr class="tr1">
                  <th>
                      Roll No
                  </th>
                  <th>
                   Name
                </th>
                <th>
                    P/A
                </th>
              </tr>
              <?php
              
              
              $res = mysqli_query($con,"SELECT * from `students`,`attendance-record` where `students`.`status`='1' and `students`.`class`='$class' and `attendance-record`.`subject`='$sub' and `students`.`roll`=`attendance-record`.`roll` and MONTH(`attendance-record`.`time`)='$month'");
              // } else {
                //     $res=mysqli_query($con,"SELECT * from `students`,`attendance-record` where `students`.`status`='1' and `students`.`class`='$class' and `attendance-record`.`subject`='$sub' and `students`.`roll`=`attendance-record`.`roll`");
                // }
              // echo "SELECT * from `students`,`attendance-record` where `students`.`status`='1' and `students`.`class`='$class' and `attendance-record`.`subject`='$sub' and `students`.`roll`=`attendance-record`.`roll` and MONTH(`attendance-record`.`time`)='$month'";
              while($row=mysqli_fetch_assoc($res)){
              ?>
              <tr>
                  <td>
                      <?php echo $row['roll']; ?>
                  </td>
                  <td>
                  <?php echo $row['name']; ?>
                </td>
                <td>
                    <input type="checkbox"  name="<?php echo $row['roll']; ?>" value="1">
                    <input type="checkbox"  name="<?php echo $row['roll']; ?>" value="0">
                </td>
              </tr>
              <?php } ?>
          </table>
          <div class="btn-cont">
          <button type="submit" name="submit" class="btn btn-success btn-submit">Submit</button>
              </div>
        </form>
      </main>



    <?php
//         header("Content-Disposition: attachment; filename=\"test.xls\"");
//         header("Content-Type: application/vnd.ms-excel");
//        $out = fopen("php://output", 'w');

//   $flag = false;
//   $result = pg_query("SELECT * FROM table ORDER BY field") or die('Query failed!');
//   while(false !== ($row = pg_fetch_assoc($result))) {
//      if(!$flag) { 
     // display field/column names as first row
//       fputcsv($out, array_keys($row), ',', '"');
//       $flag = true;
//     }
//     array_walk($row, __NAMESPACE__ . '\cleanData');
//     fputcsv($out, array_values($row), ',', '"');
//  }

//   fclose($out);
//   exit;
//        ?>
          <script>
//     document.getElementById('downloadexel').addEventListener('click', function(){
//         var table2excel = new Table2Excel();
//         table2excel.export(document.querySelectorAll("#attendtable"));
//     });
   
//         $('input[type="checkbox"]').on('change', function() {
//     $('input[name="' + this.name + '"]').not(this).prop('checked', false);
//     });
        </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 
  </body>
</html>
<?php
session_start();
require('top.inc.php');
if(isset($_POST['class'])){
    $class=$_POST['class'];
    $subject=$_POST['subject'];
    $_SESSION['SUBJECT']=$subject;
    $_SESSION['CLASS']=$class;
}
?>

<body class="body-sty">
    <header class="header">
        <div>
            <h2 class="h-h1">
                ATTENDENCE
            </h2>
        </div>
        <div class="h-img">
            <img src="assests/pics/logo.png" height="50px">
        </div>
    </header>
    <br>
    <div class="mainbox">
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
                <a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout Here</a>
            </span>
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
              
              $res=mysqli_query($con,"SELECT `students`.`id`,`students`.`roll`,`students`.`name`,`students`.`status`,`attendance-record`.`status` from `students`,`attendance-record` where `students`.`status`='1' and `students`.`class`='$class' and `attendance-record`.`roll`=`students`.`roll` and `attendance-record`.`subject`='$subject'");
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
                        <?php 
                        if($row['status']==1){ ?>

                        <input checked type="checkbox" name="<?php echo $row['roll']; ?>" value="1">
                        <input type="checkbox" name="<?php echo $row['roll']; ?>" value="0">
                        <?php
                        }else{
                    ?>
                        <input type="checkbox" name="<?php echo $row['roll']; ?>" value="1">
                        <input checked type="checkbox" name="<?php echo $row['roll']; ?>" value="0">
                        <?php }
                        ?>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <div class="btn-cont">
                <button type="submit" name="submit" class="btn btn-success btn-submit">Submit</button>
            </div>
        </form>
    </main>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script>
    $('input[type="checkbox"]').on('change', function() {
        $('input[name="' + this.name + '"]').not(this).prop('checked', false);
    });
    </script>
</body>

</html>
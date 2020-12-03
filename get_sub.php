<?php 
require("connection.php");
require("functions.php");
$class=safe_chesey($con,$_POST['class']);
// $sub=safe_chesey($con,$_POST['get_sub_id']);
$res=mysqli_query($con,"SELECT * FROM `subjects` where `subjects`.`class`='$class' and `subjects`.`status`='1'");
if(mysqli_num_rows($res)>0){
    $html='';
    while($row=mysqli_fetch_assoc($res)){
        $html="<option value=".$row['id'].">".$row['sub']."</option>";
        echo  $html;
        
    }
}else{
    $html='';
    $html="<option value=''>NO data found</option>";
        echo  $html;
       
}

<?php
function safe_chesey($con,$str){
    if($str!=''){
        $str=trim($str);
        return  mysqli_real_escape_string($con,$str);
    }
}
?>
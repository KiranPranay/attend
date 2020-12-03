<?php
session_start();
unset($_SESSION['TEACHER_LOGIN']);
unset($_SESSION['TEACHER_USERNAME']);
unset($_SESSION['TEACHER_ID']);
echo  "<script>window.location.href='login.php'</script>";
die();
?>
<?php
session_start();
unset($_SESSION['ADMIN_LOGIN']);
unset($_SESSION['ADMIN_USERNAME']);
echo  "<script>window.location.href='login.php'</script>";
die();
?>
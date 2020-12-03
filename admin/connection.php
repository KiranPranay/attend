<?php
session_start();
$con= mysqli_connect("localhost","root","mysql","attend");
if(mysqli_connect_error()){
    die("I Broke up with database". mysqli_connect_error());
}
?>
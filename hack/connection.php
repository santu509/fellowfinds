<?php
global $connect;
$connect=mysqli_connect('localhost','root','','noteshare');
if(!$connect){
    die('connnection failed'.mysqli_connect_error($connect));
}
?>
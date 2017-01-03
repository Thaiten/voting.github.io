<?php
$connection = mysqli_connect('localhost', 'thaitend_admin', 'LAKtqe4TSnqE');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'thaitend_voting');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
?>

<?php
$dbhost = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'healthcarefirm';
$conn = mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname);

if($conn == false){
    dir('Error : cannot connect');
}
?>
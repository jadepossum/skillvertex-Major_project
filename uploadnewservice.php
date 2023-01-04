<?php
        session_start();
        require_once "configure.php";
        $hid = $_SESSION['hid'];
        $servicename = $_REQUEST['servicename'];
        $serviceprice = $_REQUEST['serviceprice'];
        $sql1 = "insert into pricelist(servicename,hospitalid,price) values('$servicename','$hid','$serviceprice')";
        $stmt1 = mysqli_query($conn,$sql1);
    ?>
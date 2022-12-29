<?php
        require_once "configure.php";
        $hid = $_REQUEST['r'];
        $sql = "select servicename,price from pricelist where hospitalid = $hid";
        $stmt = mysqli_query($conn,$sql);
        echo '<table><tr><th>service name</th><th>price</th></tr>';
        while($row = mysqli_fetch_assoc($stmt)){
            echo '<tr><td>'.$row['servicename'].'</td><td>'.$row['price'].'</td></tr>';
        }
        echo '</table>';
    ?>
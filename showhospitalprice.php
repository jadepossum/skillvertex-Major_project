<?php
        session_start();
        require_once "configure.php";
        $hid = $_REQUEST['r'];
        $sql = "select servicename,price from pricelist where hospitalid = $hid";
        $stmt = mysqli_query($conn,$sql);
        echo  '<div class="price-form">
                    <form  method="post" enctype="multipart/form-data">
                        <input type="text" name="servicenae" placeholder="new service" required>
                        <input type="number" name="serviceprice" placeholder ="new price" required>
                        <input onclick="priceformval(this)" type="button" name="addservice" value="addservice">
                    </form>
                </div>';
        echo '<table><tr><th>service name</th><th>price</th></tr>';
        while($row = mysqli_fetch_assoc($stmt)){
            echo '<tr><td>'.$row['servicename'].'</td><td>'.$row['price'].'</td></tr>';
        }
        echo '</table>';
        
    ?>
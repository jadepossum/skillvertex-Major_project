<?php
        require_once "configure.php";
        $hid = $_REQUEST['r'];
        $sql = "select servicename,price from pricelist where hospitalid = $hid";
        $stmt = mysqli_query($conn,$sql);
        echo  '<div class="price-form">
                    <form action="?" method="post" enctype="multipart/form-data">
                        <input type="text" name="servicenae" placeholder="new service">
                        <input type="text" name="price" placeholder ="new price">
                        <input type="submit" name="addservice" value="addservice">
                    </form>
                </div>';
        echo '<table><tr><th>service name</th><th>price</th></tr>';
        while($row = mysqli_fetch_assoc($stmt)){
            echo '<tr><td>'.$row['servicename'].'</td><td>'.$row['price'].'</td></tr>';
        }
        echo '</table>';
        
    ?>
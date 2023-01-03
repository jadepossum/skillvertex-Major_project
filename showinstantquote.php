<?php
        require_once "configure.php";
        $hid = $_REQUEST['h'];
        $sql = "select servicename,price from pricelist where hospitalid = $hid";
        $stmt = mysqli_query($conn,$sql);
        echo '<div class="quote-card-container">';
        echo '<div class="quote-card" style="background-color:lightcoral;">
                <div>Service Name</div>
                <div>Price</div>
              </div>';
        while($row = mysqli_fetch_assoc($stmt)){
            echo '<div class="quote-card" onclick="showquote(this)">
                    <div class="service-name">'.$row['servicename'].'</div>
                    <div class="service-price">'.$row['price'].'</div>
                   </div>';
        }
        echo '<div class="pay-card">
                <div class="pay">Pay Now</div>
                <div class="total-price"></div>
              </div>';
        echo '</div>';
        
    ?>
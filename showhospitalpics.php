<?php
        require_once "configure.php";
        $hid = $_REQUEST['q'];
        $sql = "select hospitalpics from hospitalimgs where hospitalid = $hid";
        $stmt = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($stmt)){
            echo '<img class="hospitalpics" width="200px" alt="image not found" src="data:image;base64,'.base64_encode($row['hospitalpics']).'" >';
        }
    ?>